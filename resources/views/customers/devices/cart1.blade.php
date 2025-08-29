@extends('customers.layout.app')

@section('title', 'Shopping Cart')

@section('content')
<style>
    .empty-cart {
        background-image: url('data:image/svg+xml;utf8,<svg ... />');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100px;
        opacity: 0.1;
    }

    .product-image {
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
    }
</style>

<br><br><br>

<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
            <svg class="h-8 w-8 mr-2" ...></svg>
            Your Shopping Cart
        </h1>

        @if($cartItems->isEmpty())
            <p class="text-gray-500">Your shopping cart is empty.</p>
        @else

        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border p-2 text-left">Image</th>
                    <th class="border p-2 text-left">Name</th>
                    <th class="border p-2 text-left">Category</th>
                    <th class="border p-2 text-left">Price</th>
                    <th class="border p-2 text-left">Quantity</th>
                    <th class="border p-2 text-left">Subtotal</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                @foreach($cartItems as $item)
                <tr data-id="{{ $item->product_id }}" class="cart-item border-b">
                    <td class="p-2">
                        <img src="{{ $item->product->mobile->primaryImage->url }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="p-2">{{ $item->product->mobile->name }}</td>
                    <td class="p-2">Mobile phone</td>
                    <td class="p-2">${{ number_format($item->product->price, 2) }}</td>
                    <td class="p-2">
                        <div class="flex items-center gap-2">
                            <button class="decrease-btn px-2 py-1 bg-gray-200 rounded">-</button>
                            <span class="quantity">{{ $item->quantity }}</span>
                            <button class="increase-btn px-2 py-1 bg-gray-200 rounded">+</button>
                        </div>
                    </td>
                    <td class="p-2 subtotal" data-price="{{ $item->product->price }}">
                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </td>
                    <td class="p-2 text-center">
                        <form action="{{route('cart.removeItem',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                          <button type='submit' class="remove-btn text-red-600 hover:underline">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            <div class="mt-6 text-right font-bold text-xl">
                Total: <span id="total-price"></span>
            </div>

            <!-- Stripe Payment Form -->
            <div class="mt-10 bg-white p-6 rounded shadow-md max-w-md mx-auto">
                <h2 class="text-xl font-semibold mb-4">  Enter the payment data :</h2>
                <form id="payment-form">
                    @csrf
                    <div id="card-element" class="mb-4 border p-2 rounded"><!-- Stripe injects here --></div>
                    <button id="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Pay now </button>
                    <div id="error-message" class="text-red-500 mt-2"></div>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function() {
        function updateTotal() {
            let total = 0;
            $('.cart-item').each(function() {
                let quantity = parseInt($(this).find('.quantity').text());
                let price = parseFloat($(this).find('.subtotal').data('price'));
                total += quantity * price;
            });
            $('#total-price').text(`$${total.toFixed(2)}`);
        }

        $('.increase-btn, .decrease-btn').on('click', function() {
            let row = $(this).closest('.cart-item');
            let quantitySpan = row.find('.quantity');
            let quantity = parseInt(quantitySpan.text());
            let price = parseFloat(row.find('.subtotal').data('price'));
            let productId = row.data('id');

            if ($(this).hasClass('increase-btn')) {
                quantity++;
            } else if ($(this).hasClass('decrease-btn') && quantity > 1) {
                quantity--;
            }

            quantitySpan.text(quantity);
            let newSubtotal = (price * quantity).toFixed(2);
            row.find('.subtotal').text(`$${newSubtotal}`);
            updateTotal();

            $.ajax({
                url: '/cart/update',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    console.log('Cart updated.');
                },
                error: function() {
                    alert('Error updating cart');
                }
            });
        });

        updateTotal();

        const stripe = Stripe('{{ config('stripe.public') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            try {
                const response = await fetch('{{ route("payment.checkout") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to create order.');
                }

                const data = await response.json();
                const clientSecret = data.client_secret;
                const orderId = data.order_id;

                const {paymentIntent, error} = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card
                    }
                });

                if (error) {
                    document.getElementById('error-message').textContent = error.message;
                    return;
                }

                if (paymentIntent.status === 'succeeded') {
                    const confirmResponse = await fetch('{{ route("payment.confirmPayment") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            payment_intent_id: paymentIntent.id,
                            order_id: orderId
                        })
                    });

                    if (!confirmResponse.ok) {
                        const confirmError = await confirmResponse.json();
                        throw new Error(confirmError.message || 'Failed to confirm payment.');
                    }

                    window.location.href = '{{ route("payment.success") }}';
                }
            } catch (err) {
                document.getElementById('error-message').textContent = err.message;
            }
        });
    });
</script>
@endpush


@extends('customers.layout.app')

@section('title' , 'Shopping Cart')

@section('content')
<style>
    /* Custom styles that can't be done with Tailwind */
    .empty-cart {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>');
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
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

            </tbody>
        </table>

        <div class="mt-6 text-right font-bold text-xl">
            Total: <span id="total-price"></span>
        </div>

        <button id="checkout-btn" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Proceed to Checkout
        </button>
        @endif
    </div>

</div>
@endsection

@push('scripts')

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

            // update the quantity 
            quantitySpan.text(quantity);

            // update the subtotal 
            let newSubtotal = (price * quantity).toFixed(2);
            row.find('.subtotal').text(`$${newSubtotal}`);

            
            updateTotal();

            // send to server 
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

        //whem upload page to cal total 
        updateTotal();
    });
</script>


@endpush
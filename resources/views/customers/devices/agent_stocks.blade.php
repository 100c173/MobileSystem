@extends('customers.layout.app')

@section('title' , 'shop')

@section('content')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mobile-card {
        animation: fadeIn 0.5s ease-out forwards;
        opacity: 0;
    }

    .mobile-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .mobile-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .mobile-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .mobile-card:nth-child(4) {
        animation-delay: 0.4s;
    }

    .mobile-card:nth-child(5) {
        animation-delay: 0.5s;
    }

    .mobile-card:nth-child(6) {
        animation-delay: 0.6s;
    }

    .cart-notification {
        transform: translateX(120%);
        transition: transform 0.3s ease-out;
    }

    .cart-notification.show {
        transform: translateX(0);
    }
</style>
<div class="bg-gray-100 min-h-screen">
    <br><br><br>
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Search and Filter -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <input type="text" placeholder="Search mobiles..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <i class="fas fa-search absolute right-3 top-3.5 text-gray-400"></i>
                </div>
                <select class="bg-white px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>All Brands</option>
                    <option>Apple</option>
                    <option>Samsung</option>
                    <option>Xiaomi</option>
                    <option>OnePlus</option>
                </select>
                <select class="bg-white px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Price Range</option>
                    <option>Under $200</option>
                    <option>$200 - $500</option>
                    <option>$500 - $800</option>
                    <option>Above $800</option>
                </select>
            </div>
        </div>

        <!-- Mobile Cards Grid -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card  -->
            @foreach($agentStock as $agent_mobile)
            <div class="mobile-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="relative">
                    <img src="{{$agent_mobile->mobile->primaryImage->image_url}}" alt="{{$agent_mobile->mobile->name}}" class="w-full h-48 object-cover">
                    <span class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">NEW</span>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800">{{$agent_mobile->mobile->name}}</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Verified</span>
                    </div>
                    <p class="text-gray-600 mt-2 text-sm">{{$agent_mobile->mobile->fast_review}}</p>
                    <div class="mt-4 flex items-center">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Seller">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">{{$agent_mobile->agent->name}}</p>
                            <p class="text-xs text-gray-500">4.8 ★ (36 reviews)</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900">${{$agent_mobile->price}}</span>
                        <form action="{{route('cart.store',$agent_mobile->id)}}" method="POST">
                            @csrf
                            <button type='submit' class="add-to-cart bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition" data-id="1" data-name="iPhone 13 Pro" data-price="899">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </main>

    <!-- Cart Notification -->
    <div id="cart-notification" class="cart-notification fixed top-20 right-4 bg-white shadow-lg rounded-lg p-4 z-50 max-w-xs">
        <div class="flex items-start">
            <div class="flex-shrink-0 text-green-500 mt-0.5">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-gray-800">Added to Cart</h3>
                <p id="notification-message" class="text-xs text-gray-600 mt-1">Item added to your cart successfully!</p>
                <div class="mt-2">
                    <a href="#" class="text-xs font-medium text-indigo-600 hover:text-indigo-500">View cart →</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12 flex justify-center">
        <nav class="flex" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Previous</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
            <a href="#" aria-current="page" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-600 text-sm font-medium text-white">2</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">8</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Next</a>
        </nav>
    </div>
    <br><br>
</div>
@endsection

@push('scripts')
<script>
    // Cart functionality
    let cart = [];

    // Add to cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartCount = document.getElementById('cart-count');
    const cartNotification = document.getElementById('cart-notification');
    const notificationMessage = document.getElementById('notification-message');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            const name = e.target.getAttribute('data-name');
            const price = e.target.getAttribute('data-price');

            // Check if item already exists in cart
            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1
                });
            }

            // Update cart count
            cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);

            // Show notification
            notificationMessage.textContent = `${name} ($${price}) added to your cart!`;
            cartNotification.classList.add('show');

            // Hide notification after 3 seconds
            setTimeout(() => {
                cartNotification.classList.remove('show');
            }, 3000);

            // Button animation
            button.innerHTML = '<i class="fas fa-check mr-1"></i> Added';
            button.classList.add('bg-green-500', 'hover:bg-green-600');
            button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');

            setTimeout(() => {
                button.innerHTML = 'Add to Cart';
                button.classList.remove('bg-green-500', 'hover:bg-green-600');
                button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
            }, 1500);
        });
    });

    // Cart button click
    document.getElementById('cart-btn').addEventListener('click', () => {
        if (cart.length === 0) {
            alert('Your cart is empty!');
        } else {
            alert(`You have ${cart.reduce((total, item) => total + item.quantity, 0)} items in your cart.\nTotal: $${cart.reduce((total, item) => total + (item.price * item.quantity), 0)}`);
        }
    });
</script>
@endpush
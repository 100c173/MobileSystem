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
<div class="bg-gray-50">
    <br><br><br>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Header and Filter Options --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Get the distinguished mobile from trusted agents</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-500">Filter by:</span>
                <select id="brandFilter" class="bg-white px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <select id="priceFilter" class="bg-white px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Price Range</option>
                    <option value="<200">Under $200</option>
                    <option value=">=200<=500">$200 - $500</option>
                    <option value=">=500<=800">$500 - $800</option>
                    <option value=">800">Above $800</option>
                </select>
            </div>
        </div>

        <!-- Mobile Cards Grid -->

        <div id="filterContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card  -->
            @foreach($agentStock as $agent_mobile)
            <div class="mobile-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="relative">
                    <img src="{{$agent_mobile->mobile->primaryImage->url}}" alt="{{$agent_mobile->mobile->name}}" class="w-full h-48 object-cover">
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
                        <div class="flex gap-3">
                            <span class="text-2xl font-bold text-gray-900">${{$agent_mobile->price}}</span>
                            <form action="{{route('cart.store',$agent_mobile->id)}}" method="POST">
                                @csrf
                                <button type='submit' class="add-to-cart bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition" data-id="1" data-name="iPhone 13 Pro" data-price="899">
                                    Add to Cart
                                </button>
                            </form>
                            <a href="{{route('mobil_details',$agent_mobile->mobile_id)}}">
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition"> Details </button>
                            </a>
                        </div>
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

    {{ $agentStock->links('customers.vendor.pagination.custom') }}
    <br><br>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById("brandFilter").addEventListener("change", filterProducts);
    document.getElementById("priceFilter").addEventListener("change", filterProducts);

    function filterProducts() {
        const brand = document.getElementById("brandFilter").value;
        const price = document.getElementById("priceFilter").value;


        fetch(`agent_devices/filter?brand=${brand}&price=${price}`)
            .then(response => response.text())
            .then(html => {
                const container = document.getElementById("filterContainer");

                // Check if the HTML contains the "no-results" marker
                if (html.includes('id="no-results"')) {
                    container.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">No devices found</h3>
                        <p class="mt-1 text-gray-500">Try adjusting your filters to find what you're looking for.</p>
                        <button onclick="resetFilters()" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Reset Filters
                        </button>
                    </div>
        `;
                } else {
                    container.innerHTML = html;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function resetFilters() {
        document.getElementById("brandFilter").value = '';
        document.getElementById("priceFilter").value = '';
        filterProducts(); // reload full list with no filters
    }
</script>

@endpush
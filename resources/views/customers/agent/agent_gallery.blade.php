@extends('customers.layout.app')

@section('title','Agent Gallery')

@section('content')
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    }

    .device-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .contact-btn:hover {
        background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
    }
</style>
<br><br><br>
<div class="bg-gray-50 font-sans">
    <!-- Agent Profile Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Agent Info Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="md:flex">
                    <div class="md:w-1/3 bg-indigo-100 flex items-center justify-center p-8">
                        <div class="w-40 h-40 rounded-full bg-white shadow-lg overflow-hidden border-4 border-white">
                            <img src="https://randomuser.me/api/portraits/man/65.jpg" alt="Agent Photo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 mb-2">{{$agent_profile->agent->name}}</h2>
                                <p class="text-indigo-600 font-medium mb-4">Certified Mobile Expert</p>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Available</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-gray-500 text-sm">Store</p>
                                <p class="font-medium">{{$agent_profile->business_name}}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Email</p>
                                <p class="font-medium">{{$agent_profile->agent->email}}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Country/City</p>
                                <p class="font-medium">{{$agent_profile->country?->name}}/{{$agent_profile->city?->name}}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Phone</p>
                                <p class="font-medium">{{$agent_profile->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Available Devices Section -->
            <div id="devices" class="bg-white rounded-xl shadow-md p-8">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($agentDevices as $agentDevice)
                    <!-- Product Card -->
                    <div class="product-card bg-white border border-gray-200 rounded-lg overflow-hidden transition duration-300 flex flex-col h-full">
                        <!-- Product Image -->
                        <div class="p-4 bg-gray-50 flex justify-center items-center h-48">
                            <img
                                src="{{ asset($agentDevice->mobile->primaryImage->url) }}" 
                                alt="{{ $agentDevice->mobile->name }}"
                                class="h-full w-auto object-contain max-h-full max-w-full">
                        </div>

                        <!-- Product Content -->
                        <div class="p-4 flex-grow flex flex-col">
                            <h4 class="font-bold text-gray-800 mb-1 line-clamp-2">{{ $agentDevice->mobile->name }}</h4>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $agentDevice->mobile->getFastReviewAttribute() }}</p>

                            <!-- Price & Availability -->
                            <div class="mb-3 flex justify-between items-center">
                                <span class="font-bold text-indigo-600">${{ number_format($agentDevice->price, 2) }}</span>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">
                                    {{ $agentDevice->quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-auto space-y-2">
                                <a href="{{ route('mobil_details', $agentDevice->id) }}"
                                    class="block w-full text-center bg-gray-100 text-gray-800 py-2 px-4 rounded text-sm hover:bg-gray-200 transition">
                                    Show More Details
                                </a>

                                <form action="{{ route('cart.store', $agentDevice->id) }}" method="POST">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded text-sm hover:bg-indigo-700 transition flex items-center justify-center"
                                        {{ $agentDevice->quantity < 1 ? 'disabled' : '' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    {{ $agentDevices->links('customers.vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </main>
</div>
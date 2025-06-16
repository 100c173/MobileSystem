@extends('customers.layout.app')

@section('title','Mobile Phones Collection')

@section('content')
<style>
    .phone-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .favorite-btn:hover {
        transform: scale(1.1);
    }
</style>
<div class="bg-gray-50">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <a href="#" class="text-2xl font-bold text-indigo-600">PhoneHub</a>
                <nav class="flex items-center space-x-6">
                    <a href="index.html" class="text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600">Categories</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600">About</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Latest Mobile Phones</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-500">Sort by:</span>
                <select class="border border-gray-300 rounded-md px-3 py-1 bg-white text-gray-700">
                    <option>Price (Low to High)</option>
                    <option>Price (High to Low)</option>
                    <option>Newest First</option>
                    <option>Popularity</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($newMobiles as $mobile)
            <!-- Phone Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden phone-card transition duration-300">
                <div class="relative">
                    <img src="{{$mobile->primaryImage->image_url}}" alt="{{$mobile->name}}" class="w-full h-48 object-contain">
                    <button class="absolute top-3 right-3 text-red-500 favorite-btn transition duration-200">
                        <i class="far fa-heart text-xl"></i>
                    </button>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{$mobile->name}}</h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(128 reviews)</span>
                    </div>
                    <p class="text-gray-600 mb-4">{{$mobile->fast_review}}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-900">$999</span>
                        <div class="space-x-2">
                            <a href="{{route('mobil_details',$mobile->id)}}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

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
    </main>

</div>

@endsection
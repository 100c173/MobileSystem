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
    <br><br><br>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Header and Filter Options --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Latest Mobile Phones</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-500">Filter by:</span>

                {{-- Filter by Brand --}}
                <select id="brandFilter" class="border border-gray-300 rounded-md px-3 py-1 bg-white text-gray-700" onchange="filterMobiles()">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>

                {{-- Filter by OS --}}
                <select id="osFilter" class="border border-gray-300 rounded-md px-3 py-1 bg-white text-gray-700" onchange="filterMobiles()">
                    <option value="">All OS</option>
                    @foreach($oses as $os)
                    <option value="{{ $os->id }}">{{ $os->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="productsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($newMobiles as $mobile)
            <!-- Phone Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden phone-card transition duration-300">
                <div class="relative">
                    <img src="{{$mobile->primaryImage?->url}}" alt="{{$mobile->name}}" class="w-full h-48 object-contain">
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
                        <div class="space-x-2">
                            <a href="{{route('mobil_details',$mobile->id)}}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{ $newMobiles->links('customers.vendor.pagination.custom') }}

</div>
</main>
<br><br><br>
</div>

@endsection
@push('scripts')

<script>
    function filterMobiles() {
        const brand = document.getElementById('brandFilter').value;
        const os = document.getElementById('osFilter').value;
        const container = document.getElementById('productsContainer');

        // Show loading indicator
        container.innerHTML = '<div class="col-span-full text-center py-8">Loading...</div>';

        fetch(`{{ route('mobiles.filter') }}?brand=${brand}&os=${os}`)
            .then(response => response.text())
            .then(html => {
                if (html.trim() === '') {
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
                container.innerHTML = `
                <div class="col-span-full text-center py-8 text-red-500">
                    Error loading data. Please try again later.
                </div>
            `;
            });
    }

    function resetFilters() {
        document.getElementById('brandFilter').value = '';
        document.getElementById('osFilter').value = '';
        filterMobiles();
    }
</script>

@endpush
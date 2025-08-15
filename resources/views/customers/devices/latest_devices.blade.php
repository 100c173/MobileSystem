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

    .device-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .device-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .status-new {
        background-color: #4CAF50;
    }

    .status-used {
        background-color: #FF9800;
    }

    .status-refurbished {
        background-color: #2196F3;
    }
</style>
<div class="bg-gray-50">
    <br><br><br>
    <main class="container mx-auto px-4 py-8">
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
            <!-- Device Card 1 -->
            @foreach($newMobiles as $mobile)
            <div class="device-card bg-white rounded-xl overflow-hidden shadow-md flex flex-col justify-between">

                <div class="relative h-48 bg-gray-200">
                    <img img src="{{$mobile->primaryImage?->url}}" alt="{{$mobile->name}}" class="w-full h-full object-cover">
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-800">{{$mobile->name}}</h3>
                        <span class="text-lg font-semibold text-blue-600"></span> <!--price-->
                    </div>
                    <p class="text-gray-600 mb-3">Company: <span class="font-medium">{{$mobile->brand->name}} </span></p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-blue -100 text-blue-800 text-xs rounded-full">{{$mobile->operatingSystem->name}}</span>
                        <span class="px-2 py-1 status-new text-white text-xs rounded-full">{{$mobile->specification->cpu}}</span>
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">{{$mobile->specification->ram}}</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{$mobile->specification->gpu}}</span>
                    </div>

                    <p class="text-gray-700 mb-4"></p>
                    <a href="{{ route('mobil_details', $mobile->id) }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition flex items-center justify-center">
                        <i class="fas fa-info-circle mr-2"></i> More Details
                    </a>

                </div>
            </div>
            @endforeach
    </main>
    {{ $newMobiles->links('customers.vendor.pagination.custom') }}
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
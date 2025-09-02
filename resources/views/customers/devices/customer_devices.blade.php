@extends('customers.layout.app')

@section('title','Mobile Phones Collection')

@section('content')
    <style>
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

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Available Devices</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Device Card 1 -->
             @foreach($devices as $device)
            <div class="device-card bg-white rounded-xl overflow-hidden shadow-md">
                @foreach($device->images as $image)
                <div class="relative h-48 bg-gray-200">
                    <img src="{{asset($image->path)}}" 
                         alt="mobile photo" class="w-full h-full object-cover">
                </div>
                @endforeach
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-800">{{$device->model}}</h3>
                        <span class="text-lg font-semibold text-blue-600">${{$device->price}}</span>
                    </div>
                    <p class="text-gray-600 mb-3">Posted by: <span class="font-medium">{{$device->user->name}} | {{$device->user->email}} </span></p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-blue -100 text-blue-800 text-xs rounded-full">{{$device->operatingSystem->name}}</span>
                        <span class="px-2 py-1 status-new text-white text-xs rounded-full">{{$device->condition}}</span>
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">{{$device->ram}}</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{$device->storage}}</span>
                    </div>
                    
                    <p class="text-gray-700 mb-4">{{$device->descriptions}}</p>
                    
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition flex items-center justify-center">
                        <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                    </button>
                </div>
            </div>
            @endforeach

        </div>
    </main>
</div>
@endsection
@push('scripts')

@endpush
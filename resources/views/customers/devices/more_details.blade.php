@extends('customers.layout.app')

@section('title' ,'Mobile Phone Details')

@section('content')

<div class="bg-gray-50 font-sans">
    <br><br><br>

    <main class="container mx-auto px-4 py-8">
        <!-- Phone Overview -->
        <section class="mb-12 animate-fade-in" style="animation-delay: 0.1s;">
            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="relative h-80 md:h-96 w-full">
                            <img id="main-image" src="{{$mobile->primaryImage?->image_url}}"
                                alt="{{$mobile->name}}" class="w-full h-full object-contain">
                        </div>
                        <div class="phone-gallery flex overflow-x-auto p-4 gap-2">
                            <img src="{{$mobile->primaryImage?->image_url}}"
                                onclick="changeImage(this)"
                                class="h-20 w-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-indigo-500 transition"
                                alt="Samsung Galaxy S23 Ultra front">
                            <img src="https://images.samsung.com/id/smartphones/galaxy-s23-ultra/images/galaxy-s23-ultra-highlights-back-s.jpg"
                                onclick="changeImage(this)"
                                class="h-20 w-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-indigo-500 transition"
                                alt="Samsung Galaxy S23 Ultra back">
                            <img src="https://images.samsung.com/id/smartphones/galaxy-s23-ultra/images/galaxy-s23-ultra-highlights-color-s.jpg"
                                onclick="changeImage(this)"
                                class="h-20 w-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-indigo-500 transition"
                                alt="Samsung Galaxy S23 Ultra side">
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{$mobile->name}}</h2>
                        <div class="flex items-center mb-4">
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded mr-2">Flagship</span>
                            <span class="text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-gray-600 ml-1">4.7 (1.2k reviews)</span>
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">Brand</p>
                                <p class="font-semibold">{{$mobile->brand->name}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">OS</p>
                                <p class="font-semibold">{{$mobile->operatingSystem->name}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">Released</p>
                                <p class="font-semibold">{{$mobile->date_formatted}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">Dimensions</p>
                                <p class="font-semibold">{{$mobile->description->design_dimensions}}</p>
                            </div>
                        </div>

                        @if(isset($mobile->description->key_features))
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-2 text-gray-700">Key Features</h3>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                @foreach($mobile->description->key_features as $key=>$value)
                                <li>{{$key}} : {{($value)? $value:"none"}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Detailed Specifications -->
        <section class="mb-12 animate-fade-in" style="animation-delay: 0.2s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-list-alt text-indigo-600 mr-3"></i> Detailed Specifications
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Performance -->
                <div class="bg-white rounded-xl shadow-md p-6 spec-highlight">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-microchip text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-3 text-gray-800">Performance</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">CPU</span>
                            <span class="font-medium">{{$mobile->specification->cpu}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">GPU</span>
                            <span class="font-medium">{{$mobile->specification->gpu}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">RAM</span>
                            <span class="font-medium">{{$mobile->specification->ram}}</span>
                        </li>
                    </ul>
                </div>

                <!-- Display -->
                <div class="bg-white rounded-xl shadow-md p-6 spec-highlight">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-screen text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-3 text-gray-800">Display</h3>

                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Type</span>
                            <span class="font-medium">{{$mobile->description->display['type']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Size</span>
                            <span class="font-medium">{{$mobile->description->display['size']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Resolution</span>
                            <span class="font-medium">{{$mobile->description->display['resolution']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Refresh Rate</span>
                            <span class="font-medium">{{$mobile->description->display['refresh_rate']}}</span>
                        </li>
                    </ul>
                </div>

                <!-- Camera -->
                <div class="bg-white rounded-xl shadow-md p-6 spec-highlight">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-camera text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-3 text-gray-800">Camera</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Main</span>
                            <span class="font-medium">{{$mobile->specification->camera['main']}}</span>
                        </li>
                        @if(isset($mobile->specification->camera['ultrawide']))
                        <li class="flex justify-between">
                            <span class="text-gray-600">Ultrawide</span>
                            <span class="font-medium">{{$mobile->specification->camera['ultrawide']}}</span>
                        </li>
                        @endif
                        @if(isset($mobile->specification->camera['telephoto']))
                        <li class="flex justify-between">
                            <span class="text-gray-600">Telephoto</span>
                            <span class="font-medium">{{$mobile->specification->camera['telephoto']}}</span>
                        </li>
                        @endif
                        @if(isset($mobile->specification->camera['front']))
                        <li class="flex justify-between">
                            <span class="text-gray-600">Front</span>
                            <span class="font-medium">{{$mobile->specification->camera['front']}}</span>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Battery -->
                <div class="bg-white rounded-xl shadow-md p-6 spec-highlight">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-battery-three-quarters text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-3 text-gray-800">Battery</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Capacity</span>
                            <span class="font-medium">{{$mobile->specification->battery['capacity']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Wired Charging</span>
                            <span class="font-medium">{{$mobile->specification->battery['wired_charging']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Wireless</span>
                            <span class="font-medium">{{$mobile->specification->battery['wireless']}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Reverse Wireless</span>
                            <span class="font-medium">{{$mobile->specification->battery['reverse_wireless']}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Storage Options -->
        <section class="mb-12 animate-fade-in" style="animation-delay: 0.3s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-database text-indigo-600 mr-3"></i> Storage Options
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($mobile->specification->storage as $value=>$p)
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 transition hover:shadow-lg">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg text-gray-800">{{$value}}</h3>
                        <!--<span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">Entry</span>-->
                    </div>
                    <p class="text-gray-600 mb-4">{{$p}}</p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Pros & Cons -->
        <section class="mb-12 animate-fade-in" style="animation-delay: 0.4s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Pros & Cons</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-check text-green-600 text-lg"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Advantages</h3>
                    </div>
                    @if(isset($mobile->description->pros))
                    <ul class="space-y-3">
                        @foreach($mobile->description->pros as $pro)
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <p class="font-medium text-gray-800">{{$pro}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-times text-red-600 text-lg"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Disadvantages</h3>
                    </div>

                    @if(isset($mobile->description->cons))
                    <ul class="space-y-3">
                        @foreach($mobile->description->cons as $con)
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mr-3 mt-1"></i>
                            <div>
                                <p class="font-medium text-gray-800">{{$con}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </section>

        <!-- Connectivity & Security -->
        <section class="animate-fade-in" style="animation-delay: 0.5s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-wifi text-indigo-600 mr-3"></i> Connectivity & Security
            </h2>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200">
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-4 text-gray-800">Connectivity</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-sim-card text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['network']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-wifi text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['wi_fi']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-bluetooth text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['bluetooth_version']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-satellite-dish text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['short_range']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-location-dot text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['GNSS']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-usb text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->connectivity['USB']}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-4 text-gray-800">Security Features</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-fingerprint text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->security_features['fingerprint_sensor_type']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-face-smile text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->security_features['biometric_authentication']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-shield text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->security_features['security_platform']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-user-lock text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->security_features['private_file_protection']}}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-mobile-screen-button text-indigo-500 w-6 mr-3"></i>
                                <span>{{$mobile->specification->security_features['ingress_protection_rating']}}</span>
                            </li>
                        </ul>
                        <div class="mt-6 bg-indigo-50 p-3 rounded-lg">
                            <div class="flex">
                                <i class="fas fa-shield-alt text-indigo-600 mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Security Updates</h4>
                                    <p class="text-sm text-gray-600">{{$mobile->specification->security_features['security_updates_policy']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Review Section -->
    <section class="bg-indigo-50 py-12 animate-fade-in" style="animation-delay: 0.6s;">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">User Reviews</h2>
            <p class="text-gray-600 mb-8 text-center">What people are saying about this phone</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-purple-500 text-white flex items-center justify-center font-bold mr-3">R</div>
                        <div>
                            <h4 class="font-medium">Robert Johnson</h4>
                            <div class="flex items-center">
                                <div class="text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">2 days ago</span>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-medium mb-2">Best camera phone ever</h4>
                    <p class="text-gray-600 text-sm">The 200MP camera is a game-changer. Photos are incredibly detailed even when zoomed in. The 10x optical zoom is magical for capturing distant subjects.</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center font-bold mr-3">S</div>
                        <div>
                            <h4 class="font-medium">Sarah Williams</h4>
                            <div class="flex items-center">
                                <div class="text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">1 week ago</span>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-medium mb-2">Powerhouse performance</h4>
                    <p class="text-gray-600 text-sm">The Snapdragon 8 Gen 2 is blazing fast. Multitasking is super smooth and gaming performance is top-notch. The only downside is the size - it's quite large.</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-pink-500 text-white flex items-center justify-center font-bold mr-3">M</div>
                        <div>
                            <h4 class="font-medium">Michael Chen</h4>
                            <div class="flex items-center">
                                <div class="text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">2 weeks ago</span>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-medium mb-2">S Pen is useful</h4>
                    <p class="text-gray-600 text-sm">As a Note series fan, I love having S Pen support. Screen is gorgeous and battery lasts over a day. Wish it had faster charging though.</p>
                </div>
            </div>

            <div class="text-center mt-8">
                <button class="bg-white hover:bg-gray-100 text-indigo-600 font-medium px-6 py-3 rounded-lg shadow border border-gray-200 transition">
                    <i class="fas fa-comments mr-2"></i> See All 1,283 Reviews
                </button>
            </div>
        </div>
    </section>


    <!-- Nearest Agents Section -->
    <section id="find-agents" class="py-12 bg-white animate-fade-in" style="animation-delay: 0.7s;">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">Find Nearest Agents</h2>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Looking for a specific device? Find authorized agents near you who have it in stock.</p>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <form id="agentSearchForm" action="{{ route('search.agents') }}" method="post">
                        @csrf
                        <input type="hidden" name="mobile_id" value="{{ $mobile->id }}">
                        <h3 class="text-xl font-bold mb-4">Search Filters</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Device Model</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $mobile->name }}" readonly>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                                <!-- Country Selector -->
                                <div class="relative group">
                                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1.5">Country</label>
                                    <div class="relative">
                                        <select id="country" name="country_id" required class="appearance-none w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all duration-300 bg-white text-gray-800 shadow-sm hover:border-gray-400 cursor-pointer">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Province Selector -->
                                <div class="relative group">
                                    <label for="province" class="block text-sm font-medium text-gray-700 mb-1.5">Province/State</label>
                                    <div class="relative">
                                        <select id="province" name="city_id" required class="appearance-none w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all duration-300 bg-gray-50 text-gray-500 shadow-sm cursor-not-allowed" disabled>
                                            <option value="">Select Country First</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Type Toggle -->
                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="search_type" value="city" checked class="form-radio text-indigo-600">
                                    <span class="ml-2">Search in entire province</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="search_type" value="radius" class="form-radio text-indigo-600">
                                    <span class="ml-2">Search within radius</span>
                                </label>
                            </div>

                            <!-- Radius Fields (Hidden by default) -->
                            <div id="radiusFields" class="hidden space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Radius (km)</label>
                                    <input type="number" name="radius" min="1" value="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" readonly>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" readonly>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                                Search Agents
                            </button>
                        </div>
                    </form>

                    <div class="lg:col-span-2">
                        <div class="border rounded-lg p-4 h-96 flex flex-col">
                            <div id="map" class="flex-grow mb-2 relative"></div>
                            <p class="text-sm text-gray-700 flex-none">
                                Address: <span id="address" class="font-medium">Select location to search</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Results Container -->
                <div class="mt-8" id="agentsResultsContainer">
                    <h4 class="font-bold text-lg mb-4">Agents Near You</h4>
                    <div class="space-y-4" id="agentsResults">
                        <div class="text-center py-8 text-gray-500" id="noResultsMessage">
                            Please select country and city to search for agents
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Map Initialization
        const map = L.map('map').setView([35.5186, 35.7916], 7);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Main Marker Setup
        const mainMarker = L.marker([35.5186, 35.7916], {
            draggable: true
        }).addTo(map);
        document.getElementById('latitude').value = 35.5186;
        document.getElementById('longitude').value = 35.7916;

        // Agent Markers Management
        const agentMarkers = [];

        // UI Event Handlers
        setupSearchToggle();
        setupMapEvents();
        setupFormSubmission();
        initializeAddress();

        // Core Functions
        function setupSearchToggle() {
            document.querySelectorAll('input[name="search_type"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.getElementById('radiusFields').classList.toggle('hidden', this.value !== 'radius');
                });
            });
        }

        function setupMapEvents() {
            // Click handler for map
            map.on('click', function(e) {
                mainMarker.setLatLng(e.latlng);
                updateAddress(e.latlng.lat, e.latlng.lng);
            });

            // Drag handler for marker
            mainMarker.on('dragend', function(e) {
                const pos = mainMarker.getLatLng();
                updateAddress(pos.lat, pos.lng);
            });
        }

        function setupFormSubmission() {
            document.getElementById('agentSearchForm').addEventListener('submit', function(e) {
                e.preventDefault();
                clearSearchResults();

                const formData = new FormData(this);
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Searching...';

                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(handleSearchResponse)
                    .catch(handleSearchError)
                    .finally(() => resetSubmitButton(submitButton));
            });
        }

        function handleSearchResponse(response) {
            return response.json().then(data => {
                if (data.success && data.agents.length > 0) {
                    displayAgentsResults(data.agents);
                    addAgentMarkers(data.agents);
                    document.getElementById('noResultsMessage').classList.add('hidden');
                } else {
                    showNoResultsMessage('No agents found with this device in the selected area');
                }
            });
        }

        function handleSearchError(error) {
            console.error('Error:', error);
            showNoResultsMessage('An error occurred while searching for agents');
        }

        function resetSubmitButton(button) {
            button.disabled = false;
            button.textContent = 'Search Agents';
        }

        function clearSearchResults() {
            clearAgentMarkers();
            document.getElementById('agentsResults').innerHTML = '<div class="text-center py-8 text-gray-500">Searching...</div>';
        }

        function showNoResultsMessage(message) {
            const noResults = document.getElementById('noResultsMessage');
            noResults.classList.remove('hidden');
            noResults.textContent = message;
        }

        // Agent Markers Functions
        function clearAgentMarkers() {
            agentMarkers.forEach(marker => map.removeLayer(marker));
            agentMarkers.length = 0;
        }

        function addAgentMarkers(agents) {
            agents.forEach(agent => {
                if (agent.latitude && agent.longitude) {
                    const marker = createAgentMarker(agent);
                    agentMarkers.push(marker);
                }
            });

            if (agentMarkers.length > 0) {
                const markerGroup = new L.featureGroup(agentMarkers);
                map.fitBounds(markerGroup.getBounds().pad(0.2));
            }
        }

        function createAgentMarker(agent) {
            const quantity = agent.quantity || agent.agent_mobile_stocks?.quantity || 0;
            const price = agent.price || agent.agent_mobile_stocks?.price || 0;

            const marker = L.marker([agent.latitude, agent.longitude], {
                icon: L.divIcon({
                    className: 'agent-marker',
                    html: `
                    <div class="relative">
                        <div class="bg-indigo-600 text-white rounded-full p-3 shadow-lg border-2 border-white">
                            <i class="fas fa-store"></i>
                        </div>
                        ${quantity > 0 ? `
                        <div class="absolute -top-1 -right-1 bg-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold border-2 border-indigo-600">
                            <span class="text-gray-800">${quantity}</span>
                        </div>
                        ` : ''}
                    </div>
                `,
                    iconSize: [36, 36],
                    iconAnchor: [18, 18]
                })
            }).addTo(map);

            marker.bindPopup(createAgentPopupContent(agent, quantity, price));
            return marker;
        }

        function createAgentPopupContent(agent, quantity, price) {
            return `
            <div class="min-w-[220px]">
                <h4 class="font-bold text-lg mb-2">${agent.name}</h4>
                <div class="flex items-center mb-2">
                    ${agent.rating ? `
                    <div class="flex text-yellow-400 text-sm mr-2">
                        ${generateStarRating(agent.rating)}
                        <span class="text-gray-600 ml-1">(${agent.reviews_count || 0})</span>
                    </div>
                    ` : ''}
                </div>
                <div class="text-sm mb-2"><i class="fas fa-map-marker-alt text-gray-500 mr-1"></i> ${agent.address || 'No address'}</div>
                <div class="grid grid-cols-2 gap-2 mb-2">
                    <div class="text-sm"><i class="fas fa-box-open text-gray-500 mr-1"></i> ${quantity} available</div>
                    <div class="text-sm"><i class="fas fa-tag text-gray-500 mr-1"></i> $${price}</div>
                    ${agent.distance ? `<div class="text-sm"><i class="fas fa-route text-gray-500 mr-1"></i> ${agent.distance.toFixed(2)} km</div>` : ''}
                </div>
                <a href="/agents/${agent.id}" class="block mt-2 text-center bg-indigo-600 text-white py-1 px-3 rounded text-sm hover:bg-indigo-700 transition">
                    View Profile
                </a>
            </div>
            `;
        }

        // Address Handling
        function initializeAddress() {
            updateAddress(35.5186, 35.7916);
            setupLocationSelectors();
        }

        function setupLocationSelectors() {
            document.getElementById('country').addEventListener('change', handleCountryChange);
            document.getElementById('province').addEventListener('change', handleProvinceChange);
        }

        function handleCountryChange() {
            const countryId = this.value;
            const provinceSelect = document.getElementById('province');
            const provinceWrapper = provinceSelect.closest('.relative');

            provinceSelect.innerHTML = '<option value="">Loading...</option>';
            provinceSelect.disabled = true;
            provinceSelect.classList.replace('bg-white', 'bg-gray-50');
            provinceSelect.classList.replace('text-gray-800', 'text-gray-500');
            provinceSelect.classList.replace('cursor-pointer', 'cursor-not-allowed');
            provinceWrapper.classList.add('animate-pulse');

            if (countryId) {
                fetch(`/get-provinces/${countryId}`)
                    .then(handleProvinceResponse)
                    .catch(handleProvinceError)
                    .finally(() => provinceWrapper.classList.remove('animate-pulse'));
            } else {
                resetProvinceSelector();
            }
        }

        function handleProvinceResponse(response) {
            return response.json().then(data => {
                const provinceSelect = document.getElementById('province');
                let options = '<option value="">Select Province</option>';

                if (data.length > 0) {
                    options += data.map(province =>
                        `<option value="${province.id}" data-name="${province.name}">${province.name}</option>`
                    ).join('');

                    provinceSelect.disabled = false;
                    provinceSelect.classList.replace('bg-gray-50', 'bg-white');
                    provinceSelect.classList.replace('text-gray-500', 'text-gray-800');
                    provinceSelect.classList.replace('cursor-not-allowed', 'cursor-pointer');
                } else {
                    options = '<option value="">No provinces available</option>';
                }

                provinceSelect.innerHTML = options;
            });
        }

        function handleProvinceError() {
            document.getElementById('province').innerHTML = '<option value="">Error loading provinces</option>';
        }

        function resetProvinceSelector() {
            const provinceSelect = document.getElementById('province');
            provinceSelect.innerHTML = '<option value="">Select Country First</option>';
        }

        function handleProvinceChange() {
            const selectedOption = this.options[this.selectedIndex];
            if (!selectedOption.value) return;

            const provinceName = selectedOption.getAttribute('data-name');
            const countryName = document.getElementById('country').options[document.getElementById('country').selectedIndex].text;
            const query = `${provinceName}, ${countryName}`;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length > 0) {
                        const lat = parseFloat(data[0].lat);
                        const lon = parseFloat(data[0].lon);
                        map.setView([lat, lon], 12);
                        mainMarker.setLatLng([lat, lon]);
                        updateAddress(lat, lon);
                    } else {
                        document.getElementById('address').textContent = 'Location not found';
                    }
                });
        }

        function updateAddress(lat, lon) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&accept-language=en`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('address').textContent = data.display_name || 'Location selected';
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                    updateProvinceFromAddress(data.address);
                });
        }

        function updateProvinceFromAddress(address) {
            const cityName = address.state || address.county || address.city || address.town || address.village || '';
            if (!cityName) return;

            const provinceSelect = document.getElementById('province');
            for (let i = 0; i < provinceSelect.options.length; i++) {
                if (provinceSelect.options[i].text.toLowerCase() === cityName.toLowerCase()) {
                    provinceSelect.selectedIndex = i;
                    break;
                }
            }
        }

        // Display Agents Results
        function displayAgentsResults(agents) {
            const resultsContainer = document.getElementById('agentsResults');
            resultsContainer.innerHTML = '';

            if (agents.length === 0) {
                resultsContainer.innerHTML = '<div class="text-center py-8 text-gray-500">No agents found</div>';
                return;
            }

            agents.forEach(agent => {
                resultsContainer.appendChild(createAgentResultElement(agent));
            });
        }

        function createAgentResultElement(agent) {
            const quantity = agent.quantity || agent.agent_mobile_stocks?.quantity || 0;
            const price = agent.price || agent.agent_mobile_stocks?.price || 0;
            const distance = agent.distance ? agent.distance.toFixed(2) : 'N/A';

            const element = document.createElement('div');
            element.className = 'p-4 border rounded-lg hover:bg-gray-50 cursor-pointer transition hover:border-indigo-300';
            element.innerHTML = `
            <div class="flex items-center justify-between">
                <div>
                    <h5 class="font-bold">${agent.name}</h5>
                    <p class="text-gray-600">${agent.email}</p>
                    <div class="mt-2 flex items-center">
                        ${agent.rating ? `
                        <div class="flex text-yellow-400 text-sm">
                            ${generateStarRating(agent.rating)}
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(${agent.reviews_count || 0})</span>
                        ` : ''}
                        <span class="ml-3 text-sm text-gray-500">
                            <i class="fas fa-box-open mr-1"></i> ${quantity}
                        </span>
                        <span class="ml-3 text-sm text-gray-500">
                            <i class="fas fa-tag mr-1"></i> $${price}
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">${distance} km</p>
                    <a href="/agents/${agent.id}" class="text-indigo-600 hover:underline text-sm">View profile</a>
                </div>
            </div>
        `;

            // Add hover effect to show marker on map
            if (agent.latitude && agent.longitude) {
                element.addEventListener('mouseenter', () => {
                    const marker = agentMarkers.find(m =>
                        m.getLatLng().lat === agent.latitude &&
                        m.getLatLng().lng === agent.longitude
                    );
                    if (marker) {
                        marker.openPopup();
                        map.setView([agent.latitude, agent.longitude], 14, {
                            animate: true,
                            duration: 0.5
                        });
                    }
                });
            }

            return element;
        }

        // Helper Functions
        function generateStarRating(rating) {
            rating = parseFloat(rating) || 0;
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;

            stars += '<i class="fas fa-star"></i>'.repeat(fullStars);
            if (hasHalfStar) stars += '<i class="fas fa-star-half-alt"></i>';
            stars += '<i class="far fa-star"></i>'.repeat(5 - fullStars - (hasHalfStar ? 1 : 0));

            return stars;
        }
    });

    // Add CSS for map markers
    const markerStyles = document.createElement('style');
    markerStyles.textContent = `
    .agent-marker {
        background: transparent !important;
        border: none !important;
    }
    .animate-pulse {
        animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
`;
    document.head.appendChild(markerStyles);
</script>
@endpush
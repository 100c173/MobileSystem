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
                            <img id="main-image" src="{{$mobile->primaryImage->image_url}}" 
                                 alt="{{$mobile->name}}" class="w-full h-full object-contain">
                        </div>
                        <div class="phone-gallery flex overflow-x-auto p-4 gap-2">
                            <img src="{{$mobile->primaryImage->image_url}}" 
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
                        
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-2 text-gray-700">Key Features</h3>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>200MP Wide Camera with Nightography</li>
                                <li>Snapdragon 8 Gen 2 for Galaxy chipset</li>
                                <li>6.8" Dynamic AMOLED 2X, 120Hz</li>
                                <li>5000mAh battery with 45W fast charging</li>
                                <li>S Pen included, IP68 water resistance</li>
                            </ul>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition flex-1">
                                <i class="fas fa-shopping-cart mr-2"></i> Buy Now
                            </button>
                            <button class="border border-indigo-600 text-indigo-600 hover:bg-indigo-50 px-6 py-3 rounded-lg font-medium transition">
                                <i class="fas fa-heart mr-2"></i> Wishlist
                            </button>
                        </div>
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
                            <span class="font-medium">Adreno 740</span>
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
                            <span class="font-medium">Dynamic AMOLED 2X</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Size</span>
                            <span class="font-medium">6.8 inches</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Resolution</span>
                            <span class="font-medium">1440 x 3088 (500ppi)</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Refresh Rate</span>
                            <span class="font-medium">1-120Hz adaptive</span>
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
                            <span class="font-medium">200MP, f/1.7</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Ultrawide</span>
                            <span class="font-medium">12MP, f/2.2</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Telephoto</span>
                            <span class="font-medium">10MP 3x, 10MP 10x</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Front</span>
                            <span class="font-medium">12MP, f/2.2</span>
                        </li>
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
                            <span class="font-medium">5000mAh</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Wired Charging</span>
                            <span class="font-medium">45W</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Wireless</span>
                            <span class="font-medium">15W</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Reverse Wireless</span>
                            <span class="font-medium">4.5W</span>
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
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 transition hover:shadow-lg">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg text-gray-800">128GB</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">Entry</span>
                    </div>
                    <p class="text-gray-600 mb-4">Base model with UFS 3.1 storage</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900">$999</span>
                        <button class="text-indigo-600 hover:text-indigo-800 font-medium">View Offers</button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 transition hover:shadow-lg relative">
                    <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow">POPULAR</span>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg text-gray-800">256GB</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">Best Value</span>
                    </div>
                    <p class="text-gray-600 mb-4">UFS 4.0 storage with faster speeds</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900">$1,119</span>
                        <button class="text-indigo-600 hover:text-indigo-800 font-medium">View Offers</button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 transition hover:shadow-lg">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg text-gray-800">1TB</h3>
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-0.5 rounded">Pro</span>
                    </div>
                    <p class="text-gray-600 mb-4">Maximum storage with UFS 4.0</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900">$1,599</span>
                        <button class="text-indigo-600 hover:text-indigo-800 font-medium">View Offers</button>
                    </div>
                </div>
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
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Best-in-class display</h4>
                                <p class="text-sm text-gray-600">Vibrant 120Hz AMOLED with 1750 nits peak brightness</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Versatile camera system</h4>
                                <p class="text-sm text-gray-600">200MP main sensor with excellent 10x optical zoom</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Premium build quality</h4>
                                    <p class="text-sm text-gray-600">Armor aluminum frame with Gorilla Glass Victus 2</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Built-in S Pen support</h4>
                                    <p class="text-sm text-gray-600">Rare feature in non-Note smartphones</p>
                                </div>
                            </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-times text-red-600 text-lg"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Disadvantages</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Bulky and heavy</h4>
                                <p class="text-sm text-gray-600">234g weight makes it uncomfortable for long use</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Slow charging</h4>
                                <p class="text-sm text-gray-600">45W charging lags behind competitors</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Price premium</h4>
                                <p class="text-sm text-gray-600">Most expensive Android flagship</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">No charger in box</h4>
                                <p class="text-sm text-gray-600">Need to purchase 45W charger separately</p>
                            </div>
                        </li>
                    </ul>
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
                                <span>5G (Sub6/mmWave), LTE-A</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-wifi text-indigo-500 w-6 mr-3"></i>
                                <span>Wi-Fi 6E (802.11ax)</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-bluetooth text-indigo-500 w-6 mr-3"></i>
                                <span>Bluetooth 5.3</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-satellite-dish text-indigo-500 w-6 mr-3"></i>
                                <span>NFC, UWB, MST</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-location-dot text-indigo-500 w-6 mr-3"></i>
                                <span>GPS (L1+L5), GLONASS, BDS, Galileo</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-usb text-indigo-500 w-6 mr-3"></i>
                                <span>USB Type-C 3.2</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-4 text-gray-800">Security Features</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-fingerprint text-indigo-500 w-6 mr-3"></i>
                                <span>Ultrasonic in-display fingerprint sensor</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-face-smile text-indigo-500 w-6 mr-3"></i>
                                <span>Face recognition</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-shield text-indigo-500 w-6 mr-3"></i>
                                <span>Samsung Knox security platform</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-user-lock text-indigo-500 w-6 mr-3"></i>
                                <span>Secure Folder for private files</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-mobile-screen-button text-indigo-500 w-6 mr-3"></i>
                                <span>IP68 dust/water resistant</span>
                            </li>
                        </ul>
                        <div class="mt-6 bg-indigo-50 p-3 rounded-lg">
                            <div class="flex">
                                <i class="fas fa-shield-alt text-indigo-600 mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Security Updates</h4>
                                    <p class="text-sm text-gray-600">5 years of security updates guaranteed by Samsung</p>
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

    <!-- Alternative Phones -->
    <section class="py-12 bg-white animate-fade-in" style="animation-delay: 0.7s;">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">You Might Also Like</h2>
            <p class="text-gray-600 mb-8 text-center">Similar flagship smartphones to compare</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://images.samsung.com/id/smartphones/galaxy-s23/images/galaxy-s23-highlights-kv.jpg" 
                         alt="Samsung Galaxy S23" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg">Galaxy S23</h3>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded">Compact</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Compact flagship with same powerful chipset</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold">From $799</span>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://www.apple.com/v/iphone-14-pro/c/images/overview/hero/hero_endframe__e0ai2200gkk2_large.jpg" 
                         alt="iPhone 14 Pro Max" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg">iPhone 14 Pro Max</h3>
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-0.5 rounded">iOS</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Apple's competitor with Dynamic Island</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold">From $1,099</span>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View Details</button>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://i0.wp.com/techweez.com/wp-content/uploads/2023/03/Xiaomi-13-Pro.jpg" 
                         alt="Xiaomi 13 Pro" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg">Xiaomi 13 Pro</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded">Value</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">1-inch sensor camera & 120W charging</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold">From $999</span>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View Details</button>
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
        // Change main product image
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
            // Remove all borders
            const allThumbs = document.querySelectorAll('.phone-gallery img');
            allThumbs.forEach(thumb => thumb.classList.remove('border-indigo-500'));
            // Add border to clicked thumb
            element.classList.add('border-indigo-500');
        }


        // Animation observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                }
            });
        });

        document.querySelectorAll('.animate-fade-in').forEach(el => {
            el.style.opacity = 0;
            observer.observe(el);
        });
    </script>
@endpush
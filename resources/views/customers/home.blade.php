@extends('customers.layout.app')

@section('title','MobileTech Hub | Latest Phones & Devices')

@include('customers.components.alerts')
@section('content')
<div class="font-sans bg-gray-50">
    <!-- Login/Register Modal -->
    <div id="auth-modal" class="fixed inset-0 bg-grayn-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="login-form rounded-xl shadow-2xl p-8 max-w-md w-full relative">
            <button id="close-auth" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>

            <!-- Tabs -->
            <div class="flex border-b mb-6 relative">
                <div id="login-tab" class="w-1/2 text-center py-2 font-semibold text-indigo-600 cursor-pointer">Login</div>
                <div id="register-tab" class="w-1/2 text-center py-2 font-semibold text-gray-500 cursor-pointer">Register</div>
                <div id="active-tab-indicator" class="absolute bottom-0 left-0 h-1 w-1/2 bg-indigo-600 transition-all"></div>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="space-y-4">
                <h2 class="text-2xl font-bold text-white mb-6">Welcome Back!</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-white mb-1">Email</label>
                        <input name="email" type="email" id="login-email" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="login-password" class="block text-sm font-medium text-white mb-1">Password</label>
                        <input name="password" type="password" id="login-password" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 rounded">
                            <label for="remember" class="ml-2 block text-sm text-white">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-indigo-200 hover:text-white">Forgot password?</a>
                    </div>
                    <button type='submit' class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">Login</button>
                    <p class="text-center text-sm text-white">Don't have an account? <span id="switch-to-register" class="text-indigo-300 cursor-pointer hover:underline">Register</span></p>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="space-y-4 hidden">
                <h2 class="text-2xl font-bold text-white mb-6">Create Account</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="reg-name" class="block text-sm font-medium text-white mb-1">Full Name</label>
                        <input name="name" type="text" id="reg-name" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="reg-email" class="block text-sm font-medium text-white mb-1">Email</label>
                        <input name="email" type="email" id="reg-email" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="reg-password" class="block text-sm font-medium text-white mb-1">Password</label>
                        <input name="password" type="password" id="reg-password" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="reg-confirm" class="block text-sm font-medium text-white mb-1">Confirm Password</label>
                        <input name="password_confirmation" type="password" id="reg-confirm" class="w-full px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <button type='submit' class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">Register</button>
                    <p class="text-center text-sm text-white">Already have an account? <span id="switch-to-login" class="text-indigo-300 cursor-pointer hover:underline">Login</span></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient pt-24 pb-16 text-white">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover the Latest Mobile Technology</h1>
                <p class="text-lg mb-8 opacity-90">Explore, compare, and purchase the hottest smartphones from leading brands and trusted agents worldwide.</p>
                <div class="flex space-x-4">
                    <a href="#shop" class="bg-white text-indigo-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition">Shop Now</a>
                    <a href="#agents" class="border border-white hover:bg-white hover:bg-opacity-10 px-6 py-3 rounded-lg font-semibold transition">Become an Agent</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative w-full max-w-md">
                    <img src="https://images.unsplash.com/photo-1512054502232-10a0a035d672?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                        alt="Premium smartphones" class="rounded-xl shadow-2xl w-full">
                    <div class="absolute -bottom-6 -right-6 bg-white shadow-lg rounded-lg p-4 hidden md:block">
                        <div class="flex items-center">
                            <div class="bg-indigo-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-shipping-fast text-indigo-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Fast delivery</p>
                                <p class="font-semibold">1-3 business days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Devices Section -->
    <section id="latest-devices" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">Latest Devices</h2>
                <a href="/latest_devices" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Devices Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Device Card 1 -->
                <div class="device-card bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1611472173362-3f53dbd65d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                            alt="iPhone 14 Pro Max" class="w-full h-64 object-cover device-image transition-all">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">iPhone 14 Pro Max</h3>
                                <p class="text-gray-600">iOS 16</p>
                            </div>
                            <div class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-sm font-semibold">New</div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700 line-clamp-2">Dynamic Island, Pro camera system, Always-On display, and all-day battery life on iPhone's brightest display yet...</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <a href="MobileSpec.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                See Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Device Card 2 -->
                <div class="device-card bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1611472173362-3f53dbd65d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                            alt="iPhone 14 Pro Max" class="w-full h-64 object-cover device-image transition-all">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">iPhone 14 Pro Max</h3>
                                <p class="text-gray-600">iOS 16</p>
                            </div>
                            <div class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-sm font-semibold">New</div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700 line-clamp-2">Dynamic Island, Pro camera system, Always-On display, and all-day battery life on iPhone's brightest display yet...</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <a href="MobileSpec.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                See Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Device Card 3 -->
                <div class="device-card bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1611472173362-3f53dbd65d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                            alt="iPhone 14 Pro Max" class="w-full h-64 object-cover device-image transition-all">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">iPhone 14 Pro Max</h3>
                                <p class="text-gray-600">iOS 16</p>
                            </div>
                            <div class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-sm font-semibold">New</div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700 line-clamp-2">Dynamic Island, Pro camera system, Always-On display, and all-day battery life on iPhone's brightest display yet...</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <a href="MobileSpec.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                See Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Trusted Brands</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3">
                <div class="flex justify-center items-center h-24 hover:scale-105 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg" alt="Samsung" class="h-12">
                </div>
                <div class="flex justify-center items-center h-24 hover:scale-105 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" class="h-12">
                </div>
                <div class="flex justify-center items-center h-24 hover:scale-105 transition">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google" class="h-10">
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section -->
    <section id="shop" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">Shop Devices</h2>
                <div class="flex items-center space-x-2">
                    <button id="view-agents-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-medium">Agents' Devices</button>
                    <button id="view-users-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg font-medium">Users' Devices</button>
                </div>
            </div>


            <!-- Agents' Devices (Visible by default) -->
            <div id="agents-devices" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Agent Device 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Samsung Galaxy Z Flip4" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">Agent</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Samsung Galaxy Z Flip4</h3>
                                <p class="text-gray-600">Android 13, One UI 5.1</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$699.99</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Compact foldable design with customizable cover screen, powerful performance, and flagship camera features.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Buy Now</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                            <span class="text-gray-500">2 available at MobileTech Solutions, NYC</span>
                        </div>
                    </div>
                </div>

                <!-- Agent Device 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="iPhone 13 Pro" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">Agent</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">iPhone 13 Pro</h3>
                                <p class="text-gray-600">iOS 15</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$849.99</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Pro camera system, Super Retina XDR display with ProMotion, A15 Bionic chip, and all-day battery life.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Buy Now</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                            <span class="text-gray-500">Available at iHub Electronics, LA</span>
                        </div>
                    </div>
                </div>

                <!-- Agent Device 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="OnePlus 10 Pro" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">Agent</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">OnePlus 10 Pro</h3>
                                <p class="text-gray-600">Android 12, OxygenOS</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$699.99</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Hasselblad camera for mobile, 120Hz Fluid AMOLED display, Snapdragon 8 Gen 1, and 80W fast charging.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Buy Now</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                            <span class="text-gray-500">5 available at A1 Mobile, Chicago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users' Devices (Hidden by default) -->
            <div id="users-devices" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- User Device 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Samsung Galaxy S21 FE" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">User</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Samsung Galaxy S21 FE</h3>
                                <p class="text-gray-600">Android 11</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$450.00</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Premium Galaxy experience with flagship performance and pro-grade camera at a fan-friendly price.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Make Offer</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-info-circle text-gray-400 mr-1"></i>
                            <span class="text-gray-500">Used - Good condition</span>
                        </div>
                    </div>
                </div>

                <!-- User Device 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Google Pixel 6" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">User</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Google Pixel 6</h3>
                                <p class="text-gray-600">Android 12</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$349.99</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Google Tensor chip, pro-level computational photography, and the best of Google built in.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Make Offer</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-info-circle text-gray-400 mr-1"></i>
                            <span class="text-gray-500">Used - Like new condition</span>
                        </div>
                    </div>
                </div>

                <!-- User Device 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1556656793-08538906a9f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="iPhone 11 Pro" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-white rounded-lg px-2 py-1 shadow-sm flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-1"></div>
                            <span class="text-xs font-medium">User</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">iPhone 11 Pro</h3>
                                <p class="text-gray-600">iOS 14</p>
                            </div>
                            <div class="text-indigo-600 font-bold">$499.99</div>
                        </div>
                        <div class="mt-4 mb-6">
                            <p class="text-gray-700 line-clamp-2">Triple-camera system, Super Retina XDR display, A13 Bionic chip, and all-day battery life.</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="device-details.html" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                Details <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">Make Offer</button>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <i class="fas fa-info-circle text-gray-400 mr-1"></i>
                            <span class="text-gray-500">Used - Fair condition (scratches)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="{{route('agent_stocks')}}">
                    <button class="bg-white border border-indigo-600 text-indigo-600 hover:bg-indigo-50 px-6 py-3 rounded-lg font-medium">
                        Load More Devices
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Services</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform hover:-translate-y-2">
                    <div class="bg-indigo-100 w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Latest Devices</h3>
                    <p class="text-gray-600">Discover and explore the newest mobile phones on the market with detailed specifications and comparisons.</p>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform hover:-translate-y-2">
                    <div class="bg-indigo-100 w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4">
                        <i class="fas fa-store text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Verified Agents</h3>
                    <p class="text-gray-600">Purchase from our network of authorized agents with guaranteed authenticity and warranty services.</p>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform hover:-translate-y-2">
                    <div class="bg-indigo-100 w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4">
                        <i class="fas fa-user-tie text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Become an Agent</h3>
                    <p class="text-gray-600">Join our network of authorized agents to showcase and sell your devices to thousands of customers.</p>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform hover:-translate-y-2">
                    <div class="bg-indigo-100 w-16 h-16 flex items-center justify-center rounded-full mx-auto mb-4">
                        <i class="fas fa-exchange-alt text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Sell Your Device</h3>
                    <p class="text-gray-600">Sell your used phone safely with our verified buyer network and secure payment system.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Device Details Modal (hidden) -->
    <div id="device-details-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden overflow-y-auto p-4">
        <div class="bg-white rounded-xl max-w-5xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <!-- Close Button -->
                <div class="flex justify-end mb-4">
                    <button id="close-details" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <!-- Device Header -->
                <div class="flex flex-col md:flex-row gap-6 mb-8">
                    <!-- Images -->
                    <div class="md:w-1/2">
                        <div class="mb-4 rounded-lg overflow-hidden">
                            <img id="modal-device-img" src="" alt="Device" class="w-full h-80 object-contain bg-gray-100">
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <div class="border rounded-lg p-1 cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1610792516307-ea5acd9c0347?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    class="w-full h-16 object-cover">
                            </div>
                            <div class="border rounded-lg p-1 cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1551805437-7b5d8505f974?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    class="w-full h-16 object-cover">
                            </div>
                            <div class="border rounded-lg p-1 cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1551805437-7c679077dcc1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    class="w-full h-16 object-cover">
                            </div>
                            <div class="border rounded-lg p-1 cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1631720229250-574cb8f47549?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    class="w-full h-16 object-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="md:w-1/2">
                        <div id="modal-agent-badge" class="bg-gray-100 inline-flex items-center px-3 py-1 rounded-full text-sm mb-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            Agent: MobileTech Solutions
                        </div>
                        <h2 id="modal-device-name" class="text-3xl font-bold mb-2">Samsung Galaxy S23 Ultra</h2>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 ml-2">4.8 (142 reviews)</span>
                        </div>
                        <div class="mb-4">
                            <span id="modal-device-price" class="text-2xl font-bold text-indigo-600">$1199.99</span>
                            <span class="text-gray-500 line-through ml-2">$1299.99</span>
                            <span class="text-green-600 font-medium ml-2">Save $100</span>
                        </div>
                        <p id="modal-device-desc" class="text-gray-700 mb-6">
                            The most powerful Galaxy Ultra yet with an embedded S Pen, nightographic camera and the fastest mobile processor available. The S23 Ultra pushes boundaries with its 200MP camera, massive 5000mAh battery, and advanced AI features.
                        </p>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Available Colors:</h3>
                            <div class="flex space-x-3">
                                <button class="w-8 h-8 rounded-full bg-gray-800 border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-gray-200 border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-green-100 border-2 border-gray-300"></button>
                                <button class="w-8 h-8 rounded-full bg-purple-200 border-2 border-gray-300"></button>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Storage Options:</h3>
                            <div class="flex space-x-3">
                                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">128GB</button>
                                <button class="px-4 py-2 border border-gray-300 rounded-lg bg-indigo-100 text-indigo-700 border-indigo-300">256GB</button>
                                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">512GB</button>
                            </div>
                        </div>

                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold mb-3 transition">
                            Buy Now
                        </button>
                        <button class="w-full border border-indigo-600 text-indigo-600 hover:bg-indigo-50 py-3 rounded-lg font-semibold transition">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Details Tabs -->
                <div class="border-b mb-6">
                    <div class="flex space-x-6">
                        <button class="pb-3 font-semibold specs-highlight">Specifications</button>
                        <button class="pb-3 text-gray-500 hover:text-gray-700">Reviews</button>
                        <button class="pb-3 text-gray-500 hover:text-gray-700">Q&A</button>
                        <button class="pb-3 text-gray-500 hover:text-gray-700">Accessories</button>
                    </div>
                </div>

                <!-- Specifications Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">General</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Brand</span>
                                    <span class="font-medium">Samsung</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Model</span>
                                    <span class="font-medium">Galaxy S23 Ultra</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Released</span>
                                    <span class="font-medium">February 2023</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Dimensions</span>
                                    <span class="font-medium">163.4 x 78.1 x 8.9 mm (6.43 x 3.07 x 0.35 in)</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Weight</span>
                                    <span class="font-medium">234 g (8.25 oz)</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Colors</span>
                                    <span class="font-medium">Phantom Black, Cream, Green, Lavender</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Display</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Type</span>
                                    <span class="font-medium">Dynamic AMOLED 2X, 120Hz, HDR10+, 1750 nits</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Size</span>
                                    <span class="font-medium">6.8 inches, 114.5 cm² (~89.9% screen-to-body ratio)</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Resolution</span>
                                    <span class="font-medium">1440 x 3088 pixels (~500 ppi density)</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Performance</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">OS</span>
                                    <span class="font-medium">Android 13, One UI 5.1</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Chipset</span>
                                    <span class="font-medium">Qualcomm SM8550-AC Snapdragon 8 Gen 2</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">CPU</span>
                                    <span class="font-medium">Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">GPU</span>
                                    <span class="font-medium">Adreno 740</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Memory</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">RAM</span>
                                    <span class="font-medium">12GB LPDDR5X</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Storage</span>
                                    <span class="font-medium">256GB/512GB/1TB UFS 4.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Camera</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Main Camera</span>
                                    <span class="font-medium">200 MP, f/1.7, 1/1.3", PDAF, Laser AF, OIS</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Ultrawide</span>
                                    <span class="font-medium">12 MP, f/2.2, 120˚, 1/2.55"</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Telephoto</span>
                                    <span class="font-medium">10 MP, f/2.4, 3x optical zoom</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Selfie Camera</span>
                                    <span class="font-medium">12 MP, f/2.2, Dual Pixel PDAF</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Battery</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Type</span>
                                    <span class="font-medium">Li-Ion 5000 mAh, non-removable</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Charging</span>
                                    <span class="font-medium">45W wired, 15W wireless, 4.5W reverse wireless</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-lg mb-2">Connectivity</h3>
                            <div class="space-y-1">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Network</span>
                                    <span class="font-medium">5G, LTE-A, GSM/HSPA</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Wi-Fi</span>
                                    <span class="font-medium">Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">Bluetooth</span>
                                    <span class="font-medium">5.3, A2DP, LE</span>
                                </div>
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-500">NFC</span>
                                    <span class="font-medium">Yes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pros & Cons -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-green-50 rounded-lg p-6">
                        <h3 class="font-bold text-lg mb-4 text-green-700">Pros</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Exceptional 200MP camera with advanced zoom capabilities</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Powerful Snapdragon 8 Gen 2 chipset for flagship performance</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Brilliant 6.8" AMOLED display with 120Hz refresh rate</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Built-in S Pen functionality like a Note series</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-red-50 rounded-lg p-6">
                        <h3 class="font-bold text-lg mb-4 text-red-700">Cons</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-500 mt-1 mr-2"></i>
                                <span>Expensive flagship price tag</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-500 mt-1 mr-2"></i>
                                <span>Large and heavy design may not suit everyone</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-500 mt-1 mr-2"></i>
                                <span>Only 45W charging when competitors offer faster speeds</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nearest Agents Section -->
    <section id="find-agents" class="py-16 bg-indigo-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">Find Nearest Agents</h2>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Looking for a specific device? Find authorized agents near you who have it in stock.</p>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Search Filters</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Device Model</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="E.g. iPhone 14 Pro Max">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your location">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Distance</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>5 miles</option>
                                    <option>10 miles</option>
                                    <option>25 miles</option>
                                    <option>50 miles</option>
                                    <option>Any distance</option>
                                </select>
                            </div>
                            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                                Search Agents
                            </button>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="border rounded-lg p-4 h-96">
                            <!-- Map placeholder -->
                            <div class="bg-gray-200 h-full rounded-lg flex items-center justify-center text-gray-500">
                                <div class="text-center">
                                    <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                                    <p>Map will display here with agent locations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Results will appear here -->
                <div class="mt-8">
                    <h4 class="font-bold text-lg mb-4">Agents Near You</h4>
                    <div class="space-y-4">
                        <!-- Agent 1 -->
                        <div class="p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="font-bold">MobileTech Solutions</h5>
                                    <p class="text-gray-600">123 Tech Street, New York, NY</p>
                                    <div class="mt-2 flex items-center">
                                        <div class="flex text-yellow-400 text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-gray-500 text-sm ml-1">(342 reviews)</span>
                                        <span class="ml-3 text-sm text-gray-500"><i class="fas fa-mobile-alt mr-1"></i> 3 devices available</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-500">1.2 miles away</p>
                                    <a href="#" class="text-indigo-600 hover:underline text-sm">View profile</a>
                                </div>
                            </div>
                        </div>

                        <!-- Agent 2 -->
                        <div class="p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h5 class="font-bold">iHub Electronics</h5>
                                    <p class="text-gray-600">45 Fifth Avenue, New York, NY</p>
                                    <div class="mt-2 flex items-center">
                                        <div class="flex text-yellow-400 text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-500 text-sm ml-1">(512 reviews)</span>
                                        <span class="ml-3 text-sm text-gray-500"><i class="fas fa-mobile-alt mr-1"></i> 5 devices available</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-500">2.7 miles away</p>
                                    <a href="#" class="text-indigo-600 hover:underline text-sm">View profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Become an Agent Section -->
    <section id="agents" class="agent-section py-16">
        <div class="agent-overlay py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/2 p-8 flex flex-col justify-center">
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Become an Authorized Agent</h2>
                            <p class="text-gray-600 mb-6">Join our network of trusted mobile device agents and gain access to thousands of customers looking for your products.</p>

                            <div class="space-y-4 mb-8">
                                <div class="flex items-start">
                                    <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                        <i class="fas fa-check text-indigo-600"></i>
                                    </div>
                                    <p class="text-gray-700">Expand your customer base with our platform's reach</p>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                        <i class="fas fa-check text-indigo-600"></i>
                                    </div>
                                    <p class="text-gray-700">Get verified status that builds trust with buyers</p>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                        <i class="fas fa-check text-indigo-600"></i>
                                    </div>
                                    <p class="text-gray-700">Access our secure payment and logistics solutions</p>
                                </div>
                            </div>

                            <div class="bg-indigo-50 rounded-lg p-4 text-center">
                                <p class="text-indigo-800">"Since joining MobileTech Hub as an agent, our sales have increased by 210% with minimal additional effort."</p>
                                <p class="text-gray-600 mt-2 font-medium">— John Smith, TechTrend Mobile</p>
                            </div>
                        </div>

                        <div class="md:w-1/2 bg-gray-50 p-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Agent Application</h3>
                            <form class="space-y-4">
                                <div>
                                    <label for="business-name" class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
                                    <input type="text" id="business-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="commercial-number" class="block text-sm font-medium text-gray-700 mb-1">Commercial Number</label>
                                    <input type="text" id="commercial-number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Business Address</label>
                                    <textarea id="address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Location</label>
                                    <div class="border rounded-lg p-2 h-48 mb-2">
                                        <!-- Map placeholder -->
                                        <div class="bg-gray-200 h-full rounded-lg flex items-center justify-center text-gray-500">
                                            <div class="text-center">
                                                <i class="fas fa-map-pin text-2xl mb-2"></i>
                                                <p class="text-sm">Click on the map to select your store location</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                                            <input type="text" id="latitude" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                                            <input type="text" id="longitude" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold transition">
                                        Submit Application
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500">We'll review your application and get back to you within 2 business days.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sell Your Device Section -->
    <section id="sell-device" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-gray-50 rounded-xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Sell Your Device</h2>
                        <p class="text-gray-600 mb-6">Got a mobile device you no longer need? Sell it safely and easily through our platform to verified buyers.</p>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                    <i class="fas fa-check text-indigo-600"></i>
                                </div>
                                <p class="text-gray-700">Get the best price based on current market value</p>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                    <i class="fas fa-check text-indigo-600"></i>
                                </div>
                                <p class="text-gray-700">No hassle - we handle payment and logistics</p>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-2 rounded-lg mr-4 flex-shrink-0">
                                    <i class="fas fa-check text-indigo-600"></i>
                                </div>
                                <p class="text-gray-700">Secure transactions with buyer verification</p>
                            </div>
                        </div>

                        <div class="bg-indigo-50 rounded-lg p-4 text-center">
                            <p class="text-indigo-800">"Sold my old phone in just 2 days at a great price. The process was incredibly simple and secure!"</p>
                            <p class="text-gray-600 mt-2 font-medium">— Sarah Johnson, New York</p>
                        </div>
                    </div>

                    <div class="md:w-1/2 bg-white p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Device Details</h3>
                        <form class="space-y-4">
                            <div>
                                <label for="device-brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                <select id="device-brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>Select Brand</option>
                                    <option>Samsung</option>
                                    <option>Apple</option>
                                    <option>Google</option>
                                    <option>Xiaomi</option>
                                    <option>OnePlus</option>
                                    <option>Huawei</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="device-model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                                <input type="text" id="device-model" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="E.g. iPhone 13 Pro">
                            </div>
                            <div>
                                <label for="device-ram" class="block text-sm font-medium text-gray-700 mb-1">RAM</label>
                                <select id="device-ram" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>Select RAM</option>
                                    <option>2GB</option>
                                    <option>3GB</option>
                                    <option>4GB</option>
                                    <option>6GB</option>
                                    <option>8GB</option>
                                    <option>12GB</option>
                                    <option>16GB</option>
                                </select>
                            </div>
                            <div>
                                <label for="device-storage" class="block text-sm font-medium text-gray-700 mb-1">Storage</label>
                                <select id="device-storage" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>Select Storage</option>
                                    <option>32GB</option>
                                    <option>64GB</option>
                                    <option>128GB</option>
                                    <option>256GB</option>
                                    <option>512GB</option>
                                    <option>1TB</option>
                                </select>
                            </div>
                            <div>
                                <label for="device-condition" class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                                <select id="device-condition" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>Select Condition</option>
                                    <option>New (Sealed)</option>
                                    <option>New (Open Box)</option>
                                    <option>Used - Like New</option>
                                    <option>Used - Good</option>
                                    <option>Used - Fair</option>
                                    <option>Used - Poor</option>
                                </select>
                            </div>
                            <div>
                                <label for="device-images" class="block text-sm font-medium text-gray-700 mb-1">Upload Photos</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <i class="fas fa-camera text-2xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-500">Drag & drop photos here or click to browse</p>
                                    <input type="file" id="device-images" class="hidden" multiple>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold transition">
                                    Get Estimated Price & List Device
                                </button>
                            </div>
                            <p class="text-sm text-gray-500">We'll provide a price estimate based on current market data.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@push('scripts')
<script>
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Auth Modal
    const authBtn = document.getElementById('auth-btn');
    const authModal = document.getElementById('auth-modal');
    const closeAuth = document.getElementById('close-auth');
    const switchToRegister = document.getElementById('switch-to-register');
    const switchToLogin = document.getElementById('switch-to-login');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');
    const activeTabIndicator = document.getElementById('active-tab-indicator');

    authBtn.addEventListener('click', () => {
        authModal.classList.remove('hidden');
    });

    closeAuth.addEventListener('click', () => {
        authModal.classList.add('hidden');
    });

    switchToRegister.addEventListener('click', () => {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        activeTabIndicator.style.transform = 'translateX(100%)';
        loginTab.classList.remove('text-indigo-600');
        loginTab.classList.add('text-gray-500');
        registerTab.classList.remove('text-gray-500');
        registerTab.classList.add('text-indigo-600');
    });

    switchToLogin.addEventListener('click', () => {
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        activeTabIndicator.style.transform = 'translateX(0)';
        registerTab.classList.remove('text-indigo-600');
        registerTab.classList.add('text-gray-500');
        loginTab.classList.remove('text-gray-500');
        loginTab.classList.add('text-indigo-600');
    });

    loginTab.addEventListener('click', () => {
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        activeTabIndicator.style.transform = 'translateX(0)';
        registerTab.classList.remove('text-indigo-600');
        registerTab.classList.add('text-gray-500');
        loginTab.classList.remove('text-gray-500');
        loginTab.classList.add('text-indigo-600');
    });

    registerTab.addEventListener('click', () => {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        activeTabIndicator.style.transform = 'translateX(100%)';
        loginTab.classList.remove('text-indigo-600');
        loginTab.classList.add('text-gray-500');
        registerTab.classList.remove('text-gray-500');
        registerTab.classList.add('text-indigo-600');
    });

    // Shop Tabs
    const viewAgentsBtn = document.getElementById('view-agents-btn');
    const viewUsersBtn = document.getElementById('view-users-btn');
    const agentsDevices = document.getElementById('agents-devices');
    const usersDevices = document.getElementById('users-devices');

    viewAgentsBtn.addEventListener('click', () => {
        agentsDevices.classList.remove('hidden');
        usersDevices.classList.add('hidden');
        viewAgentsBtn.classList.remove('bg-gray-200', 'text-gray-700');
        viewAgentsBtn.classList.add('bg-indigo-600', 'text-white');
        viewUsersBtn.classList.remove('bg-indigo-600', 'text-white');
        viewUsersBtn.classList.add('bg-gray-200', 'text-gray-700');
    });

    viewUsersBtn.addEventListener('click', () => {
        agentsDevices.classList.add('hidden');
        usersDevices.classList.remove('hidden');
        viewUsersBtn.classList.remove('bg-gray-200', 'text-gray-700');
        viewUsersBtn.classList.add('bg-indigo-600', 'text-white');
        viewAgentsBtn.classList.remove('bg-indigo-600', 'text-white');
        viewAgentsBtn.classList.add('bg-gray-200', 'text-gray-700');
    });

    // Device Details Modal
    const deviceDetailsModal = document.getElementById('device-details-modal');
    const closeDetails = document.getElementById('close-details');
    const modalDeviceImg = document.getElementById('modal-device-img');
    const modalDeviceName = document.getElementById('modal-device-name');
    const modalDevicePrice = document.getElementById('modal-device-price');
    const modalDeviceDesc = document.getElementById('modal-device-desc');
    const modalAgentBadge = document.getElementById('modal-agent-badge');

    // Simulate opening device details (would be connected to actual device cards)
    document.querySelectorAll('a[href="device-details.html"]').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Get data from the clicked card (simulated here)
            const card = link.closest('.device-card');
            if (card) {
                const img = card.querySelector('img');
                const name = card.querySelector('h3').textContent;
                const os = card.querySelector('p').textContent;

                modalDeviceImg.src = img.src;
                modalDeviceImg.alt = name;
                modalDeviceName.textContent = name;
                modalDeviceDesc.textContent = card.querySelector('p.text-gray-700').textContent + ' Click to see full details.';

                // Check if it's an agent or user device
                const agentBadge = card.querySelector('.bg-green-500');
                if (agentBadge) {
                    modalAgentBadge.innerHTML = `<div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div> Agent: ${card.querySelector('.bg-white span').textContent.split(' at ')[0]}`;
                    modalAgentBadge.classList.remove('hidden');
                } else {
                    modalAgentBadge.classList.add('hidden');
                }
            }

            // Set random price for demo
            modalDevicePrice.textContent = '$' + (Math.floor(Math.random() * 1000) + 200) + '.99';

            deviceDetailsModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    closeDetails.addEventListener('click', () => {
        deviceDetailsModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    // Close modals when clicking outside
    [authModal, deviceDetailsModal].forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    });
</script>
@endpush

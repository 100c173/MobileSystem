@extends('customers.layout.app')

@section('title','MobileTech Hub | Latest Phones & Devices')


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

    <!-- Devices Introduction Section -->
    <section id="devices-intro" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Explore Our Comprehensive Device Collection</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Our full devices catalog offers an unparalleled selection of smartphones and accessories from all major brands.
                    When you click "View All", you'll gain access to:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                    <!-- Feature 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Advanced Search</h3>
                        <p class="text-gray-600">
                            Filter by brand, price range, specifications, and availability to find your perfect device
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Local Availability</h3>
                        <p class="text-gray-600">
                            See which stores near you have the device in stock with real-time inventory updates
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Detailed Comparisons</h3>
                        <p class="text-gray-600">
                            Compare multiple devices side-by-side with full specifications and expert analysis
                        </p>
                    </div>
                </div>

                <div class="bg-indigo-50 rounded-xl p-8 text-left mb-10">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">What You'll Discover:</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Complete technical specifications for every device</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Professional reviews and user ratings</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Price comparison across authorized sellers</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Special deals and bundle offers</span>
                        </li>
                    </ul>
                </div>

                <a href="/latest_devices" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    Explore All Devices
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- User Devices Marketplace Section - Descriptive Version -->
    <section id="user-devices" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Pre-Owned Devices Marketplace</h2>
                <p class="text-lg text-gray-600">
                    A trusted platform for buying and selling quality used devices within our community
                </p>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Why Choose Our Marketplace?</h3>
                <div class="space-y-4 text-gray-700">
                    <p>
                        Our pre-owned devices marketplace connects buyers with sellers in a secure environment.
                        Every listing undergoes verification to ensure authenticity and accurate condition descriptions.
                    </p>
                    <p>
                        For buyers, we offer:
                    </p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Quality-checked devices from verified sellers</li>
                        <li>Detailed condition reports with transparent pricing</li>
                        <li>Secure payment options with buyer protection</li>
                        <li>Local pickup options to inspect before purchase</li>
                    </ul>
                    <p class="pt-2">
                        For sellers, we provide:
                    </p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Access to thousands of potential buyers</li>
                        <li>Simple listing process with professional presentation</li>
                        <li>Competitive pricing tools based on market data</li>
                        <li>Safe transaction handling</li>
                    </ul>
                </div>
            </div>

            <!-- Statistics Panel -->
            <div class="bg-indigo-50 rounded-xl p-6 mb-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                    <div>
                        <div class="text-2xl font-bold text-indigo-600">5,000+</div>
                        <div class="text-sm text-gray-600">Devices Sold</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-indigo-600">98%</div>
                        <div class="text-sm text-gray-600">Positive Feedback</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-indigo-600">1,200+</div>
                        <div class="text-sm text-gray-600">Active Sellers</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-indigo-600">24h</div>
                        <div class="text-sm text-gray-600">Avg. Response Time</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{route('agent_stocks')}}" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    Browse Available Devices
                </a>
                <a href="#sell-device" class="inline-flex justify-center items-center px-6 py-3 border border-indigo-600 text-base font-medium rounded-md shadow-sm text-indigo-600 bg-white hover:bg-indigo-50 transition">
                    Sell Your Device
                </a>
            </div>

            <!-- Testimonial -->
            <div class="mt-12 text-center">
                <blockquote class="max-w-2xl mx-auto">
                    <p class="text-lg text-gray-600 italic mb-4">
                        "Sold my old phone in just 2 days at a great price. The process was incredibly simple and secure!"
                    </p>
                    <footer class="text-gray-500">
                        — Sarah Johnson, New York
                    </footer>
                </blockquote>
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
                            <form action="{{route('make_agent_request')}}" method="post" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="business-name" class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
                                    <input name="business_name" type="text" id="business-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="commercial-number" class="block text-sm font-medium text-gray-700 mb-1">Commercial Number</label>
                                    <input name="commercial_number" type="text" id="commercial-number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                                    <!-- Country Selector -->
                                    <div class="relative group">
                                        <label for="country" class="block text-sm font-medium text-gray-700 mb-1.5">Country</label>
                                        <div class="relative">
                                            <select
                                                id="country"
                                                name="country_id"
                                                required
                                                class="appearance-none w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all duration-300 bg-white text-gray-800 shadow-sm hover:border-gray-400 cursor-pointer">
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
                                            <select
                                                id="province"
                                                name="city_id"
                                                required
                                                class="appearance-none w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all duration-300 bg-gray-50 text-gray-500 shadow-sm cursor-not-allowed"
                                                disabled>
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

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Location</label>
                                    <div class="border rounded-lg p-2 h-48 mb-2">
                                        <!-- Map placeholder -->
                                        <div id="map" class="border rounded-lg p-2 h-48 mb-2"></div>

                                        <p class="mt-4 text-sm text-gray-700">Address: <span id="address" class="font-medium">Loading...</span></p>


                                        <input type="hidden" name="latitude" id="latitude">
                                        <input type="hidden" name="address" id="address">
                                        <input type="hidden" name="longitude" id="longitude">

                                    </div>
                                    <br><br><br><br>

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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map
        const map = L.map('map').setView([35.5186, 35.7916], 7);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([35.5186, 35.7916], {
            draggable: true
        }).addTo(map);
        document.getElementById('latitude').value = 35.5186;
        document.getElementById('longitude').value = 35.7916;

        // Address lookup function
        function updateAddress(lat, lon) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&accept-language=en`)
                .then(res => res.json())
                .then(data => {
                    const address = data.display_name || 'Location selected';
                    document.getElementById('address').textContent = address;

                    const cityName = data.address.state || data.address.county ||
                        data.address.city || data.address.town ||
                        data.address.village || '';

                    if (cityName) {
                        const provinceSelect = document.getElementById('province');
                        for (let i = 0; i < provinceSelect.options.length; i++) {
                            if (provinceSelect.options[i].text.toLowerCase() === cityName.toLowerCase()) {
                                provinceSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }
                });
        }

        // Map click handler
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lon = e.latlng.lng;
            marker.setLatLng([lat, lon]);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
            updateAddress(lat, lon);
        });

        // Marker drag handler
        marker.on('dragend', function(e) {
            const pos = marker.getLatLng();
            document.getElementById('latitude').value = pos.lat;
            document.getElementById('longitude').value = pos.lng;
            updateAddress(pos.lat, pos.lng);
        });

        // Initial address update
        updateAddress(35.5186, 35.7916);

        // Country change handler
        document.getElementById('country').addEventListener('change', function() {
            const countryId = this.value;
            const provinceSelect = document.getElementById('province');
            const provinceWrapper = provinceSelect.closest('.relative');

            provinceSelect.innerHTML = '<option value="">Loading...</option>';
            provinceSelect.disabled = true;
            provinceSelect.classList.remove('bg-white', 'text-gray-800', 'hover:border-gray-400', 'cursor-pointer');
            provinceSelect.classList.add('bg-gray-50', 'text-gray-500', 'cursor-not-allowed');

            if (countryId) {
                // Add loading animation
                provinceWrapper.classList.add('animate-pulse');

                fetch(`/get-provinces/${countryId}`)
                    .then(response => response.json())
                    .then(data => {
                        let options = '<option value="">Select Province</option>';

                        if (data.length > 0) {
                            data.forEach(province => {
                                // Include both ID and name in the option
                                options += `<option 
                                        value="${province.id}" 
                                        data-name="${province.name}"
                                      >${province.name}</option>`;
                            });
                            provinceSelect.disabled = false;
                            provinceSelect.classList.remove('bg-gray-50', 'text-gray-500', 'cursor-not-allowed');
                            provinceSelect.classList.add('bg-white', 'text-gray-800', 'hover:border-gray-400', 'cursor-pointer');
                        } else {
                            options = '<option value="">No provinces available</option>';
                        }

                        provinceSelect.innerHTML = options;
                        provinceWrapper.classList.remove('animate-pulse');
                    })
                    .catch(error => {
                        provinceSelect.innerHTML = '<option value="">Error loading provinces</option>';
                        provinceWrapper.classList.remove('animate-pulse');
                    });
            } else {
                provinceSelect.innerHTML = '<option value="">Select Country First</option>';
            }
        });

        // Province change handler - move map to selected province
        document.getElementById('province').addEventListener('change', function() {
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
                        marker.setLatLng([lat, lon]);
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;
                        document.getElementById('address').textContent = data[0].display_name;
                    } else {
                        document.getElementById('address').textContent = 'Location not found';
                    }
                });
        });
    });


    //-------------------------------
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
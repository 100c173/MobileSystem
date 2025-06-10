    <!-- Header/Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-mobile-alt text-2xl text-indigo-600"></i>
                <h1 class="text-xl font-bold text-gray-800">MobileTech Hub</h1>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="home.html" class="text-gray-700 hover:text-indigo-600 transition">Home</a>
                <a href="#latest-devices" class="text-gray-700 hover:text-indigo-600 transition">Latest Devices</a>
                <a href="#shop" class="text-gray-700 hover:text-indigo-600 transition">Shop</a>
                <a href="#services" class="text-gray-700 hover:text-indigo-600 transition">Services</a>
                <a href="#agents" class="text-gray-700 hover:text-indigo-600 transition">Become an Agent</a>
            </nav>

            <div class="flex items-center space-x-4">
                <!-- Cart Icon with badge -->
                @auth
                <div class="relative">
                    <a href="{{route('cart.index')}}" class="text-gray-700 hover:text-indigo-600 transition relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-1.5">
                            0
                        </span>
                    </a>
                </div>
                <div class="relative">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button typr='submit' id="auth-btn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth

                @if(!auth()->user())
                <button id="auth-btn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
                    Login / Register
                </button>
                <button class="md:hidden text-gray-700" id="mobile-menu-btn">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                @endif
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg absolute top-full left-0 right-0 py-4 px-4">
            <div class="flex flex-col space-y-4">
                <a href="#home" class="text-gray-700 hover:text-indigo-600 transition">Home</a>
                <a href="#latest-devices" class="text-gray-700 hover:text-indigo-600 transition">Latest Devices</a>
                <a href="#shop" class="text-gray-700 hover:text-indigo-600 transition">Shop</a>
                <a href="#services" class="text-gray-700 hover:text-indigo-600 transition">Services</a>
                <a href="#agents" class="text-gray-700 hover:text-indigo-600 transition">Become an Agent</a>
            </div>
        </div>
    </header>
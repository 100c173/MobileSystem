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
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <a href="{{route('cart.index')}}" class="text-gray-700 hover:text-indigo-600 transition relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-1.5">
                            {{$number_of_product_in_cart}}
                        </span>
                    </a>
                </div>

                <!-- Account Dropdown -->
                <div class="relative">
                    <button id="account-dropdown-btn" class="flex items-center space-x-1 focus:outline-none group">
                        <!-- صورة المستخدم أو أيقونة بديلة -->
                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden border border-gray-200 group-hover:border-indigo-300 transition-all">
                            <i class="fas fa-user text-gray-500 text-sm"></i>
                            <!-- يمكن استبدالها بصورة المستخدم -->
                            <!-- <img src="user-avatar.jpg" alt="User" class="w-full h-full object-cover"> -->
                        </div>
                        <!-- سهم صغير للإشارة إلى وجود قائمة -->
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-indigo-500 transition-transform transform group-hover:rotate-180"></i>
                    </button>

                    <!-- Dropdown Menu - تصميم أكثر حداثة -->
                    <div id="account-dropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-xl border border-gray-100 py-2 z-50 animate-fade-in">
                        <!-- رأس القائمة -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-900">Welcome back!</p>
                            <p class="text-xs text-gray-500 truncate">{{auth()->user()->email}}</p>
                        </div>

                        <!-- عناصر القائمة -->
                        <div class="py-1">
                            <a href="{{route('profile.edit')}}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-all">
                                <i class="fas fa-user-circle mr-3 text-gray-400 w-4 text-center"></i>
                                My Profile
                            </a>

                            @php
                            $user = auth()->user();
                            $isAdmin = $user->hasRole('admin');
                            $isAgent = $user->hasRole('agent');
                            @endphp

                            @if($isAdmin || $isAgent)
                            <a href="{{ $isAdmin ? route('admin.dashboard') : route('agent.dashboard') }}"
                                class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-all">
                                <i class="fas fa-cog mr-3 text-gray-400 w-4 text-center"></i>
                                Dashboard
                            </a>
                            @endif


                        </div>

                        <!-- قسم تسجيل الخروج -->
                        <div class="py-1 border-t border-gray-100">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-all">
                                    <i class="fas fa-sign-out-alt mr-3 text-gray-400 w-4 text-center"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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

<!-- JavaScript for Dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('account-dropdown-btn');
        const dropdownMenu = document.getElementById('account-dropdown');

        // التحكم في القائمة المنسدلة
        dropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');

            // إغلاق القوائم الأخرى إذا كانت مفتوحة
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu && !menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        });

        // إغلاق القائمة عند النقر خارجها
        document.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });

        // منع إغلاق القائمة عند النقر داخلها
        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>
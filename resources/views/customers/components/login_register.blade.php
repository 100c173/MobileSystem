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
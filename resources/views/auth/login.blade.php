<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');

        body {
            font-family: 'Tajawal', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 50%, #7209b7 100%);
            background-size: 200% 200%;
            animation: gradient 8s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card-shadow {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 16px;
        }

        .card-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        }

        .input-focus:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4361ee, #3a0ca3);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border-radius: 12px;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #3a0ca3, #4361ee);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 20px -5px rgba(58, 12, 163, 0.4);
        }

        .toggle-form {
            display: none;
        }

        .toggle-form.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .social-btn {
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-10">
            <div class="flex items-center justify-center mb-4 animate-bounce">
                <div class="relative">
                    <i class="fas fa-mobile-alt text-5xl text-white mr-3 transform transition-transform duration-1000 hover:rotate-360"></i>
                    <span class="absolute -top-2 -right-2 h-5 w-5 rounded-full bg-purple-400 animate-ping"></span>
                </div>
                <h1 class="text-5xl font-extrabold text-white bg-clip-text text-transparent bg-gradient-to-r from-purple-300 to-blue-300">
                    MobileTech Hub
                </h1>
            </div>
            <div class="mt-2 h-1 w-24 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full mx-auto"></div>
        </div>

        <!-- Tabs -->
        <div class="flex bg-white/20 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg mb-6">
            <button id="login-tab" class="flex-1 py-4 px-6 text-center font-semibold text-white bg-white/20 focus:outline-none transition-all duration-500 rounded-l-lg hover:bg-white/30">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </button>
            <button id="register-tab" class="flex-1 py-4 px-6 text-center font-semibold text-white/70 bg-white/10 focus:outline-none transition-all duration-500 rounded-r-lg hover:bg-white/20">
                <i class="fas fa-user-plus mr-2"></i> Register
            </button>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="toggle-form active bg-white/90 backdrop-blur-md p-8 rounded-2xl card-shadow">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h2>
                <p class="text-gray-500">Sign in to your account to continue</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input id="login-email" type="email" name="email" required autocomplete="email" autofocus
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="example@example.com">
                    </div>
                </div>

                <div>
                    <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input id="login-password" type="password" name="password" required autocomplete="current-password"
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="mr-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fab fa-google text-red-500"></i>
                        </a>
                    </div>

                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fab fa-facebook-f text-blue-600"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="toggle-form bg-white p-8 rounded-b-lg card-shadow">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h2>
                <p class="text-gray-500">Join us today and get started</p>
            </div>


            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="register-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-user"></i>
                        </div>
                        <input id="register-name" type="text" name="name" required autocomplete="name" autofocus
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="John Doe">
                    </div>
                </div>

                <div>
                    <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input id="register-email" type="email" name="email" required autocomplete="email"
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="example@example.com">
                    </div>
                </div>

                <div>
                    <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input id="register-password" type="password" name="password" required autocomplete="new-password"
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="••••••••">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                </div>

                <div>
                    <label for="register-password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input id="register-password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg input-focus transition duration-300"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" required>
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms & Conditions</a>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        Sign Up
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="#" id="switch-to-login" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const switchToLogin = document.getElementById('switch-to-login');

            // Switch to login form
            loginTab.addEventListener('click', function() {
                loginTab.classList.remove('text-white/70', 'bg-white/10');
                loginTab.classList.add('text-white', 'bg-white/20');
                registerTab.classList.remove('text-white', 'bg-white/20');
                registerTab.classList.add('text-white/70', 'bg-white/10');

                loginForm.classList.add('active');
                registerForm.classList.remove('active');
            });

            // Switch to register form
            registerTab.addEventListener('click', function() {
                registerTab.classList.remove('text-white/70', 'bg-white/10');
                registerTab.classList.add('text-white', 'bg-white/20');
                loginTab.classList.remove('text-white', 'bg-white/20');
                loginTab.classList.add('text-white/70', 'bg-white/10');

                registerForm.classList.add('active');
                loginForm.classList.remove('active');
            });

            // Switch to login from register form link
            switchToLogin.addEventListener('click', function(e) {
                e.preventDefault();
                loginTab.click();
            });

            // Check for errors and show appropriate form
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('register')) {
                registerTab.click();
            }
        });
    </script>
</body>
</html>

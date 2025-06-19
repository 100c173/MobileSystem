@extends('../customers.layout.app')

@section('title', 'User profile')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.css') }}" />
  <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce',
                            800: '#6b21a8',
                            900: '#581c87',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #a855f7 100%);
        }
        .profile-card {
            box-shadow: 0 10px 30px -10px rgba(10, 25, 49, 0.2);
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .input-field:focus {
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans" style="padding-top: 40px;">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="py-6" >

        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Profile Sidebar -->
                <div class="w-full lg:w-1/4">
                    <div class="profile-card bg-white rounded-xl p-6 shadow-md">
                        <div class="flex flex-col items-center">
                            <div class="relative mb-4">
                                <img src="https://ui-avatars.com/api/?name=محمد+علي&background=0ea5e9&color=fff&size=150"
                                     alt="User image"
                                     class="w-32 h-32 rounded-full border-4 border-white shadow-md">
                                <button class="absolute bottom-0 right-0 bg-secondary-500 text-white p-2 rounded-full hover:bg-secondary-600 transition">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">{{$user->name}} </h2>
                            <p class="text-gray-600 mb-4">{{$user->email}}</p>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                                <div class="bg-primary-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <p class="text-sm text-gray-600">  Profile complete : 75%</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="profile-card bg-white rounded-xl p-6 shadow-md mt-6">
                        <ul class="space-y-2">
                            <li>
                                <button onclick="openTab(event, 'profile')" class="tab-button w-full text-right py-3 px-4 rounded-lg flex items-center justify-between bg-primary-50 text-primary-700 font-medium">
                                    <span>User profile</span>
                                    <i class="fas fa-user ml-2"></i>
                                </button>
                            </li>
                            <li>
                                <button onclick="openTab(event, 'edit')" class="tab-button w-full text-right py-3 px-4 rounded-lg flex items-center justify-between hover:bg-gray-100 text-gray-700">
                                    <span>Data modification</span>
                                    <i class="fas fa-edit ml-2"></i>
                                </button>
                            </li>
                            <li>
                                <button onclick="openTab(event, 'password')" class="tab-button w-full text-right py-3 px-4 rounded-lg flex items-center justify-between hover:bg-gray-100 text-gray-700">
                                    <span>Password change</span>
                                    <i class="fas fa-lock ml-2"></i>
                                </button>
                            </li>
                            <li>
                                <button onclick="openTab(event, 'delete')" class="tab-button w-full text-right py-3 px-4 rounded-lg flex items-center justify-between hover:bg-gray-100 text-gray-700">
                                    <span>Delete the account </span>
                                    <i class="fas fa-trash-alt ml-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="w-full lg:w-3/4">
                    <!-- Profile Info Tab -->
                    <div id="profile" class="tab-content active">
                        <div class="profile-card bg-white rounded-xl p-6 shadow-md">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-bold text-gray-800">User information </h2>
                                <button onclick="openTab(event, 'edit')" class="fancy-btn btn-view" >
                                    <i class="fas fa-edit ml-1" style="color: white;"></i>
                                    <span style="color: white;">Update</span>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Full name</h3>
                                    <p class="text-gray-800 font-medium">{{$user->name}}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
                                    <p class="text-gray-800 font-medium">{{$user->email}}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Phone number</h3>
                                    <p class="text-gray-800 font-medium">+966 50 123 4567</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Registion data</h3>
                                    <p class="text-gray-800 font-medium">{{$user->created_at->format('F j, Y')}}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Gender</h3>
                                    <p class="text-gray-800 font-medium">undefined</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Last modified</h3>
                                    <p class="text-gray-800 font-medium">{{$user->updated_at->format('F j, Y')}} </p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">User Type</h3>
                                    <p class="text-gray-800 font-medium">{{$user->getRoleNames()}} </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Edit Profile Tab -->
                    <div id="edit" class="tab-content">
                        <div class="profile-card bg-white rounded-xl p-6 shadow-md">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">Modify personal data</h2>

                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">Full name</label>
                                        <input type="text" id="fullname" value="{{$user->name}}"
                                            name="name" class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" id="email"  value="{{$user->email}}"
                                            name="email" class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone numder </label>
                                        <input type="tel" id="phone" value="+966 50 123 4567"
                                            class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>

                                </div>

                                <div class="flex justify-end">
                                    <button type="button" onclick="openTab(event, 'profile')" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 mr-4">cancel</button>
                                    <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Change Password Tab -->
                    <div id="password" class="tab-content">
                        <div class="profile-card bg-white rounded-xl p-6 shadow-md">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">Change password</h2>

                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1"> Current password </label>
                                        <!-- current_password -->
                                        <div class="relative">
                                            <input type="password" id="current-password" name="current_password" placeholder="Enter your password"
                                                   class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            <button type="button" class="absolute right-3 top-2 text-gray-500 hover:text-gray-700" onclick="togglePassword('current-password')">
                                                <i class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1"> New password </label>
                                        <div class="relative">
                                            <input type="password" id="new-password" name="password" placeholder="Enter your new password"
                                                   class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            <button type="button" class="absolute right-3 top-2 text-gray-500 hover:text-gray-700" onclick="togglePassword('new-password')">
                                                <i class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm new password </label>
                                        <div class="relative">
                                            <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm new password "
                                                   class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            <button type="button" class="absolute right-3 top-2 text-gray-500 hover:text-gray-700" onclick="togglePassword('confirm-password')">
                                                <i class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" onclick="openTab(event, 'profile')" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 mr-4">cancel</button>
                                    <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"> Change password </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Account Tab -->
                    <div id="delete" class="tab-content">
                        <div class="profile-card bg-white rounded-xl p-6 shadow-md">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">Delete account </h2>
                            <form method="post" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')
                                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0 pr-3">
                                            <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h3 class="text-sm font-medium text-red-800">   warning!   </h3>
                                            <div class="mt-2 text-sm text-red-700">
                                                <p>Deleting your account is a permanent process and cannot be undone. All your data will be deleted, and you will lose access to all features associated with your account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="delete-reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for deletion (optional)</label>
                                    <select id="delete-reason" class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        <option value="">Reason for deletion....</option>
                                        <option value="privacy">privacy concerns</option>
                                        <option value="not-using">I don't use the site anymore</option>
                                        <option value="found-better">I found the best service</option>
                                        <option value="other">Other reasons</option>
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <label for="delete-feedback" class="block text-sm font-medium text-gray-700 mb-1"> Your comments (optional)</label>
                                    <textarea id="delete-feedback" rows="3" class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="What can we improve? "></textarea>
                                </div>

                                <div class="mb-6">
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1"> Current password </label>
                                        <!-- current_password -->
                                        <div class="relative">
                                            <input type="password" id="current-password" name="password" placeholder="Enter your password"
                                                   class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            <button type="button" class="absolute right-3 top-2 text-gray-500 hover:text-gray-700" onclick="togglePassword('current-password')">
                                                <i class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>


                                <div class="flex justify-end">
                                    <button type="button" onclick="openTab(event, 'profile')" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 mr-4">cancel</button>
                                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

     <script>
        // Tab functionality
        function openTab(evt, tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }

            // Remove active class from all tab buttons
            const tabButtons = document.getElementsByClassName("tab-button");
            for (let i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("bg-primary-50", "text-primary-700");
                tabButtons[i].classList.add("hover:bg-gray-100", "text-gray-700");
            }

            // Show the current tab and add active class to the button
            document.getElementById(tabName).classList.add("active");

            // Update button styling
            const clickedButton = evt.currentTarget;
            clickedButton.classList.remove("hover:bg-gray-100", "text-gray-700");
            clickedButton.classList.add("bg-primary-50", "text-primary-700");
        }

        // Toggle password visibility
        function togglePassword(id) {
            const passwordInput = document.getElementById(id);
            const eyeIcon = passwordInput.nextElementSibling.querySelector('i');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }


    </script>
</body>
</html>
@endsection

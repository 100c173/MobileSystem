<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom CSS */
        .device-card:hover .device-image {
            transform: scale(1.05);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }

        .login-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .specs-highlight {
            position: relative;
        }

        .specs-highlight::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #a777e3, #6e8efb);
            opacity: 0.3;
            border-radius: 4px;
        }

        .switch-active {
            background: #6e8efb;
            left: calc(100% - 22px);
        }

        .agent-section {
            background: url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center;
            background-size: cover;
        }

        .agent-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="font-sans bg-gray-50">
    @include('customers.partials.navbar')


    @yield('content')


    @include('customers.partials.footer')

    @stack('scripts')
</body>

</html>
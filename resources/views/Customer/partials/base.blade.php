<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/customer/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <div class="container">
            <div class="logo">

                <a href=""><img src="{{asset('uploads/customerImages/logo/MobileLogo.png')}}" alt="Your Mobile Store Logo"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Shop</a>
                        <ul class="dropdown">
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Brands</a>
                                <ul class="submenu">
                                    <li><a href="#">Apple</a></li>
                                    <li><a href="#">Samsung</a></li>
                                    <li><a href="#">Google</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Features</a>
                                <ul class="submenu">
                                    <li><a href="#">5G Phones</a></li>
                                    <li><a href="#">Foldable Phones</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Price Range</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Deals</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <div class="search-bar">
                    <input type="text" placeholder="Search for phones...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <a href="#"><i class="far fa-user"></i></a>
                <a href="#"><i class="far fa-heart"></i></a>
                <div class="cart">
                    <a href="#"><i class="fas fa-shopping-cart"></i> <span class="cart-count">0</span></a>
                </div>
            </div>
        </div>
    </header>


        <div class="container">
            @yield('content')
        </div>

    @extends('customer.partials.footer')

    <script src="script.js"></script>
</body>

</html>


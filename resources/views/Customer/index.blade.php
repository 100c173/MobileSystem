@extends('customer.partials.base')


@section('title')
Home
@endsection

@section('content')

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Discover the Latest Mobile Innovations</h1>
                <p>Explore our wide selection of premium smartphones and find the perfect device for you.</p>
                <a href="#" class="button">Shop Now</a>
            </div>
            <div class="hero-image">

                <img src="{{asset('uploads/customerImages/images/mainPhoto8.jpg')}}" alt="Featured Mobile Phone">
            </div>
        </div>
    </section>

    <section class="featured-categories">
        <div class="container">
            <h2>Featured Categories</h2>
            <div class="category-grid">
                <a href="#" class="category-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Latest iPhones">
                    <h3>Latest iPhones</h3>
                </a>
                <a href="#" class="category-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Samsung Galaxy Series">
                    <h3>Samsung Galaxy Series</h3>
                </a>
                <a href="#" class="category-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Budget-Friendly Phones">
                    <h3>Budget-Friendly Phones</h3>
                </a>
                <a href="#" class="category-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Gaming Phones">
                    <h3>Gaming Phones</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="new-arrivals">
        <div class="container">
            <h2>New Arrivals</h2>
            <div class="product-grid">
                 @php
                    $count= 0;
                @endphp

                @foreach($newMobiles as $newMobile)
                    <div class="product-item">
                        <div class="image-container">
                            @if($newMobile->primaryImage)
                                <img  src="{{asset($newMobile->primaryImage->image_url)}}"  alt="mobile photo" style="height:250px">
                            @else
                                <img src="{{asset('uploads/defaultImages/default_mobile.webp')}}"  alt="mobile photo">
                            @endif
                        </div>
                        <h3>{{$newMobile->name}}</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="far fa-star"></i> (4.0)
                        </div>
                        <p class="price">$949.99</p>
                        <div class="product-actions">
                            <a href="#" class="action-icon"><i class="fas fa-shopping-bag"></i></a>
                            <a href="#" class="action-icon"><i class="far fa-heart"></i></a>
                            <a href="#" class="button view-button">View Details</a>
                        </div>
                    </div>
                        @php
                            $count++;
                            if($count >=8)
                                break;
                        @endphp
                @endforeach

            </div>
            <div class="view-all">
                <a href="#" class="button">View All New Arrivals</a>
            </div>
        </div>
    </section>

    <section class="best-sellers">
        <div class="container">
            <h2>Agents </h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Best Seller 1">
                    <h3>Product Name A</h3>
                    <p class="price">$AAA.AA</p>
                    <a href="#" class="button">View Details</a>
                </div>
                <div class="product-item">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Best Seller 2">
                    <h3>Product Name B</h3>
                    <p class="price">$BBB.BB</p>
                    <a href="#" class="button">View Details</a>
                </div>
            </div>
            <div class="view-all">
                <a href="#" class="button">View All Bestsellers</a>
            </div>
        </div>
    </section>

    <section class="brands">
        <div class="container">
            <h2>Shop by Brand</h2>
            <div class="brand-grid">
                <a href="#"><img src="https://via.placeholder.com/120x60/FF5733/FFFFFF?text=Apple" alt="Apple Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/33A8FF/FFFFFF?text=Samsung"
                        alt="Samsung Logo"></a>
                <a href="#"><img href="photos/"
                        alt="Google Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/E3002C/FFFFFF?text=Huawei"
                        alt="Huawei Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/FF6900/FFFFFF?text=Xiaomi"
                        alt="Xiaomi Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/E50914/FFFFFF?text=OnePlus"
                        alt="OnePlus Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/282828/FFFFFF?text=Sony" alt="Sony Logo"></a>
                <a href="#"><img src="https://via.placeholder.com/120x60/A2D033/FFFFFF?text=LG" alt="LG Logo"></a>
            </div>
            <div class="view-all-brands">
                <a href="#" class="button">View All Brands</a>
            </div>
        </div>
    </section>

    <section class="special-offers">
        <div class="container">
            <div class="offer-banner">
                <div class="offer-content">
                    <h2>Limited Time Offer!</h2>
                    <p>Get up to 20% off on selected smartphones. Don't miss out!</p>
                    <a href="#" class="button">Shop Now</a>
                </div>
                <div class="offer-image">
                    <img src="photos/razer-phone-2-uhd-4k-wallpaper.jpg" alt="Special Offer Phone">
                </div>
            </div>
        </div>
    </section>


    <section class="why-choose-us">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="reasons-grid">
                <div class="reason">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>Fast & Secure Shipping</h3>
                    <p>We offer reliable and fast shipping to your doorstep.</p>
                </div>
                <div class="reason">
                    <i class="fas fa-headset"></i>
                    <h3>Excellent Customer Support</h3>
                    <p>Our dedicated support team is here to assist you.</p>
                </div>
                <div class="reason">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Wide Selection</h3>
                    <p>Choose from a vast range of the latest mobile phones.</p>
                </div>
                <div class="reason">
                    <i class="fas fa-check-circle"></i>
                    <h3>Genuine Products</h3>
                    <p>We guarantee the authenticity of all our products.</p>
                </div>
                <div class="reason">
                    <i class="fas fa-undo"></i>
                    <h3>Easy Returns</h3>
                    <p>Hassle-free return policy for your peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('frontend.layouts.master')
@php
    $setting = DB::table('settings')->first();
@endphp

@section('title', $setting->title)

<style>
    .category-slider .item .single-banner {
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .category-slider .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        transition: all 0.4s ease;
    }

    /* Parent height changes per screen size */
    @media (max-width: 320px) {
        .category-slider .item .single-banner {
            height: 190px !important;
            /* ~10% of standard layout */
        }
    }

    @media (min-width: 321px) and (max-width: 375px) {
        .category-slider .item .single-banner {
            height: 190px !important;
            /* ~12% */
        }
    }

    @media (min-width: 376px) and (max-width: 425px) {
        .category-slider .item .single-banner {
            height: 190px !important;
            /* ~14% */
        }
    }

    @media (min-width: 426px) and (max-width: 768px) {
        .category-slider .item .single-banner {
            height: 190px !important;
            /* ~16% */
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .category-slider .item .single-banner {
            height: 200px !important;
            /* ~18% */
        }
    }

    @media (min-width: 1025px) and (max-width: 1440px) {
        .category-slider .item .single-banner {
            height: 200px !important;
            /* ~20% */
        }
    }

    @media (min-width: 1441px) and (max-width: 2560px) {
        .category-slider .item .single-banner {
            height: 240px !important;
            /* ~24% */
        }
    }

    @media (min-width: 2561px) {
        .category-slider .item .single-banner {
            height: 300px !important;
            /* ultra-wide */
        }
    }

    #Gslider .carousel-inner {
        /* height: 450px !important; */
        height: 375px !important;
    }

    .single-list .list-image img.uniform-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .custom-col-5 {
        width: 20%;
        /* 100 / 5 = 20% per product */
        float: left;
        padding-left: 10px;
        padding-right: 10px;
        box-sizing: border-box;
    }

    /* Clearfix for rows */
    .tab-content.isotope-grid::after {
        content: "";
        display: table;
        clear: both;
    }

    /* Uniform product image size */
    .single-product .product-img img {
        width: 100%;
        height: 250px;
        /* fixed height */
        object-fit: cover;
        /* crop image to fit */
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .custom-col-5 {
            width: 25%;
            /* 4 per row on smaller screens */
        }
    }

    @media (max-width: 992px) {
        .custom-col-5 {
            width: 33.33%;
            /* 3 per row on tablets */
        }
    }

    @media (max-width: 768px) {
        .custom-col-5 {
            width: 50%;
            /* 2 per row on mobile */
        }
    }

    @media (max-width: 576px) {
        .custom-col-5 {
            width: 100%;
            /* 1 per row on small mobile */
        }
    }

    .custom-col-10 {
        width: 20%;
        float: left;
        padding: 5px;
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    .midium-banner .row::after {
        content: "";
        display: table;
        clear: both;
    }

    .single-banner {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        padding: 5px;
        position: relative;
    }

    .single-banner:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .banner-img-wrapper {
        width: 100%;
        height: 150px;
        overflow: hidden;
        border-radius: 8px;
        position: relative;
    }

    .single-banner img.uniform-banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .single-banner:hover img.uniform-banner-img {
        transform: scale(1.05);
    }

    .discount-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #008b00;
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        padding: 3px 6px;
        border-radius: 4px;
        z-index: 10;
        text-transform: uppercase;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    /* Shop Now Button */
    .shop-now-btn {
        position: absolute;
        bottom: 8px;
        left: 50%;
        /*transform: translateX(-50%);*/
        background: rgba(248, 86, 6, 0.9);
        color: #fff;
        font-size: 5px;
        /*font-weight: 600;*/
        /*padding: 2px 6px;*/
        border-radius: 5px;
        text-transform: uppercase;
        text-decoration: none;
        z-index: 10;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .shop-now-btn:hover {
        background: #008b00;
        transform: scale(1.05);
    }

    .midium-banner .single-banner a {
        padding: 5px 6px !important;
    }


    @media (max-width: 1200px) {
        .custom-col-10 {
            width: 20%;
        }
    }

    @media (max-width: 992px) {
        .custom-col-10 {
            width: 25%;
        }
    }

    @media (max-width: 768px) {
        .custom-col-10 {
            width: 33.33%;
        }
    }

    @media (max-width: 576px) {
        .custom-col-10 {
            width: 50%;
        }
    }

    @media (max-width: 400px) {
        .custom-col-10 {
            width: 100%;
        }
    }
</style>

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

@section('main-content')
    <!-- Slider Area -->
    @if (count($banners) > 0)
        <section id="Gslider" class="carousel slide mt-3" data-ride="carousel">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <ol class="carousel-indicators">
                            @foreach ($banners as $key => $banner)
                                <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                </li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            @foreach ($banners as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    @php
                                        // Decide link
                                        $link = $banner->url ?? route('product-grids');
                                    @endphp
                                    <a href="{{ $link }}">
                                        <img class="d-block w-100"
                                            src="{{ $banner->photo && file_exists(public_path($banner->photo)) ? asset($banner->photo) : asset('backend/img/thumbnail-default.jpg') }}"
                                            alt="{{ $banner->title }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--/ End Slider Area -->

    <!-- Start Small Category Slider -->
    <!--<section class="small-banner section">-->
    <!--    <div class="container">-->
    <!--        <div class="owl-carousel category-slider owl-theme">-->
    <!--            @forelse ($category_lists as $cat)-->
    <!--                <div class="item">-->
    <!--                    <div class="single-banner">-->
    <!--                        <div class="content text-center mt-2">-->
    <!--                            <h5>{{ $cat->title }}</h5>-->
    <!--                        </div>-->
    <!--                        <a href="{{ route('product-grids', ['category' => $cat->id]) }}">-->
    <!--                            <img src="{{ $cat->photo && file_exists(public_path($cat->photo)) ? asset($cat->photo) : 'https://via.placeholder.com/600x370' }}"-->
    <!--                                alt="{{ $cat->title }}" class="img-fluid">-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            @empty-->
    <!--                <div class="col-12 text-center">-->
    <!--                    <p>No categories available.</p>-->
    <!--                </div>-->
    <!--            @endforelse-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End Small Category Slider -->

    {{-- <!-- Advertisement Section -->
    @if (isset($ads) && count($ads) > 0)
    <div class="product-area mt-2">
        @include('frontend.layouts.ads', [
        'ads' => $ads->slice(0, 2)->values(),
        ])
    </div>
    @else
    <h3>No ads found</h3>
    @endif --}}

    <!-- Start Product Area -->
    <div class="product-area section" style="margin-top: -30px !important;">
        <div class="container">
            <!--<div class="row">-->
            <!--    <div class="col-12">-->
            <!--        <div class="section-title">-->
            <!--            <h2>Trending Item</h2>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="row">
                <div class="col-12">
                    <div class="product-info">

                        <!-- Tab Nav -->
                        <div class="nav-main">
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                @php
                                    $categories = DB::table('categories')
                                        ->where('status', 'active')
                                        ->where('is_parent', 1)
                                        ->get();
                                @endphp
                                @if ($categories)
                                    <button class="btn" style="background:#008b00" data-filter="*">All Products</button>
                                    @foreach ($categories as $cat)
                                        <button class="btn" style="background:none;color:#008b00;" data-filter=".{{ $cat->id }}">
                                            {{ $cat->title }}
                                        </button>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!--/ End Tab Nav -->

                        <!-- Tab Content -->
                        <div class="tab-content isotope-grid" id="myTabContent">
                            @php
                                // Fetch 30 active products
                                $product_lists = DB::table('products')
                                    ->where('status', 'active')
                                    ->orderBy('id', 'DESC')
                                    ->limit(30) // Show 30 products
                                    ->get();
                            @endphp

                            @if ($product_lists)
                                @foreach ($product_lists as $product)
                                    <div class="custom-col-5 p-b-35 isotope-item {{ $product->cat_id }}">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('product-detail', $product->slug) }}">
                                                    @php
                                                        $photo = explode(',', $product->photo);
                                                        $image = isset($photo[0]) ? asset($photo[0]) : asset('backend/img/product/default.png');
                                                    @endphp
                                                    <img class="default-img" src="{{ $image }}" alt="{{ $product->title }}">
                                                    <img class="hover-img" src="{{ $image }}" alt="{{ $product->title }}">

                                                    @if ($product->stock <= 0)
                                                        <span class="out-of-stock">Sale out</span>
                                                    @elseif($product->condition == 'new')
                                                        <span class="new">New</span>
                                                    @elseif($product->condition == 'hot')
                                                        <span class="hot">Hot</span>
                                                    @else
                                                        <span class="price-dec">{{ $product->discount }}% Off</span>
                                                    @endif
                                                </a>

                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                                            href="#">
                                                            <i class="ti-eye"></i><span>Quick Shop</span>
                                                        </a>
                                                        <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}">
                                                            <i class="ti-heart"></i><span>Add to Wishlist</span>
                                                        </a>
                                                    </div>
                                                    <div class="product-action-2 mt-1">
                                                        <a title="Add to cart" href="{{ route('add-to-cart', $product->slug) }}">
                                                            {{-- Add to cart --}}
                                                            <svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" width="24" height="24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <circle cx="9" cy="21" r="1"></circle>
                                                                <circle cx="20" cy="21" r="1"></circle>
                                                                <path
                                                                    d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                </path>
                                                                <line x1="12" y1="9" x2="18" y2="9"></line>
                                                                <line x1="15" y1="6" x2="15" y2="12"></line>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    @php
                                                        $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                                    @endphp
                                                    <span>৳{{ number_format($after_discount, 2) }}</span>
                                                    <del
                                                        style="padding-left:4%; color:#008b00;">৳{{ number_format($product->price, 2) }}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!--/ End Tab Content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->


    {{-- <div class="product-area mt-2">
        <!-- Advertisement Section -->
        @include('frontend.layouts.ads', [
        'ads' => $ads->slice(2, 2)->values(),
        ])
    </div> --}}


    <!-- Start Featured / Midium Banner Section -->
    <section class="midium-banner">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Featured Products</h2>
            </div>
            <div class="row">
                @php
                    $featured_products = DB::table('products')
                        ->where('status', 'active')
                        ->where('is_featured', 1)
                        ->orderBy('id', 'DESC')
                        ->limit(20)
                        ->get();
                @endphp

                @if ($featured_products)
                    @foreach ($featured_products as $product)
                        <div class="custom-col-10">
                            <div class="single-banner shadow-hover text-center position-relative">
                                @php
                                    $photo = explode(',', $product->photo);
                                    $image = isset($photo[0]) ? asset($photo[0]) : asset('backend/img/product/default.png');
                                @endphp

                                <!-- Discount Badge -->
                                @if($product->discount > 0)
                                    <span class="discount-badge">Up to {{ $product->discount }}%</span>
                                @endif

                                <div class="banner-img-wrapper">
                                    <img src="{{ $image }}" alt="{{ $product->title }}" class="uniform-banner-img">

                                    <!-- Shop Now Button Overlay -->
                                    <a href="{{ route('product-detail', $product->slug) }}" class="shop-now-btn">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Featured / Midium Banner Section -->


    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Hot Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($product_lists as $product)
                            @if ($product->condition == 'hot')
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('product-detail', $product->slug) }}">
                                            @php
                                                $photo = explode(',', $product->photo);
                                                $image = isset($photo[0]) ? asset($photo[0]) : asset('backend/img/product/default.png');
                                            @endphp
                                            <img class="default-img" src="{{ $image }}" alt="{{ $product->title }}">
                                            <img class="hover-img" src="{{ $image }}" alt="{{ $product->title }}">
                                        </a>

                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                                    href="#">
                                                    <i class="ti-eye"></i><span>Quick Shop</span>
                                                </a>
                                                <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}">
                                                    <i class="ti-heart"></i><span>Add to Wishlist</span>
                                                </a>
                                            </div>
                                            <div class="product-action-2">
                                                <a href="{{ route('add-to-cart', $product->slug) }}">
                                                    <!--Add to cart-->
                                                    <svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="9" cy="21" r="1"></circle>
                                                        <circle cx="20" cy="21" r="1"></circle>
                                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                        <line x1="12" y1="9" x2="18" y2="9"></line>
                                                        <line x1="15" y1="6" x2="15" y2="12"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h3>
                                        <div class="product-price">
                                            <span class="old">৳{{ number_format($product->price, 2) }}</span>
                                            @php
                                                $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                            @endphp
                                            <span>৳{{ number_format($after_discount, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->


    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Latest Items</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @php
                            $product_lists = DB::table('products')
                                ->where('status', 'active')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
                        @endphp

                        @foreach ($product_lists as $product)
                            <div class="col-md-4">
                                <!-- Start Single List  -->
                                <div class="single-list">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="list-image overlay">
                                                @php
                                                    $photo = explode(',', $product->photo);
                                                    $image = isset($photo[0]) ? asset($photo[0]) : asset('backend/img/product/default.png');
                                                @endphp
                                                <img src="{{ $image }}" alt="{{ $product->title }}" class="uniform-img">
                                                <a href="{{ route('add-to-cart', $product->slug) }}" class="buy">
                                                    <i class="fa fa-shopping-bag mt-2"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                                            <div class="content">
                                                <h4 class="title"><a href="#">{{ $product->title }}</a></h4>
                                                @php
                                                    $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                <p class="price with-discount">
                                                    {{-- ৳{{ number_format($product->discount, 2) }} --}}
                                                    ৳{{ number_format($after_discount, 2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List  -->
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->


    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Cash on Delivery</h4>
                        <p>Available all over Bangladesh</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 15 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>24/7 Support</h4>
                        <p>Live support available 24 hours a day</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    @include('frontend.layouts.newsletter')

    <!-- Modal -->
    @if ($product_lists)
        @foreach ($product_lists as $key => $product)
            <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                    aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <div class="quickview-images text-center">
                                            @php
                                                $photos = explode(',', $product->photo);
                                            @endphp
                                            @foreach ($photos as $photo)
                                                @php
                                                    $image = $photo ? asset($photo) : asset('backend/img/product/default.png');
                                                @endphp
                                                <div class="single-image mb-2">
                                                    <img src="{{ $image }}" class="img-fluid" style="height: 510px; width: 700px;"
                                                        alt="{{ $product->title }}">
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{ $product->title }}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    @php
                                                        $rate = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->avg('rate');
                                                        $rate_count = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->count();
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($rate >= $i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{ $rate_count }} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if ($product->stock > 0)
                                                    <span><i class="fa fa-check-circle-o"></i> {{ $product->stock }} in
                                                        stock</span>
                                                @else
                                                    <span><i class="fa fa-times-circle-o text-danger"></i>
                                                        {{ $product->stock }} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount =
                                                $product->price - ($product->price * $product->discount) / 100;
                                        @endphp
                                        <h3><small><del class="text-muted">৳{{ number_format($product->price, 2) }}</del></small>
                                            ৳{{ number_format($after_discount, 2) }} </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if ($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Size</h5>
                                                        <select>
                                                            @php
                                                                $sizes = explode(',', $product->size);
                                                            @endphp
                                                            @foreach ($sizes as $size)
                                                                <option>{{ $size }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{ route('single-add-to-cart') }}" method="POST" class="mt-4">
                                            @csrf
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                            data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                    <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                        data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                            data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">Add to cart</button>
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}" class="btn min"><i
                                                        class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                            <!-- ShareThis BEGIN -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <!-- Modal end -->
@endsection

@push('styles')
    <!--<script type='text/javascript'-->
    <!--    src='https://platform-api.sharethis.com/js/sharethis.js#property=6929f0fae0891b98fd79a8ab&product=sticky-share-buttons'-->
    <!--    async='async'></script>-->
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
            background: #000000;
            color: black;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
            bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            color: #008b00;
        }

        #Gslider .carousel-inner .carousel-caption p {
            font-size: 18px;
            color: black;
            margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
            bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Isotope JS -->
    <script>
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function () {
            $(this).on('click', function () {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.category-slider').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    }, // 320px
                    376: {
                        items: 3
                    }, // 375px
                    426: {
                        items: 3
                    }, // 425px
                    769: {
                        items: 5
                    }, // 768px
                    1025: {
                        items: 5
                    }, // 1024px
                    1441: {
                        items: 5
                    }, // 1440px
                    2561: {
                        items: 6
                    } // 2560px
                }
            });
        });
    </script>
@endpush
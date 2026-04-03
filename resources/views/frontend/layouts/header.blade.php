<style>
    /* General Header Styling */
    .header.shop .middle-inner {
        padding: 5px 0;
        background: #fff;
        border-top: 1px solid #eee;
    }

    .header.shop .logo {
        float: left;
        margin: 3px 0 0;
    }

    /* Sticky middle-inner */
    .middle-inner {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: #fff;
    }

    /* Sticky header-inner just below middle-inner */
    .header-inner {
        position: sticky;
        top: 80px;
        /* adjust according to .middle-inner height */
        z-index: 999;
        background: #fff;
    }

    /* When the whole header is fixed on scroll */
    .header.sticky .middle-inner,
    .header.sticky .header-inner {
        position: fixed;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .header.sticky .middle-inner {
        top: 0;
    }

    .header.sticky .header-inner {
        top: 71px;
        /* Adjust to match actual height of middle-inner */
        background-color: #008b00;
        color: #fff;
    }

    .header.sticky {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .header.sticky .header-inner .nav li a {
        color: #fff;
    }
</style>

<script>
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
</script>



<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                                $settings = DB::table('settings')->get();

                            @endphp
                            <li><i class="ti-headphone-alt"></i>
                                @foreach ($settings as $data)
                                    {{ $data->phone }}
                                @endforeach
                            </li>
                            <li><i class="ti-email"></i>
                                @foreach ($settings as $data)
                                    {{ $data->email }}
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> <a href="{{ route('order.track') }}">Track Order</a>
                            </li>

                            <!--@guest-->
                            <!--    <li><i class="ti-bag"></i> <a href="{{ route('login.form') }}">Buy Subscription</a></li>-->
                            <!--@endguest-->

                            @auth
                                <!--<li><i class="ti-bag"></i> <a href="{{ route('user.subscriptions') }}">Buy Subscription</a>-->
                                <!--</li>-->

                                @if (Auth::user()->role == 'admin')
                                    <li><i class="ti-user"></i> <a href="{{ route('admin') }}" target="_blank">Dashboard</a>
                                    </li>
                                @else
                                    <li><i class="ti-user"></i> <a href="{{ route('user') }}" target="_blank">Profile</a>
                                    </li>
                                @endif

                                <li><i class="ti-power-off"></i> <a href="{{ route('user.logout') }}">Logout</a></li>
                            @else
                                <li><i class="ti-power-off"></i><a href="{{ route('login.form') }}">Login /</a>
                                    <a href="{{ route('register.form') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Topbar -->

    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{ route('home') }}">
                            <img style="max-height: 60px; max-width: 60px;"
                                src="@foreach ($settings as $data) {{ asset($data->logo) }} @endforeach" alt="logo">
                        </a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <!--<div class="col-lg-8 col-md-7 col-12">-->
                <!--    <div class="search-bar-top">-->
                <!--        <div class="search-bar" style="padding: 5px;">-->
                <!--<select>-->
                <!--    <option>All Category</option>-->
                <!--    @foreach (Helper::getAllCategory() as $cat)-->
                <!--        <option>{{ $cat->title }}</option>-->
                <!--    @endforeach-->
                <!--</select>-->
                <!--            <form method="POST" action="{{ route('product.search') }}">-->
                <!--                @csrf-->
                <!--                <input name="search" placeholder="Search Products Here....." type="search">-->
                <!--                <button class="btnn" type="submit"><i class="ti-search"></i></button>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-8 col-md-7 col-12 d-flex justify-content-center">
                    <!--<div class="search-bar-top w-100">-->
                    <div class="search-bar" style="
                                 margin: 10px auto;
                                 display: flex;
                                 justify-content: center;
                                 align-items: center;
                                 max-width: 800px;
                             ">

                        <form method="POST" action="{{ route('product.search') }}" class="d-flex w-100">
                            @csrf

                            <input type="search" name="search" placeholder="Search Products Here..."
                                value="{{ old('search') }}" class="form-control"
                                style="padding: 10px; border: 1px solid #ddd; width: 100%;">

                            <button class="btnn" type="submit" style="padding: 10px 15px;">
                                <i class="ti-search"></i>
                            </button>
                        </form>

                    </div>
                    <!--</div>-->
                </div>

                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar shopping">
                            @php
                                $total_prod = 0;
                                $total_amount = 0;
                            @endphp
                            @if (session('wishlist'))
                                @foreach (session('wishlist') as $wishlist_items)
                                    @php
                                        $total_prod += $wishlist_items['quantity'];
                                        $total_amount += $wishlist_items['amount'];
                                    @endphp
                                @endforeach
                            @endif
                            <a href="{{ route('wishlist') }}" class="single-icon"><i class="fa fa-heart-o"></i> <span
                                    class="total-count">{{ Helper::wishlistCount() }}</span></a>
                            <!-- Shopping Item -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ count(Helper::getAllProductFromWishlist()) }} Items</span>
                                        <a href="{{ route('wishlist') }}">View Wishlist</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach (Helper::getAllProductFromWishlist() as $data)
                                            @php
                                                $photoArray = explode(',', $data->product['photo']);
                                                $image = asset(trim($photoArray[0])); // convert to full URL
                                            @endphp

                                            <li>
                                                <a href="{{ route('wishlist-delete', $data->id) }}" class="remove"
                                                    title="Remove this item">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                                <a class="cart-img" href="#">
                                                    <img src="{{ $image }}" alt="{{ $data->product['title'] }}">
                                                </a>

                                                <h4>
                                                    <a href="{{ route('product-detail', $data->product['slug']) }}"
                                                        target="_blank">
                                                        {{ $data->product['title'] }}
                                                    </a>
                                                </h4>

                                                <p class="quantity">
                                                    {{ $data->quantity }} x -
                                                    <span class="amount">৳{{ number_format($data->price, 2) }}</span>
                                                </p>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span
                                                class="total-amount">৳{{ number_format(Helper::totalWishlistPrice(), 2) }}</span>
                                        </div>
                                        <a href="{{ route('cart') }}" class="btn animate">Cart</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Shopping Item -->
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{ route('cart') }}" class="single-icon"><i class="ti-bag"></i> <span
                                    class="total-count">{{ Helper::cartCount() }}</span></a>
                            <!-- Shopping Item -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ count(Helper::getAllProductFromCart()) }} Items</span>
                                        <a href="{{ route('cart') }}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach (Helper::getAllProductFromCart() as $data)
                                            @php
                                                $photoArray = explode(',', $data->product['photo']);
                                                $image = asset(trim($photoArray[0]));   // FIXED
                                            @endphp

                                            <li>
                                                <a href="{{ route('cart-delete', $data->id) }}" class="remove"
                                                    title="Remove this item">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                                <a class="cart-img" href="#">
                                                    <img src="{{ $image }}" alt="{{ $data->product['title'] }}">
                                                </a>

                                                <h4>
                                                    <a href="{{ route('product-detail', $data->product['slug']) }}"
                                                        target="_blank">
                                                        {{ $data->product['title'] }}
                                                    </a>
                                                </h4>

                                                <p class="quantity">
                                                    {{ $data->quantity }} x -
                                                    <span class="amount">৳{{ number_format($data->price, 2) }}</span>
                                                </p>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span
                                                class="total-amount">৳{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                                        </div>
                                        <a href="{{ route('checkout') }}" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::path() == 'home' ? 'active' : '' }}"><a
                                                    href="{{ route('home') }}">Home</a></li>
                                            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}"><a
                                                    href="{{ route('about-us') }}">About Us</a></li>
                                            <li
                                                class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                                                <a href="{{ route('product-grids') }}">Products</a><span
                                                    class="new">New</span>
                                            </li>
                                            {{ Helper::getHeaderCategory() }}
                                            <!--<li class="{{ Request::path() == 'blog' ? 'active' : '' }}"><a-->
                                            <!--        href="{{ route('blog') }}">Blog</a></li>-->

                                            <li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a
                                                    href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>

<script>
    window.addEventListener('scroll', function () {
        let header = document.querySelector('.header');
        header.classList.toggle('sticky', window.scrollY > 50);
    });
</script>
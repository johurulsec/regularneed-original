<!-- Meta Tag -->
@yield('meta')

<!-- Title Tag  -->
<title>@yield('title')</title>

<!-- Favicon -->
@php
    $setting = DB::table('settings')->first();
@endphp

<link rel="icon" type="image/png" href="{{ $setting ? asset($setting->photo) : '' }}" height="16" width="16">


<title>@yield('title')</title>
<!-- Favicon -->
<!--<link rel="icon" type="image/png" href="{{asset('frontend/images/favicon.png')}}">-->
<link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

<!-- Meta Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '892207500443169');
    fbq('track', 'PageView');
</script>
<!-- End Meta Pixel Code -->

<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a:after {
        content: "\f0da";
        float: right;
        border: none;
        font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }

    .single-product .product-img img {
        width: 100%;
        /* full width of container */
        height: 250px;
        /* fixed height, adjust as needed */
        object-fit: cover;
        /* crop & maintain aspect ratio */
    }


     /*Share Button CSS */
    .st-btn {
        border-radius: 10% !important;
        margin: 5px !important;
    }

     /*শুধু Facebook, Messenger, WhatsApp দেখাবে, বাকি লুকাবে */
    .st-btn:not([data-network="facebook"]):not([data-network="messenger"]):not([data-network="whatsapp"]) {
        display: none !important;
        margin:20%;
    }

     /*Total Shares লুকানো */
    .st-total,
    .st-total * {
        display: none !important;
    }
    
    /* Position the ShareThis container fixed on the right and vertically centered */
    .st-sticky-share-buttons {
        position: fixed !important;   /* Keeps it fixed while scrolling */
        top: 50%;                     /* Vertical center */
        right: 0;                     /* Right side */
        transform: translateY(-50%);  /* Adjust exact vertical center */
        display: flex;
        flex-direction: column;       /* Stack buttons vertically */
        gap: 10px;                     /* Space between buttons */
        z-index: 9999;                /* Ensure above other content */
        margin-top: 280px;
    }
    
    /* Optional: adjust button size for better appearance */
    .st-sticky-share-buttons .st-btn {
        width: 50px;
        height: 50px;
        display: flex !important;
        align-items: center;
        justify-content: center;
    }

</style>
@stack('styles')

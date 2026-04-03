@extends('frontend.layouts.master')
@php
    $setting = DB::table('settings')->first();
@endphp
@section('title', $setting->title)

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('terms-condition') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Terms & Conditions -->
    <section class="terms-conditions section" style="padding: 80px 0; background-color: #f9f9f9;">
        <div class="container">
            <!-- Header Section -->
            <div class="row mb-5">
                <div class="col-lg-12 col-12">
                    <div class="terms-header" style="text-align: center; margin-bottom: 50px;">
                        <h2 style="font-size: 42px; font-weight: 700; color: #222; margin-bottom: 15px;">Terms & Conditions
                        </h2>
                        <p style="font-size: 16px; color: #666; margin: 0;">Last updated: {{ now()->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8 col-12">
                    <div class="terms-content"
                        style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

                        <!-- Section 1 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #ff6b6b; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">1</span>
                                Introduction
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Welcome to <strong>{{ $setting->title }}</strong>. These terms and conditions outline the
                                rules and regulations for the use of our website and services. By accessing this website,
                                you accept these terms and conditions in full. If you do not agree to abide by the above,
                                please do not use this service.
                            </p>
                        </div>

                        <!-- Section 2 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4ecdc4; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">2</span>
                                Intellectual Property Rights
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Unless otherwise stated, {{ $setting->title }} and/or its licensors own the intellectual
                                property rights for all material on this website. All intellectual property rights are
                                reserved. You may view and print pages from the website for personal use, subject to
                                restrictions set in these terms and conditions.
                            </p>
                        </div>

                        <!-- Section 3 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #95e1d3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">3</span>
                                User Responsibilities
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                In these terms and conditions, "User" or "you" refers to the person on this website as
                                either a buyer or seller. You must ensure that all information you provide is accurate,
                                current, and complete. You agree not to use this service for any illegal or unauthorized
                                purpose or in any way that violates any law or the rights of others.
                            </p>
                        </div>

                        <!-- Section 4 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #f38181; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">4</span>
                                Product Information & Pricing
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We strive to provide accurate descriptions and pricing for all products listed on our
                                website. However, we do not warrant that product descriptions, pricing, or other content is
                                accurate, complete, reliable, current, or error-free. If a product offered by
                                {{ $setting->title }} is not as described, your sole remedy is to return it unused.
                            </p>
                        </div>

                        <!-- Section 5 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #aa96da; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">5</span>
                                Limitation of Liability
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                In no event shall {{ $setting->title }}, nor any of its officers, directors, and employees,
                                be liable to you for anything arising out of or in any way connected with your use of this
                                website, whether such liability is under contract, tort or otherwise.
                            </p>
                        </div>

                        <!-- Section 6 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fcbad3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">6</span>
                                Shipping & Delivery
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We offer free shipping on orders over ৳1000. All products are subject to our shipping terms.
                                We are not responsible for any delays caused by third-party logistics providers. Delivery
                                times are estimates and not guaranteed.
                            </p>
                        </div>

                        <!-- Section 7 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #a8d8ea; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">7</span>
                                Returns & Refunds
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We offer free returns within 30 days of purchase. Items must be unused and in original
                                packaging. Refunds will be processed within 7-10 business days after we receive the returned
                                item.
                            </p>
                        </div>

                        <!-- Section 8 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #ffd3a5; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">8</span>
                                Payment Security
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                All payments made through our platform are 100% secure and encrypted. We do not store your
                                payment information on our servers. For any payment-related concerns, please contact our
                                support team.
                            </p>
                        </div>

                        <!-- Section 9 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fd7272; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">9</span>
                                Limitation of Warranties
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Except as expressly stated in these terms, neither {{ $setting->title }} nor any of its
                                content providers grant any express or implied warranty. {{ $setting->title }} and its
                                content are provided on an "as is" basis.
                            </p>
                        </div>

                        <!-- Section 10 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #6bcf7f; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">10</span>
                                Modifications to Terms
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                {{ $setting->title }} may revise these terms of service for our website at any time without
                                notice. By using this website, you are agreeing to be bound by the then current version of
                                these terms of service.
                            </p>
                        </div>

                        <!-- Section 11 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4facfe; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">11</span>
                                Governing Law
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                These terms and conditions are governed by and construed in accordance with the laws of
                                Bangladesh, and you irrevocably submit to the exclusive jurisdiction of the courts located
                                in this location.
                            </p>
                        </div>

                        <!-- Section 12 -->
                        <div class="terms-section" style="margin-bottom: 35px;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fd6e6e; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">12</span>
                                Contact Us
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">
                                If you have any questions about these terms and conditions, please contact us:
                            </p>
                            <div
                                style="background: #f0f0f0; padding: 20px; border-radius: 5px; border-left: 4px solid #fd6e6e;">
                                <p style="margin: 0 0 10px 0; color: #555;"><strong>Email:</strong> <a
                                        href="mailto:support@mehekemart.com"
                                        style="color: #fd6e6e; text-decoration: none;">support@mehekemart.com</a></p>
                                <p style="margin: 0; color: #555;">Or visit our <a href="{{ route('contact') }}"
                                        style="color: #fd6e6e; text-decoration: none; font-weight: 600;">Contact Us</a> page
                                    for more information.</p>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div style="margin-top: 40px; text-align: center;">
                            <a href="{{ route('home') }}"
                                style="display: inline-block; background: #fd6e6e; color: white; padding: 12px 35px; border-radius: 5px; text-decoration: none; font-weight: 600; transition: background 0.3s ease;">←
                                Back to Home</a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-12" style="margin-top: 20px;">
                    <!-- Quick Links -->
                    <div
                        style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
                        <h5
                            style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 20px; border-bottom: 2px solid #fd6e6e; padding-bottom: 10px;">
                            Quick Links</h5>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 12px;"><a href="{{ route('home') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Home</a></li>
                            <li style="margin-bottom: 12px;"><a href="{{ route('contact') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Contact Us</a>
                            </li>
                            <li style="margin-bottom: 12px;"><a href="{{ route('privacy-policy') ?? '#' }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Privacy Policy</a>
                            </li>
                            <li style="margin-bottom: 12px;"><a href="{{ route('refund-policy') ?? '#' }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Returns Policy</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Important Info Box -->
                    <div
                        style="background: linear-gradient(135deg, #fd6e6e 0%, #f23e2e 100%); padding: 25px; border-radius: 8px; color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h5 style="font-size: 16px; font-weight: 700; margin-bottom: 15px; margin-top: 0; color: white;">
                            Important
                            Information</h5>
                        <p style="margin-bottom: 12px; line-height: 1.6; font-size: 14px; color: white;">
                            Please read these terms carefully before using our services. By accessing our website, you agree
                            to be bound by these terms.
                        </p>
                        <p style="margin: 0; line-height: 1.6; font-size: 14px; color: white;">
                            <strong>Last Updated:</strong> {{ now()->format('M d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Terms & Conditions -->

    @include('frontend.layouts.newsletter')
@endsection

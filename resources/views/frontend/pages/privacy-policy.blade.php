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
                            <li class="active"><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
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
                        <h2 style="font-size: 42px; font-weight: 700; color: #222; margin-bottom: 15px;">Privacy Policy</h2>
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
                                Welcome to <strong>{{ $setting->title }}</strong>. We are committed to protecting your
                                privacy and ensuring you have a positive experience on our website. This Privacy Policy
                                explains how we collect, use, disclose, and safeguard your information when you visit our
                                website and use our services.
                            </p>
                        </div>

                        <!-- Section 2 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4ecdc4; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">2</span>
                                Information We Collect
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We collect information you provide directly to us, such as when you create an account, place
                                an order, or contact us for support. This includes your name, email address, phone number,
                                shipping address, billing information, and any other information you choose to provide. We
                                also automatically collect certain information about your device and browsing behavior, such
                                as IP address, browser type, pages visited, and referring URL.
                            </p>
                        </div>

                        <!-- Section 3 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #95e1d3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">3</span>
                                How We Use Your Information
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We use the information we collect to process your orders, send order confirmations and
                                updates, provide customer support, send promotional emails and newsletters (which you can
                                opt-out of at any time), improve our website and services, detect and prevent fraud, and
                                comply with legal obligations. We may also use your information for analytics and to better
                                understand how our customers use our website.
                            </p>
                        </div>

                        <!-- Section 4 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #f38181; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">4</span>
                                Data Security
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We implement appropriate technical and organizational measures to protect your personal
                                information against unauthorized access, alteration, disclosure, or destruction. This
                                includes SSL encryption for all transactions and secure payment processing. However, no
                                security system is impenetrable, and we cannot guarantee absolute security.
                            </p>
                        </div>

                        <!-- Section 5 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #aa96da; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">5</span>
                                Sharing of Information
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We do not sell, trade, or rent your personal information to third parties. We may share
                                information with service providers who assist us in operating our website and conducting
                                business (such as payment processors and shipping carriers) under strict confidentiality
                                agreements. We may also disclose information when required by law or to protect our rights
                                and the safety of our users.
                            </p>
                        </div>

                        <!-- Section 6 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fcbad3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">6</span>
                                Cookies and Tracking Technologies
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We use cookies and similar tracking technologies to enhance your experience on our website.
                                Cookies are small files stored on your device that help us remember your preferences and
                                understand how you use our site. You can control cookie settings through your browser
                                preferences, though disabling cookies may affect website functionality.
                            </p>
                        </div>

                        <!-- Section 7 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #a8d8ea; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">7</span>
                                Your Rights and Choices
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                You have the right to access, update, and correct your personal information at any time by
                                logging into your account or contacting us. You can opt-out of promotional communications by
                                clicking the unsubscribe link in our emails or contacting customer support. You can also
                                request deletion of your account and associated data, subject to legal and business
                                requirements.
                            </p>
                        </div>

                        <!-- Section 8 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #ffd3a5; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">8</span>
                                Third-Party Links
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Our website may contain links to third-party websites and services. We are not responsible
                                for the privacy practices of these external sites. We encourage you to review the privacy
                                policies of any third-party websites before providing your personal information or engaging
                                with their services.
                            </p>
                        </div>

                        <!-- Section 9 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fd7272; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">9</span>
                                Children's Privacy
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Our website is not intended for children under the age of 13. We do not knowingly collect
                                personal information from children under 13. If we become aware that a child under 13 has
                                provided us with personal information, we will take steps to delete such information and
                                terminate the child's account.
                            </p>
                        </div>

                        <!-- Section 10 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #6bcf7f; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">10</span>
                                Data Retention
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We retain your personal information for as long as necessary to provide our services,
                                fulfill your requests, and comply with legal obligations. Once your account is deleted or
                                your information is no longer needed, we securely delete or anonymize it. You can request
                                deletion of your data at any time by contacting us.
                            </p>
                        </div>

                        <!-- Section 11 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4facfe; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">11</span>
                                Changes to Privacy Policy
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We may update this Privacy Policy from time to time to reflect changes in our practices,
                                technology, legal requirements, or other factors. We will notify you of any material changes
                                by updating the "Last Updated" date and posting the revised policy on our website. Your
                                continued use of our website after changes indicates your acceptance of the updated Privacy
                                Policy.
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
                                If you have any questions about this Privacy Policy, your personal information, or our
                                privacy practices, please contact us:
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
                            <li style="margin-bottom: 12px;"><a href="{{ route('terms-condition') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Terms &
                                    Conditions</a>
                            </li>
                            <li style="margin-bottom: 12px;"><a href="{{ route('contact') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Support</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Important Info Box -->
                    <div
                        style="background: linear-gradient(135deg, #fd6e6e 0%, #f23e2e 100%); padding: 25px; border-radius: 8px; color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h5 style="font-size: 16px; font-weight: 700; margin-bottom: 15px; margin-top: 0; color: white;">
                            Your Privacy
                            Matters</h5>
                        <p style="margin-bottom: 12px; line-height: 1.6; font-size: 14px; color: white;">
                            We take your privacy seriously. Please read this policy to understand how we collect, use, and
                            protect your personal information.
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

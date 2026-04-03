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
                            <li class="active"><a href="{{ route('shipping-policy') }}">Shipping Policy</a></li>
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
                        <h2 style="font-size: 42px; font-weight: 700; color: #222; margin-bottom: 15px;">Shipping Policy
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
                                Welcome to <strong>{{ $setting->title }}</strong>. We are committed to delivering your
                                orders quickly and safely. This Shipping Policy outlines our shipping procedures, delivery
                                timelines, and important information to help you understand how your orders are processed
                                and delivered.
                            </p>
                        </div>

                        <!-- Section 2 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4ecdc4; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">2</span>
                                Shipping Methods & Rates
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We offer multiple shipping options to meet your needs. Standard Shipping is free on orders
                                over ৳1000, while orders below ৳1000 incur a flat shipping fee of ৳50. Express Shipping (2-3
                                days) is available for ৳150, and Overnight Shipping is available for ৳300. You can select
                                your preferred shipping method during checkout.
                            </p>
                        </div>

                        <!-- Section 3 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #95e1d3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">3</span>
                                Delivery Times
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Standard Shipping typically takes 5-7 business days for delivery within Dhaka and 7-10
                                business days for other parts of Bangladesh. Express Shipping arrives within 2-3 business
                                days, while Overnight Shipping delivers the next business day. Please note that delivery
                                times are estimates and may vary depending on weather, holidays, and location.
                            </p>
                        </div>

                        <!-- Section 4 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #f38181; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">4</span>
                                Order Tracking
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Once your order is shipped, you will receive a tracking number via email. You can use this
                                number to track your shipment in real-time on our website or through the carrier's website.
                                We recommend checking the tracking status regularly to know the exact location and estimated
                                delivery time of your package.
                            </p>
                        </div>

                        <!-- Section 5 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #aa96da; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">5</span>
                                Shipping Address
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Please ensure you provide a complete and accurate shipping address during checkout. Your
                                address should include the street name, building/house number, and neighborhood. For remote
                                areas, please include additional landmarks or directions to ensure successful delivery. We
                                cannot be responsible for undelivered packages due to incomplete or incorrect addresses.
                            </p>
                        </div>

                        <!-- Section 6 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fcbad3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">6</span>
                                Damaged or Lost Shipments
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                If your package arrives damaged or is reported as lost by the carrier, please contact us
                                immediately with photos and tracking information. We will work with the shipping carrier to
                                investigate and resolve the issue. Depending on the situation, we will either send a
                                replacement or issue a full refund.
                            </p>
                        </div>

                        <!-- Section 7 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #a8d8ea; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">7</span>
                                Shipping Restrictions
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We currently ship to all areas within Bangladesh. However, some remote or restricted areas
                                may have limited shipping options or additional delivery times. Certain hazardous materials
                                and prohibited items cannot be shipped. Please review our product restrictions before
                                placing your order.
                            </p>
                        </div>

                        <!-- Section 8 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #ffd3a5; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">8</span>
                                Packaging & Handling
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We take great care in packaging your orders to ensure they arrive in perfect condition. All
                                items are carefully wrapped and placed in secure boxes with protective padding. Fragile
                                items receive extra care and are clearly marked. If you have special packaging requests,
                                please contact us before placing your order.
                            </p>
                        </div>

                        <!-- Section 9 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fd7272; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">9</span>
                                International Shipping
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Currently, we offer shipping only within Bangladesh. International shipping is not available
                                at this time. However, we are exploring options to expand our shipping capabilities in the
                                future. Please check back regularly or contact us for updates on international shipping
                                availability.
                            </p>
                        </div>

                        <!-- Section 10 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #6bcf7f; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">10</span>
                                Seasonal Delays
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                During peak seasons (holidays, festivals, and special events), shipping times may be longer
                                than usual due to high order volumes. We appreciate your patience during these periods. We
                                recommend placing orders in advance to allow extra time for processing and delivery.
                            </p>
                        </div>

                        <!-- Section 11 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4facfe; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">11</span>
                                Updates to Shipping Policy
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We may update this Shipping Policy from time to time to reflect changes in our shipping
                                operations, partnerships, or service areas. We will notify you of significant changes by
                                updating the "Last Updated" date and posting the revised policy on our website. Your
                                continued use indicates acceptance of the updated policy.
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
                                If you have questions about our Shipping Policy or need assistance with your order delivery,
                                please contact us:
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
                            <li style="margin-bottom: 12px;"><a href="{{ route('refund-policy') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Refund Policy</a>
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
                            Fast & Reliable Shipping</h5>
                        <p style="margin-bottom: 12px; line-height: 1.6; font-size: 14px; color: white;">
                            We ensure your orders are shipped quickly and safely. With multiple shipping options and
                            reliable carriers, your items will reach you in perfect condition.
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

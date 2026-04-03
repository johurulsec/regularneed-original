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
                            <li class="active"><a href="{{ route('refund-policy') }}">Refund & Refund Policy</a></li>
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
                        <h2 style="font-size: 42px; font-weight: 700; color: #222; margin-bottom: 15px;">Return & Refund
                            Policy</h2>
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
                                Welcome to <strong>{{ $setting->title }}</strong>. We want you to be completely satisfied
                                with your purchase. If you're not happy with your order, we offer a comprehensive refund
                                policy to ensure your peace of mind. This policy outlines the conditions and procedures for
                                refunds on products purchased through our platform.
                            </p>
                        </div>

                        <!-- Section 2 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4ecdc4; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">2</span>
                                Refund Eligibility
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Products are eligible for refund within 30 days of purchase, provided they are unused,
                                undamaged, and in original packaging. The product must include all original components,
                                accessories, and documentation. Items that show signs of wear, damage, or use are not
                                eligible for refund. Custom or personalized items cannot be refunded unless they are
                                defective.
                            </p>
                        </div>

                        <!-- Section 3 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #95e1d3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">3</span>
                                How to Request a Refund
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                To request a refund, please log into your account and navigate to your order history. Select
                                the order you wish to return and click the "Request Refund" button. Alternatively, you can
                                contact our customer support team with your order number and reason for refund. We will
                                provide you with instructions on how to return the item and a prepaid return shipping label
                                (for orders over ৳1000).
                            </p>
                        </div>

                        <!-- Section 4 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #f38181; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">4</span>
                                Return Shipping
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                For orders exceeding ৳1000, we provide free return shipping. For orders below ৳1000,
                                customers are responsible for return shipping costs unless the item is defective or arrived
                                damaged. Please ensure the item is securely packaged to prevent damage during transit. We
                                recommend using a tracked shipping method so you can confirm receipt of your return.
                            </p>
                        </div>

                        <!-- Section 5 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #aa96da; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">5</span>
                                Refund Processing Time
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Once we receive your returned item, we will inspect it to ensure it meets our refund
                                conditions. The inspection typically takes 5-7 business days. If approved, the refund will
                                be processed within 7-10 business days and credited back to your original payment method.
                                Please note that it may take an additional 1-2 business days for the funds to appear in your
                                account, depending on your bank.
                            </p>
                        </div>

                        <!-- Section 6 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fcbad3; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">6</span>
                                Defective or Damaged Items
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                If you receive a defective or damaged item, please contact us immediately with photos of the
                                damage. Defective items are eligible for refund or replacement regardless of whether they
                                are in original packaging. We will either send you a replacement item or process a full
                                refund at our discretion. Return shipping for defective items is always free.
                            </p>
                        </div>

                        <!-- Section 7 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #a8d8ea; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">7</span>
                                Non-Refundable Items
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Certain items cannot be refunded, including: used or worn items, items without original
                                packaging, items with visible signs of use or damage, custom or personalized items (unless
                                defective), items purchased from clearance sales, and digital or downloadable products.
                                Additionally, items purchased with promotional codes or discount vouchers may have
                                restrictions on refunds.
                            </p>
                        </div>

                        <!-- Section 8 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #ffd3a5; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">8</span>
                                Replacement Instead of Refund
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                If the product is defective or damaged upon delivery, we offer the option to replace it with
                                a new one instead of issuing a refund. We will ship the replacement item to you free of
                                charge and typically arrive within 5-7 business days. This option is often faster than
                                processing a refund and reordering.
                            </p>
                        </div>

                        <!-- Section 9 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #fd7272; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">9</span>
                                Exceptions and Special Cases
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                Certain situations may require special consideration for refunds, such as if you discover a
                                product is significantly different from its description, or if you experience issues with
                                the product shortly after purchase. Please contact our customer support team to discuss your
                                specific situation. We will work with you to find a fair resolution.
                            </p>
                        </div>

                        <!-- Section 10 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #6bcf7f; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">10</span>
                                Fraudulent Returns
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We reserve the right to refuse refunds for fraudulent returns, including items that appear
                                to be counterfeit, stolen, or obtained through fraudulent means. We may also investigate
                                suspicious return patterns and reserve the right to take appropriate action, including
                                account suspension or legal action if necessary.
                            </p>
                        </div>

                        <!-- Section 11 -->
                        <div class="terms-section"
                            style="margin-bottom: 35px; padding-bottom: 35px; border-bottom: 1px solid #eee;">
                            <h4
                                style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 15px; display: flex; align-items: center;">
                                <span
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #4facfe; color: white; border-radius: 50%; margin-right: 12px; font-weight: bold;">11</span>
                                Updates to Refund Policy
                            </h4>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                We may update this Refund Policy from time to time to reflect changes in our practices,
                                business operations, or legal requirements. We will notify you of significant changes by
                                updating the "Last Updated" date and posting the revised policy on our website. Your
                                continued use of our website indicates your acceptance of the updated policy.
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
                                If you have questions about our Refund Policy or need to initiate a refund request, please
                                contact us:
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
                            <li style="margin-bottom: 12px;"><a href="{{ route('privacy-policy') }}"
                                    style="color: #666; text-decoration: none; transition: color 0.3s;">→ Privacy Policy</a>
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
                            Easy Returns & Refunds</h5>
                        <p style="margin-bottom: 12px; line-height: 1.6; font-size: 14px; color: white;">
                            We stand behind the quality of our products. If you're not completely satisfied, our hassle-free
                            refund policy makes it easy to get your money back.
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

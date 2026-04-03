@extends('frontend.layouts.master')

@php
    $setting = DB::table('settings')->first();
    $orderId = request()->query('order_id', '#123456');
    $orderDate = request()->query('order_date', \Carbon\Carbon::now()->format('M d, Y'));
@endphp

@section('title', 'Order Confirmation - ' . $setting->title)

@section('main-content')
    <style>
        .thank-you-area {
            background: linear-gradient(135deg, white 0%, white 100%);
            padding: 80px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .thank-you-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 60px 40px;
            position: relative;
            overflow: hidden;
        }

        .thank-you-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #4CAF50 0%, #45a049 100%);
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            background: #e8f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon i {
            font-size: 45px;
            color: #4caf50;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .thank-you-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }

        .thank-you-subtitle {
            font-size: 16px;
            color: #666;
            text-align: center;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .order-info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid #4CAF50;
        }

        .order-info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            font-size: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .order-info-row:last-child {
            border-bottom: none;
        }

        .order-info-label {
            color: #666;
            font-weight: 500;
        }

        .order-info-value {
            color: #333;
            font-weight: 600;
        }

        .next-steps {
            background: #fff3cd;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid #ffc107;
        }

        .next-steps-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .steps-list {
            list-style: none;
            padding: 0;
        }

        .steps-list li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            color: #555;
            font-size: 14px;
            line-height: 1.6;
        }

        .steps-list li:last-child {
            margin-bottom: 0;
        }

        .steps-list li::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background: #ffc107;
            color: white;
            border-radius: 50%;
            margin-right: 12px;
            font-weight: 600;
            font-size: 12px;
            flex-shrink: 0;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 14px 35px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary-custom {
            background: #4CAF50;
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(76, 175, 80, 0.3);
            color: white;
            text-decoration: none;
            background: #45a049;
        }

        .btn-secondary-custom {
            background: white;
            color: #333;
            border: 2px solid #ddd;
        }

        .btn-secondary-custom:hover {
            background: #f5f7ff;
            text-decoration: none;
        }

        .email-confirmation {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            background: #f0f4ff;
            border-radius: 10px;
            font-size: 14px;
            color: #555;
        }

        .email-confirmation i {
            color: #4CAF50;
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .thank-you-container {
                padding: 40px 20px;
            }

            .thank-you-title {
                font-size: 24px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-custom {
                width: 100%;
            }

            .order-info-row {
                flex-direction: column;
            }

            .order-info-label::after {
                content: ':';
            }
        }
    </style>

    <!-- Start Thank You Area -->
    <div class="thank-you-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="thank-you-container">
                        <!-- Success Icon -->
                        <div class="success-icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="25" cy="25" r="24" stroke="#4CAF50" stroke-width="2" fill="none" />
                                <path d="M16 25L22 31L34 19" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" fill="none" />
                            </svg>
                        </div>

                        <!-- Thank You Content -->
                        <h2 class="thank-you-title">Order Confirmed!</h2>
                        <p class="thank-you-subtitle">
                            Thank you for your purchase. Your order has been received and is being processed.
                        </p>

                        <!-- Action Buttons -->
                        <div class="action-buttons" style="margin-top: 40px;">
                            <a href="{{ url('/') }}" class="btn-custom btn-secondary-custom">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>Back to Home
                            </a>
                        </div>

                        <!-- Order Information -->
                        <div class="order-info-box mt-4">
                            <div class="order-info-row">
                                <span class="order-info-label">Order ID</span>
                                <span class="order-info-value">{{ $orderId }}</span>
                            </div>
                            <div class="order-info-row">
                                <span class="order-info-label">Order Date</span>
                                <span class="order-info-value">{{ $orderDate }}</span>
                            </div>
                            <div class="order-info-row">
                                <span class="order-info-label">Status</span>
                                <span class="order-info-value">
                                    <span
                                        style="background: #e8f5e9; color: #4caf50; padding: 4px 12px; border-radius: 20px; font-size: 12px;">
                                        Confirmed
                                    </span>
                                </span>
                            </div>
                        </div>

                        <!-- Next Steps -->
                        <div class="next-steps">
                            <div class="next-steps-title">What happens next?</div>
                            <ul class="steps-list">
                                <li>You will receive a confirmation email shortly with your order details</li>
                                <li>Our team will prepare and verify your order</li>
                                <li>You'll get a shipping notification with tracking information</li>
                                <li>Track your package anytime from your account</li>
                            </ul>
                        </div>

                        <!-- Email Confirmation -->
                        <div class="email-confirmation">
                            <i class="fas fa-envelope"></i>
                            A confirmation email has been sent to your registered email address
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Thank You Area -->
@endsection
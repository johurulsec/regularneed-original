@extends('frontend.layouts.master')
@section('title', 'E-commerce || HOME PAGE')

@push('styles')
    <style>
        .pricing-container {
            background: #fff;
            border-radius: 16px;
            padding: 90px;
            width: 100%;

            position: sticky;
            top: 20px;
            z-index: 100;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .pricing-header h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .pricing-header p {
            color: #555;
            font-size: 14px;
        }

        .plans {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .plan-card {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            background: #fff;
            transition: 0.3s;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .plan-card h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .plan-price {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #222;
        }

        .plan-features {
            text-align: left;
            margin: 15px 0;
        }

        .plan-features li {
            margin: 8px 0;
            font-size: 14px;
            color: #444;
            list-style: none;
            position: relative;
            padding-left: 20px;
        }

        .plan-features li::before {
            content: "✔";
            color: #008b00;
            position: absolute;
            left: 0;
        }

        .plan-card button {
            margin-top: 15px;
            padding: 10px 25px;
            border-radius: 8px;
            border: 2px solid #008b00;
            background: transparent;
            color: #008b00;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .plan-card button:hover {
            background: #008b00;
            color: #fff;
        }

        .plan-card:hover {
            border: 2px solid #008b00;
        }

        .modal-md-custom {
            max-width: 800px;
        }

        .modal-dialog .modal-content {
            border-radius: 2px;
            margin-top: -105px;
        }

        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            border-bottom: 0;
        }

        .modal-footer {
            border-top: 0;
        }

        .form-label {
            font-weight: 500;
        }

        .modal-content {
            max-width: 540px;
            margin: auto;
        }

        .payment-fields input {
            border-radius: 0.5rem;
        }

        .form-select {
            border-radius: 0.5rem;
        }

        .modal-header h5 {
            font-size: 1.25rem;
        }

        @media (max-width: 576px) {
            .modal-dialog {
                margin: 1rem;
            }
        }
    </style>
@endpush

@section('main-content')
    <section class="shop checkout section">
        <div class="container">
            <div class="pricing-container">
                <div class="pricing-header">
                    <h2>Choose your plan</h2>
                    <p>🚀 14 days free trial — Get the right plan for your business. Plans can be upgraded in the future.
                    </p>
                </div>

                <div class="plans">
                    <!-- Basic -->
                    <div class="plan-card">
                        <h3>Basic Plan</h3>
                        <div class="plan-price">$49.99<span>/year</span></div>
                        <ul class="plan-features">
                            <li>2TB additional storage</li>
                            <li>Up to 1GB file size</li>
                            <li>Up to 5 projects</li>
                        </ul>
                        <button class="get-plan-btn" data-plan="Basic Plan" data-price="49.99">Get Plan</button>
                    </div>

                    <!-- Standard -->
                    <div class="plan-card featured">
                        <h3>Standard Plan</h3>
                        <div class="plan-price">$99.99<span>/year</span></div>
                        <ul class="plan-features">
                            <li>10TB additional storage</li>
                            <li>Unlimited file size</li>
                            <li>Up to 10 projects</li>
                        </ul>
                        <button class="get-plan-btn" data-plan="Standard Plan" data-price="99.99">Get Plan</button>
                    </div>

                    <!-- Premium -->
                    <div class="plan-card">
                        <h3>Premium Plan</h3>
                        <div class="plan-price">$199.99<span>/year</span></div>
                        <ul class="plan-features">
                            <li>Unlimited storage</li>
                            <li>Unlimited file size</li>
                            <li>Permanent Membership</li>
                        </ul>
                        <button class="get-plan-btn" data-plan="Premium Plan" data-price="199.99">Get Plan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow border-0 rounded-4">
                <!-- Header -->
                <h5 class="modal-title fw-bold flex-grow-1 mb-0 text-center mt-3 mb-3" style="color: #008b00;">Please
                    complete your purchase!</h5>
                <div class="modal-header text-white border-0 d-flex justify-content-center align-items-center"
                    style="background: #008b00;">
                </div>

                <!-- Body -->
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="modal-body"> --}}
                            <!-- Plan Info -->
                            <div class="p-2 bg-light rounded-3 mb-2 text-left">
                                <p class="mb-1 fs-6"><strong>Plan:</strong> <span id="selectedPlan">Basic</span></p>
                                <p class="mb-0 fs-5"><strong>Price:</strong> $<span id="selectedPrice">29.99</span></p>
                            </div>

                            <!-- Payment Method Select -->
                            <div class="mt-3 mb-4">
                                <h6 class="fw-bold mb-2" style="color: #008b00;">Select Payment Method</h6>
                                <select class="form-select w-100" name="payment_method" id="payment_method_select">
                                    <option value="bkash" selected>📱 bKash</option>
                                    <option value="card">💳 Credit/Debit Card</option>
                                </select>
                            </div>

                            <!-- bKash Fields -->
                            <div id="bkashFields" class="payment-fields mt-5">
                                <div class="bg-white border rounded-3 p-3 shadow-sm text-center mb-3"
                                    style="margin-top: 60px !important;">
                                    <img src="https://play-lh.googleusercontent.com/1CRcUfmtwvWxT2g-xJF8s9_btha42TLi6Lo-qVkVomXBb_citzakZX9BbeY51iholWs"
                                        alt="bKash" width="36" class="mb-2">
                                    <div class="fw-bold fs-5 text-primary mb-2">bKash Payment - Send Money</div>
                                    <p class="mb-2"><strong>bKash Number:</strong> 01XXXXXXXXX</p>
                                    <div class="alert-warning py-2 mb-3">
                                        Please send the total amount to the above number and enter your Transaction ID
                                        below.
                                    </div>
                                    <div class="text-center">
                                        <label class="form-label fw-semibold" for="bkashTrxId"
                                            style="color: #008b00;">Transaction
                                            ID *</label>
                                        <input type="text" id="bkashTrxId" class="form-control w-75 mx-auto"
                                            placeholder="e.g. 4G5H7K9L2P">
                                    </div>
                                </div>
                            </div>

                            <!-- Card Fields -->
                            <div id="cardFields" class="payment-fields d-none">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Card Name</label>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Card Number</label>
                                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Expiry (MM/YY)</label>
                                        <input type="text" class="form-control" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">CVV</label>
                                        <input type="password" class="form-control" placeholder="***">
                                    </div>
                                </div>
                            </div>
                            {{--
                        </div> --}}
                    </div>
                </div>


                <!-- Footer -->
                <div class="modal-footer d-flex justify-content-between border-0">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary px-4 fw-bold" id="confirmPayment">Confirm &
                        Pay</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Script -->
    <script>
        $(document).ready(function () {
            // Initialize nice select
            $('#payment_method_select').niceSelect();

            // Show modal with plan data
            $(".get-plan-btn").click(function () {
                let plan = $(this).data("plan");
                let price = $(this).data("price");

                $("#selectedPlan").text(plan);
                $("#selectedPrice").text(price);

                // Update fields according to default selection
                updatePaymentFields();

                $("#paymentModal").modal("show");
            });

            // Update payment fields on select change
            $('#payment_method_select').on('change', updatePaymentFields);

            function updatePaymentFields() {
                let selected = $("#payment_method_select").val();
                $(".payment-fields").addClass("d-none");

                if (selected === "bkash") $("#bkashFields").removeClass("d-none");
                else if (selected === "card") $("#cardFields").removeClass("d-none");
            }

            // Ensure correct fields show on page load
            updatePaymentFields();
        });
    </script>
@endpush
@extends('backend.layouts.master')
@section('title', 'E-commerce || Ads Page')
@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Subscription List</h6>
            <div class="text-right mt-3">
                <a href="#" class="btn btn-info btn-sm">
                    <i class="fas fa-chart-bar"></i> View Analytics
                </a>
                {{-- {{ route('subscription.analytics') }} --}}
                <a href="{{ route('subscription.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Add New Subscription
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($subscriptions->count() > 0)
                    <table class="table table-bordered" id="ads-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>User</th>
                                <th>Plan Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Auto Renew</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N.</th>
                                <th>User</th>
                                <th>Plan Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Auto Renew</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($subscriptions) > 0)
                                @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $subscription->user->name ?? 'N/A' }}</td>
                                        <td>{{ $subscription->plan->name }}</td>
                                        <td>
                                            @if ($subscription->status == 'active' && $subscription->end_date > now())
                                                <span class="badge badge-success">Active</span>
                                            @elseif($subscription->status == 'active' && $subscription->end_date <= now())
                                                <span class="badge badge-warning">Expired</span>
                                            @else
                                                <span class="badge badge-danger">{{ ucfirst($subscription->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $subscription->start_date->format('M d, Y') }}</td>
                                        <td>{{ $subscription->end_date->format('M d, Y') }}</td>
                                        <td>
                                            @if ($subscription->auto_renew)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('subscription.show', $subscription->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('subscription.edit', $subscription->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('subscription.destroy', $subscription->id) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this subscription?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">No subscriptions found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-3" style="float:right;">
                        {{ $subscriptions->links() }}
                    </div>
                @else
                    <h6 class="text-center">No ads found! Please create an ad.</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush

@push('scripts')
    <!-- DataTables scripts -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- SweetAlert for delete confirmation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $('#ads-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 5, 6]
            }]
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.dltBtn').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var dataID = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this ad!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Your ad is safe!");
                    }
                });
            });
        });
    </script>
@endpush

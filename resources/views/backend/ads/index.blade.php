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
            <h6 class="m-0 font-weight-bold text-primary float-left">Ads List</h6>
            <a href="{{ route('ads.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Add Ad"><i class="fas fa-plus"></i> Add Ad</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($ads->count() > 0)
                    <table class="table table-bordered" id="ads-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Target Audience</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Coin Rewards Featured</th>
                                <th>Coins per View <span class="text-success">(Subscriber)</span></th>
                                <th>Coins per View <span class="text-warning">(Non-Subscriber)</span></th>
                                <th>Max Coins per User</th>
                                <th>Total Coins Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Target Audience</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Coin Rewards Featured</th>
                                <th>Coins per View <span class="text-success">(Subscriber)</span></th>
                                <th>Coins per View <span class="text-warning">(Non-Subscriber)</span></th>
                                <th>Max Coins per User</th>
                                <th>Total Coins Budget</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>{{ $ad->id }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>
                                        @if ($ad->image)
                                            <img src="{{ $ad->image }}" class="img-fluid zoom" style="max-width:80px"
                                                alt="{{ $ad->description ?? 'Ad Image' }}">
                                        @else
                                            <img src="{{ asset('backend/img/thumbnail-default.jpg') }}"
                                                class="img-fluid zoom" style="max-width:80px" alt="Default Image">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ad->link)
                                            <a href="{{ $ad->link }}" target="_blank" rel="noopener noreferrer"
                                                title="{{ $ad->link }}">
                                                {{ Str::limit($ad->link, 30) }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $ad->target_audience ?? 'N/A' }}</td>
                                    <td>{{ $ad->start_date ? \Carbon\Carbon::parse($ad->start_date)->format('Y-m-d') : 'N/A' }}
                                    </td>
                                    <td>{{ $ad->end_date ? \Carbon\Carbon::parse($ad->end_date)->format('Y-m-d') : 'N/A' }}
                                    </td>
                                    <td>
                                        @if ($ad->status === 'active')
                                            <span class="badge badge-success">{{ ucfirst($ad->status) }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ ucfirst($ad->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ad->is_featured)
                                            <span class="badge badge-info">Yes</span>
                                        @else
                                            <span class="badge badge-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $ad->coins_per_view_subscriber ?? 0 }}</td>
                                    <td>{{ $ad->coins_per_view_non_subscriber ?? 0 }}</td>
                                    <td>{{ $ad->max_coins_per_user ?? 'N/A' }}</td>
                                    <td>{{ $ad->total_coins_budget ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('ads.edit', $ad->id) }}"
                                            class="btn btn-primary btn-sm float-left mr-1"
                                            style="height:30px; width:30px; border-radius:50%" data-toggle="tooltip"
                                            title="Edit" data-placement="bottom">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('ads.destroy', $ad->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm dltBtn" data-id="{{ $ad->id }}"
                                                style="height:30px; width:30px; border-radius:50%" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3" style="float:right;">
                        {{ $ads->links() }}
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

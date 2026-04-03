@extends('backend.layouts.master')
@section('title', 'Advertisements')
@section('main-content')

<div class="card">
    <h5 class="card-header">Advertisements
        <a href="{{ route('advertisement.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add New">
            <i class="fas fa-plus"></i> Add New Advertisement
        </a>
        <a href="{{ route('advertisement.analytics') }}" class="btn btn-info btn-sm float-right mr-2" data-toggle="tooltip" data-placement="bottom" title="Analytics">
            <i class="fas fa-chart-bar"></i> Analytics
        </a>
    </h5>
    <div class="card-body">
        @if (count($advertisements) > 0)
            <div class="table-responsive">
                <table class="table table-bordered" id="advertisement-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Clicks</th>
                            <th>CTR</th>
                            <th>Budget</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>{{ $advertisement->id }}</td>
                                <td>{{ $advertisement->title }}</td>
                                <td>
                                    @if ($advertisement->photo)
                                        <img src="{{ $advertisement->photo }}" class="img-fluid zoom" style="max-width:80px" alt="{{ $advertisement->photo }}">
                                    @else
                                        <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                    @endif
                                </td>
                                <td>{{ ucfirst($advertisement->position) }}</td>
                                <td>{{ ucfirst($advertisement->ad_type) }}</td>
                                <td>
                                    @if ($advertisement->status == 'active')
                                        <span class="badge badge-success">{{ $advertisement->status }}</span>
                                    @elseif($advertisement->status == 'inactive')
                                        <span class="badge badge-warning">{{ $advertisement->status }}</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $advertisement->status }}</span>
                                    @endif
                                </td>
                                <td>{{ number_format($advertisement->views_count) }}</td>
                                <td>{{ number_format($advertisement->clicks_count) }}</td>
                                <td>{{ $advertisement->views_count > 0 ? round(($advertisement->clicks_count / $advertisement->views_count) * 100, 2) : 0 }}%</td>
                                <td>
                                    @if ($advertisement->budget)
                                        ${{ number_format($advertisement->budget, 2) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('advertisement.edit', $advertisement->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('advertisement.show', $advertisement->id) }}" class="btn btn-info btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form method="POST" action="{{ route('advertisement.destroy', [$advertisement->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $advertisement->id }} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span style="float:right">{{ $advertisements->links() }}</span>
        @else
            <h6 class="text-center">No advertisements found!!! Please create advertisement.</h6>
        @endif
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote-lite.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote-lite.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#advertisement-dataTable').DataTable();
    });
</script>
@endpush 
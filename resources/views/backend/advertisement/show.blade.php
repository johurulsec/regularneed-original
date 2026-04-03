@extends('backend.layouts.master')
@section('title', 'Advertisement Details')
@section('main-content')

<div class="card">
    <h5 class="card-header">Advertisement Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Basic Information</h6>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $advertisement->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $advertisement->description !!}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            @if($advertisement->photo)
                                <img src="{{ $advertisement->photo }}" class="img-fluid" style="max-width:200px">
                            @else
                                No image
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Link URL</th>
                        <td>
                            @if($advertisement->link_url)
                                <a href="{{ $advertisement->link_url }}" target="_blank">{{ $advertisement->link_url }}</a>
                            @else
                                No link
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>{{ ucfirst($advertisement->position) }}</td>
                    </tr>
                    <tr>
                        <th>Ad Type</th>
                        <td>{{ ucfirst($advertisement->ad_type) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($advertisement->status == 'active')
                                <span class="badge badge-success">{{ $advertisement->status }}</span>
                            @elseif($advertisement->status == 'inactive')
                                <span class="badge badge-warning">{{ $advertisement->status }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $advertisement->status }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Campaign Information</h6>
                <table class="table table-bordered">
                    <tr>
                        <th>Target Audience</th>
                        <td>{{ $advertisement->target_audience ?? 'All users' }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $advertisement->start_date ? $advertisement->start_date->format('M d, Y H:i') : 'No start date' }}</td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td>{{ $advertisement->end_date ? $advertisement->end_date->format('M d, Y H:i') : 'No end date' }}</td>
                    </tr>
                    <tr>
                        <th>Budget</th>
                        <td>{{ $advertisement->budget ? '$' . number_format($advertisement->budget, 2) : 'No budget set' }}</td>
                    </tr>
                    <tr>
                        <th>Cost Per Click</th>
                        <td>${{ number_format($advertisement->cost_per_click, 4) }}</td>
                    </tr>
                    <tr>
                        <th>Cost Per View</th>
                        <td>${{ number_format($advertisement->cost_per_view, 4) }}</td>
                    </tr>
                    <tr>
                        <th>Priority</th>
                        <td>{{ $advertisement->priority }}</td>
                    </tr>
                    <tr>
                        <th>Featured</th>
                        <td>{{ $advertisement->is_featured ? 'Yes' : 'No' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h6>Performance Analytics</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Views</h5>
                                <h3>{{ number_format($advertisement->views_count) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Clicks</h5>
                                <h3>{{ number_format($advertisement->clicks_count) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">CTR</h5>
                                <h3>{{ $analytics['ctr'] }}%</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Spent</h5>
                                <h3>${{ number_format($analytics['totalSpent'], 2) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h6>Daily Views (Last 30 Days)</h6>
                <canvas id="viewsChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <h6>Daily Clicks (Last 30 Days)</h6>
                <canvas id="clicksChart" width="400" height="200"></canvas>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h6>Top Referrers</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Referrer URL</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($analytics['topReferrers'] as $referrer)
                                <tr>
                                    <td>{{ $referrer->referrer_url }}</td>
                                    <td>{{ number_format($referrer->count) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No referrer data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('advertisement.edit', $advertisement->id) }}" class="btn btn-primary">Edit Advertisement</a>
                <a href="{{ route('advertisement.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Views Chart
    const viewsCtx = document.getElementById('viewsChart').getContext('2d');
    const viewsChart = new Chart(viewsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($analytics['dailyViews']->pluck('date')) !!},
            datasets: [{
                label: 'Views',
                data: {!! json_encode($analytics['dailyViews']->pluck('count')) !!},
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Clicks Chart
    const clicksCtx = document.getElementById('clicksChart').getContext('2d');
    const clicksChart = new Chart(clicksCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($analytics['dailyClicks']->pluck('date')) !!},
            datasets: [{
                label: 'Clicks',
                data: {!! json_encode($analytics['dailyClicks']->pluck('count')) !!},
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush 
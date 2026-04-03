@extends('backend.layouts.master')
@section('title', 'Advertisement Analytics')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Advertisement Analytics Dashboard</h5>
        <div class="card-body">
            <!-- Overall Statistics -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Advertisements</h5>
                            <h3>{{ number_format($analytics['totalAds']) }}</h3>
                            <small>Active: {{ number_format($analytics['activeAds']) }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Views</h5>
                            <h3>{{ number_format($analytics['totalViews']) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Clicks</h5>
                            <h3>{{ number_format($analytics['totalClicks']) }}</h3>
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

            <!-- Monthly Trends Chart -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Monthly Views Trend (Last 6 Months)</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="monthlyTrendsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Performing Advertisements -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Top Performing Advertisements</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Title</th>
                                            <th>Position</th>
                                            <th>Views</th>
                                            <th>Clicks</th>
                                            <th>CTR</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($analytics['topAds'] as $index => $ad)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $ad->title }}</td>
                                                <td>{{ ucfirst($ad->position) }}</td>
                                                <td>{{ number_format($ad->views_count) }}</td>
                                                <td>{{ number_format($ad->clicks_count) }}</td>
                                                <td>{{ $ad->views_count > 0 ? round(($ad->clicks_count / $ad->views_count) * 100, 2) : 0 }}%
                                                </td>
                                                <td>
                                                    @if ($ad->status == 'active')
                                                        <span class="badge badge-success">{{ $ad->status }}</span>
                                                    @elseif($ad->status == 'inactive')
                                                        <span class="badge badge-warning">{{ $ad->status }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ $ad->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('advertisement.show', $ad->id) }}"
                                                        class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No advertisements found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Summary -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Performance Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Overall CTR</h6>
                                    <h4>{{ $analytics['totalViews'] > 0 ? round(($analytics['totalClicks'] / $analytics['totalViews']) * 100, 2) : 0 }}%
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h6>Average Views per Ad</h6>
                                    <h4>{{ $analytics['totalAds'] > 0 ? round($analytics['totalViews'] / $analytics['totalAds']) : 0 }}
                                    </h4>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h6>Average Clicks per Ad</h6>
                                    <h4>{{ $analytics['totalAds'] > 0 ? round($analytics['totalClicks'] / $analytics['totalAds']) : 0 }}
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h6>Average Spent per Ad</h6>
                                    <h4>${{ $analytics['totalAds'] > 0 ? number_format($analytics['totalSpent'] / $analytics['totalAds'], 2) : 0 }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('advertisement.create') }}" class="btn btn-primary">Create New
                                    Advertisement</a>
                                <a href="{{ route('advertisement.index') }}" class="btn btn-secondary">View All
                                    Advertisements</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Monthly Trends Chart
        const monthlyCtx = document.getElementById('monthlyTrendsChart').getContext('2d');
        const monthlyChart = new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode(
                    $analytics['monthlyViews']->map(function ($item) {
                        return date('M Y', mktime(0, 0, 0, $item->month, 1, $item->year));
                    }),
                ) !!},
                datasets: [{
                    label: 'Monthly Views',
                    data: {!! json_encode($analytics['monthlyViews']->pluck('count')) !!},
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>
@endpush

@extends('backend.layouts.master')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Subscriptions</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>User</th>
                            <th>Plan</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Auto Renew</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($subscriptions) > 0)
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subscription->user->name ?? 'N/A' }}</td>
                                    <td>{{ $subscription->plan_name }}</td>
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
                                        <form method="POST" action="{{ route('subscription.destroy', $subscription->id) }}"
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
            </div>

            <div class="d-flex justify-content-center">
                {{ $subscriptions->links() }}
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('subscription.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Subscription
        </a>
        {{-- {{ route('subscription.analytics') }} --}}
        <a href="#" class="btn btn-info">
            <i class="fas fa-chart-bar"></i> View Analytics
        </a>
    </div>

@endsection

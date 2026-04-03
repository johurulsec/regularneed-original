@extends('user.layouts.head')
@section('title', 'Coin Balance')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Coin Balance</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white">
                                    <div class="card-body text-center">
                                        <h3><i class="fas fa-coins"></i> {{ $user->getCoinsBalance() }}</h3>
                                        <p class="mb-0">Total Coins</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <h3>{{ $transactions->where('type', 'credit')->sum('amount') }}</h3>
                                        <p class="mb-0">Total Earned</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <h3>{{ $transactions->where('type', 'debit')->sum('amount') }}</h3>
                                        <p class="mb-0">Total Spent</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction History</h4>
                    </div>
                    <div class="card-body">
                        @if ($transactions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Balance After</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                                <td>
                                                    @if ($transaction->type == 'credit')
                                                        <span class="badge badge-success">Credit</span>
                                                    @else
                                                        <span class="badge badge-danger">Debit</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="{{ $transaction->type == 'credit' ? 'text-success' : 'text-danger' }}">
                                                        {{ $transaction->type == 'credit' ? '+' : '-' }}{{ $transaction->amount }}
                                                    </span>
                                                </td>
                                                <td>{{ $transaction->description }}</td>
                                                <td>{{ $transaction->balance_after }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $transactions->links() }}
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-coins fa-3x text-muted mb-3"></i>
                                <h5>No transactions yet</h5>
                                <p class="text-muted">Start viewing advertisements to earn coins!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

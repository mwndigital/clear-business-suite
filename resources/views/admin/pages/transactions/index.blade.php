@extends('layouts.admin')
@push('page-title')
    Transactions - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>All Transactions</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="inner">
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary collapseToggleBtn" type="button" data-bs-toggle="collapse" data-bs-target="#clientTransactionCollapse" aria-expanded="false">Add Transaction <i class="fas fa-chevron-down"></i></button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="collapse" id="clientTransactionCollapse">
                            <form action="{{ route('admin.transactions.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Client</label>
                                        <select name="user_id" id="user_id">
                                            <option value="" selected disabled>Select a client</option>
                                            @foreach($clients as $c)
                                                <option value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Date *</label>
                                        <input type="date" name="date_time" id="date_time" value="{{ old('date_time') }}" required>
                                        @error('date_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Amount in</label>
                                        <input type="number" name="amount_in" id="amount_in" step="any" value="{{ old('amount_in') }}">
                                        @error('amount_in')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Amount out</label>
                                        <input type="number" name="amount_out" id="amount_out" step="any" value="{{ old('amount_out') }}">
                                        @error('amount_out')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fees</label>
                                        <input type="number" name="fees" id="fees" step="any" value="{{ old('fees') }}">
                                        @error('fees')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Payment Method *</label>
                                        <select name="payment_method" id="payment_method" required>
                                            @foreach($paymentMethods as $pm)
                                                <option value="{{ $pm->name }}">{{ $pm->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_method')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Transaction ID</label>
                                        <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Invoice ID(s)</label>
                                        <input type="text" name="invoice_ids" id="invoice_ids">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Description *</label>
                                        <textarea name="description" id="description" class="tinyEditor" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg">Add Transaction</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <canvas id="transactionsLineChart"></canvas>
                        <script>
                            var ctx = document.getElementById('transactionsLineChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [
                                        @foreach ($transactions as $transaction)
                                            '{{ $transaction->created_at->format('Y-m-d') }}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: 'Net Revenue',
                                        data: [
                                            @foreach ($transactions as $transaction)
                                                {{ $transaction->amount_in - $transaction->amount_out }},
                                            @endforeach
                                        ],
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    },
                                        {
                                            label: 'Fees',
                                            data: [
                                                @foreach ($transactions as $transaction)
                                                    {{ $transaction->fees }},
                                                @endforeach
                                            ],
                                            backgroundColor: 'rgba(255, 255, 132, 0.2)',
                                            borderColor: 'rgba(255, 255, 132, 1)',
                                            borderWidth: 1
                                        }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-column">
                            <div class="col-12">
                                <div class="transactionAmountItem">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <i class="fa-solid fa-coins"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="">Total Income</h5>
                                            <h3 class="">£{{ $totalAmountIn }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="transactionAmountItem">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <i class="fa-solid fa-sterling-sign"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="">Total Fees</h5>
                                            <h3 class="">£{{ $totalFees }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="transactionAmountItem">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <i class="fa-solid fa-calculator"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="">Total Expense</h5>
                                            <h3 class="">£{{ $totalAmountOut }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover dataTablesTable rowLinks">
                                    <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Description</th>
                                        <th>Amount In</th>
                                        <th>Fees</th>
                                        <th>Amount Out</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td><a href="{{ route('admin.clients.show', $transaction->user->id) }}">{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</a></td>
                                            <td>{{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                                            <td>{{ $transaction->payment_method }}</td>
                                            <td>{!! $transaction->description !!}</td>
                                            <td>£{{ $transaction->amount_in }}</td>
                                            <td>£{{ $transaction->fees }}</td>
                                            <td>£{{ $transaction->amount_out }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('admin.transactions.edit', $transaction->id) }}">Edit</a>
                                                        <a class="confirm-delete-btn" href="{{ route('admin.transactions.destroy', $transaction->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

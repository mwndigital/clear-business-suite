@extends('layouts.admin')
@push('page-title')
    {{ $client->first_name }} {{ $client->last_name }}'s Profile - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>{{ $client->first_name }} {{ $client->last_name }}'s Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pageActionsBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="btn-wrap d-flex flex-md-row justify-content-end" style="width: 100%;">
                            <a href="" class="btn btn-primary">Edit Client</a>
                            <a href="" class="btn btn-danger confirm-delete-btn">Delete Client</a>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-primary" >Back to all clients</a>

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
                    <div class="tabpanel">
                        <div class="tablist" id="clientListGroup" role="tablist">
                            <a href="#summaryTab" class=" active" data-bs-toggle="list" role="tab">Summary</a>
                            <a href="#profileTab" class="" data-bs-toggle="list" role="tab">Profile</a>
                            <a href="#projectsTab" class="" data-bs-toggle="list" role="tab">Projects</a>
                            <a href="#tasksTab" class="" data-bs-toggle="list" role="tab">Tasks</a>
                            <a href="#invoicesTab" class="" data-bs-toggle="list" role="tab">Invoices</a>
                            <a href="#estimatesTab" class="" data-bs-toggle="list" role="tab">Estimates</a>
                            <a href="#quotesTab" class="" data-bs-toggle="list" role="tab">Quotes</a>
                            <a href="#transactionsTab" class="" data-bs-toggle="list" role="tab">Transactions</a>
                            <a href="#ticketsTab" class="" data-bs-toggle="list" role="tab">Tickets</a>
                            <a href="#notesTab" class="" data-bs-toggle="list" role="tab">Notes</a>
                            <a href="#notesTab" class="" data-bs-toggle="list" role="tab">Files</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="summaryTab" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h4>#{{ $client->id }} - {{ $client->first_name }} {{ $client->last_name }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="whiteBox">
                                            <h5>Client Information</h5>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>First Name</strong></td>
                                                        <td>{{ $client->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Last Name</strong></td>
                                                        <td>{{ $client->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Company Name</strong></td>
                                                        <td>{{ $client->userDetail->company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email Address</strong></td>
                                                        <td>{{ $client->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address Line One</strong></td>
                                                        <td>{{ $client->userDetail->address_line_one }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address Line Two</strong></td>
                                                        <td>{{ $client->userDetail->address_line_two }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Town/City</strong></td>
                                                        <td>{{ $client->userDetail->town_city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>State/Region</strong></td>
                                                        <td>{{ $client->userDetail->state_region }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Zip/Postcode</strong></td>
                                                        <td>{{ $client->userDetail->zip_postcode }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Country</strong></td>
                                                        <td>{{ $client->userDetail->country }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phone Number</strong></td>
                                                        <td>{{ $client->userDetail->phone_number }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="whiteBox">
                                            <h5>Invoices/Billing</h5>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="whiteBox">
                                            <h5>Other Actions</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profileTab" role="tabpanel">
                                profile tab
                            </div>
                            <div class="tab-pane" id="projectsTab" role="tabpanel">
                                Projects tab
                            </div>
                            <div class="tab-pane" id="tasksTab" role="tabpanel">
                                Tasks tab
                            </div>
                            <div class="tab-pane" id="invoicesTab" role="tabpanel">
                                Invoices tab
                            </div>
                            <div class="tab-pane" id="estimatesTab" role="tabpanel">
                                Estimates tab
                            </div>
                            <div class="tab-pane" id="quotesTab" role="tabpanel">
                                Quotes tab
                            </div>
                            <div class="tab-pane" id="transactionsTab" role="tabpanel">
                                <div class="row my-4">
                                    <div class="col-md-3">
                                        <div class="whiteAmountBox">
                                            <h4 class="amount">{{ $client->userDetail->default_currency_symbol }}{{ $totalAmountIn }}</h4>
                                            <h3 class="desc">Total in</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="whiteAmountBox">
                                            <h4 class="amount">
                                                {{ $client->userDetail->default_currency_symbol }}{{ $totalAmountOut }}
                                            </h4>
                                            <h3 class="desc">Total out</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="whiteAmountBox">
                                            <h4 class="amount">
                                                {{ $client->userDetail->default_currency_symbol }}{{ $totalFees }}
                                            </h4>
                                            <h3 class="desc">Total fees</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="whiteAmountBox">
                                            <h4 class="amount">
                                                {{ $client->userDetail->default_currency_symbol }}{{ $balance }}
                                            </h4>
                                            <h3 class="desc">Balance</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-dark collapseToggleBtn" type="button" data-bs-toggle="collapse" data-bs-target="#clientTransactionCollapse" aria-expanded="false">Add Transaction <i class="fas fa-chevron-down"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="collapse" id="clientTransactionCollapse">
                                            <form action="{{ route('admin.clients.transaction-store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Client</label>
                                                        <select name="user_id" id="user_id">
                                                            @foreach($clients as $c)
                                                                <option value="{{ $c->id }}" @if($c->id == $client->id) selected @endif>{{ $c->first_name }} {{ $c->last_name }}</option>
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
                                    <div class="col-12">
                                        <table class="table table-hover dataTablesTable rowLinks">
                                            <thead>
                                            <tr>
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
                                            @foreach($user_transactions as $transaction)
                                                <tr>
                                                    <td>{{ date('d/m/Y', strtotime($transaction->date_time)) }}</td>
                                                    <td>{{ $transaction->payment_method }}</td>
                                                    <td>{!! $transaction->description !!}</td>
                                                    <td>{{ $client->userDetail->default_currency_symbol }}{{ $transaction->amount_in }}</td>
                                                    <td>{{ $client->userDetail->default_currency_symbol }}{{ $transaction->fees }}</td>
                                                    <td>{{ $client->userDetail->default_currency_symbol }}{{ $transaction->amount_out }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="">View</a>
                                                                <a href="">Edit</a>
                                                                <a href="">Delete</a>
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
                            <div class="tab-pane" id="ticketsTab" role="tabpanel">
                                Tickets tab
                            </div>
                            <div class="tab-pane" id="notesTab" role="tabpanel">
                                Notes tab
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

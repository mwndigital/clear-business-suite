@extends('layouts.admin')
@push('page-title')
    Create Transaction - Admin
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
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <form action="{{ route('admin.clients.transaction-store') }}" method="POST">
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
        </div>
    </section>
@endsection

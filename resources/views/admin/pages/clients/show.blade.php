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
                        <h1>#{{ $client->id }} - {{ $client->first_name }} {{ $client->last_name }}'s Profile</h1>
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
    @if($errors->any())
        <div class="flex flex-row alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="clientSidebar">
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
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content">
                        <div class="tab-pane active" id="summaryTab" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="whiteBox">
                                        <h5>Client Information</h5>
                                        <table class="table w-100 d-block ">
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
                                        <h5>Invoices</h5>
                                        <table class="table w-100 d-block ">
                                            <tbody>
                                            <tr>
                                                <td><strong>Paid</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Draft</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Unpaid/Due</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Cancelled</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Refunded</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Collections</strong></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="whiteBox">
                                        <h5>Income</h5>
                                        <table class="table w-100 d-block ">
                                            <tbody>
                                            <tr>
                                                <td><strong>Gross Revenue</strong></td>
                                                <td>{{ $client->userDetail->default_currency_symbol }}{{ $totalAmountIn }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Expenses</strong></td>
                                                <td>{{ $client->userDetail->default_currency_symbol }}{{ $expenses }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Net Income</strong></td>
                                                <td>{{ $client->userDetail->default_currency_symbol }}{{ $netIncome }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profileTab" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                     <div class="inner mb-4">
                                        <h5 class="sectionTitle">Main Details</h5>
                                        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">First Name *</label>
                                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $client->first_name) }}" required>
                                                    @error('first_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Last Name *</label>
                                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required>
                                                    @error('last_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="darkBlueBtn">
                                                        save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="inner mb-4">
                                        <h5 class='sectionTitle'>Update Email Address</h5>
                                        <form action="{{ route('admin.clients.email-update', $client->id) }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="">Email Address*</label>
                                                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                                                    @error('email')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="darkBlueBtn">
                                                        save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="inner mb-4">
                                        <h5 class='sectionTitle'>User Details</h5>
                                        <form action="{{ route('admin.clients.update-user-details', $client->id) }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" value="{{ $client->userDetail->company_name }}" required>
                                                    @error('company_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Phone Number</label>
                                                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number', $client->userDetail->phone_number) }}">
                                                    @error('phone_number')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Website</label>
                                                    <input type="text" name="website" id="website" value="{{ old('website', $client->userDetail->website) }}">
                                                    @error('website')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Address Line One *</label>
                                                    <input type="text" name="address_line_one" id="address_line_one" value='{{ old('address_line_one', $client->userDetail->address_line_one) }}' required>
                                                    @error('address_line_one')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Address Line Two</label>
                                                    <input type="text" name="address_line_two" id="address_line_two" value="{{ old('address_line_two', $client->userDetail->address_line_two)  }}">
                                                    @error('address_line_two')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Town / City</label>
                                                    <input type="text" name="town_city" id="town_city" value="{{ old('town_city', $client->userDetail->town_city) }}" required>
                                                    @error('town_city')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">State/region/county</label>
                                                    <input type="text" name="state_region" id="state_region" value="{{ old('state_region', $client->userDetail->state_region) }}" required>
                                                    @error('state_region')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Zip/Postcode</label>
                                                    <input type="text" name="zip_postcode" id="zip_postcode" value="{{ old('zip_postcode', $client->userDetail->zip_postcode) }}" required>
                                                    @error('zip_postcode')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Country</label>
                                                    <select name="country" id="country" required>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country }}" @if($country == $client->userDetail->country) selected @endif>{{ $country }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Default Payment Method</label>
                                                    <select name="default_payment_method" id="default_payment_method">
                                                        @foreach($paymentMethods as $pm)
                                                            <option value="{{ $pm->name }}" @if($pm->name == $client->userDetail->default_payment_method) selected @endif>{{ $pm->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('default_payment_method')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Default Currency</label>
                                                    <select name="default_currency" id="default_currency">
                                                        <option value="" selected disabled>Default Currency</option>
                                                        @foreach($currencies as $cur)
                                                            <option value="{{ $cur->code }}" @if($cur->name == $client->userDetail->default_currency) selected @endif>{{ $cur->name }} - {{ $cur->code }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('default_currency')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Default Currency Symbol</label>
                                                    <input type="text" name="default_currency_symbol" id="default_currency_symbol" value="{{ $client->userDetail->default_currency_symbol }}" readonly>
                                                    @error('default_currency_symbol')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="darkBlueBtn">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="inner">
                                        <h5 class="sectionTitle">Update Password</h5>
                                        <form action="">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Password *</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password" id="password" class="form-control">
                                                        <button type="button" class="input-group-text" id="show-password-btn"><i class="fa-solid fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Confirm Password *</label>
                                                    <div class="input-group">
                                                        <input type="password" name="confirmation_password" id="confirmation_password" class="form-control">
                                                        <button type="button" class="input-group-text" id="show-confirmationPassword-btn"><i class="fa-solid fa-eye"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="w-full mt-2">
                                                    <button type="button" class="generatePasswordBtn btn btn-primary" id="generate-password-btn">Generate password</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="darkBlueBtn">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="projectsTab" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover dataTablesTable ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Date</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clientProjects as $project)
                                                <tr>
                                                    <td>{{ $project->id }}</td>
                                                    <td>{{ $project->name }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($project->start_date)) }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($project->due_date)) }}</td>
                                                    <td>{{ $project->project_status }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="">View</a>
                                                                <a href="">Edit</a>
                                                                <form action="" method="post">
                                                                    @csrf
                                                                    @method("delete")
                                                                    <button type="submit" class="confirm-delete-btn">Delete</button>
                                                                </form>
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
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#clientCreateTransactionModal">Add Transaction</button>
                                    <div class="modal fade" id="clientCreateTransactionModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1>Create transaction for {{ $client->first_name }} {{ $client->last_name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
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
                                    </div>
                                </div>
                            </div>
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
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover dataTablesTable ">
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
                                                            <form action="{{ route('admin.clients.transaction-destroy', $transaction->id) }}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button type="submit" class="confirm-delete-btn">Delete</button>
                                                            </form>
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
                            <div class="row my-4">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#clientNewNoteModal">
                                        Add note
                                    </button>
                                    <div class="modal fade" id="clientNewNoteModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">New Client Note</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.client-notes.store') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Title *</label>
                                                                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                                                @error('title')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Content *</label>
                                                                <textarea name="the_content" id="the_content" class="tinyEditor">{{ old('content') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="text" name="user_id" id="user_id"  value="{{ $client->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button class="btn btn-primary bt-lg" type="submit">Create</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover dataTablesTable rowLinks">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Created</th>
                                            <th>Updates</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clientNote as $cnote)
                                            <tr>
                                                <td>{{ $cnote->title }}</td>
                                                <td>{!! Str::limit($cnote->the_content, 50) !!}</td>
                                                <td>{{ date('d/m/Y', strtotime($cnote->created_at)) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($cnote->updated_at)) }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#clientNoteModal">View</a>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#clientNoteEditModal">Edit</a>
                                                            <form action="{{ route('admin.client-notes.destroy', $cnote->id) }}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button type="submit" class="confirm-delete-btn">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="clientNoteModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title">{{ $cnote->title }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! $cnote->the_content !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="" class="btn btn-primary">Edit note</a>
                                                            <form action="{{ route('admin.client-notes.destroy', $cnote->id) }}" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button type="submit" class="confirm-delete-btn btn btn-danger">Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="clientNoteEditModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title">{{ $cnote->title }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.client-notes.update', $cnote->id) }}" method="POST">
                                                                @csrf
                                                                @method("PUT")
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label for="">Title *</label>
                                                                        <input type="text" name="title" id="title" value="{{ $cnote->title }}" required>
                                                                        @error('title')
                                                                        <div class="text-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label for="">Content *</label>
                                                                        <textarea name="the_content" id="the_content" class="tinyEditor">{{ $cnote->the_content }}</textarea>
                                                                        @error('the_content')
                                                                        <div class="text-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="display: none;">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <input type="text" name="user_id" id="user_id"  value="{{ $client->id }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button class="btn btn-primary bt-lg" type="submit">Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('page-scripts')
        <script>
            $(document).ready(function(){
                $('#default_currency').change(function(){
                    var currency = $(this).val();
                    var symbol = '';

                    switch (currency) {
                        @foreach($currencies as $c)
                        case '{{ $c->code }}':
                            symbol = '{{ $c->symbol }}';
                            break;
                        @endforeach
                    }
                    $('#default_currency_symbol').val(symbol);
                })
            });
        </script>
    @endpush
    <x-password-generation-script/>

@endsection

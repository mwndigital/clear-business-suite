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
                                Transactions tab
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

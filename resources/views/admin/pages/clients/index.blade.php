@extends('layouts.admin')
@push('page-title')
    Clients - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>All Clients</h1>
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
                        <div class="d-flex flex-md-row justify-content-end" style="width: 100%;">
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary" style="width: 100px;">Add Client</a>

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
                        <table class="table table-striped dataTablesTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email Address</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                        <td>{{ $client->userDetail->company_name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ date('d/m/Y - H:i', strtotime($client->created_at)) }}</td>
                                        <td>{{ $client->status }}</td>
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
        </div>
    </section>
@endsection

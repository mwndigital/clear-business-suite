@extends('layouts.admin')
@push('page-title')
    Admin Dashboard
@endpush
@section('content')
    <section class="dashboardWelcomeBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h4>Welcome,</h4>
                        <h1>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layouts.main')
@push('page-title')
    Settings - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <h1>All Settings</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="whiteLinkBox"><a href="">General Settings</a></div>
                </div>
                <div class="col-md-3">
                    <div class="whiteLinkBox"><a href="{{ route('admin.activity.index') }}">Activity Log</a></div>
                </div>
                <div class="col-md-3">
                    <div class="whiteLinkBox"><a href="">Project Settings</a></div>
                </div>
                <div class="col-md-3">
                    <div class="whiteLinkBox"><a href="">Billing & Payment Settings</a></div>
                </div>
                <div class="col-md-3">
                    <div class="whiteLinkBox"><a href=""></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection

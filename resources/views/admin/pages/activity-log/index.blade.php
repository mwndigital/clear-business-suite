@extends('admin.layouts.main')
@push('page-title')
    Activity Log - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <h1>Activity Log</h1>
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
                        <div class="btn-wrap d-flex flex-md-row justify-content-end">
                            <form action="{{ route('admin.activity.clear-log') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning">Clear log</button>
                            </form>
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
                        <table class="table table-hovered dataTablesTable rowLinks">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Causer Type</th>
                                    <th>Caused By</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activity as $activity)
                                    <tr>
                                        <td>{{ $activity->description }}</td>
                                        <td>{{ $activity->causer_type }}</td>
                                        <td>User ID: {{ $activity->causer_id }}</td>
                                        <td>{{ date('d/m/Y', strtotime($activity->created_at)) }}</td>
                                        <td>{{ date('h:i', strtotime($activity->created_at)) }}</td>
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

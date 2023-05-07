@extends('layouts.admin')
@push('page-title')
    Client Note {{ $clientNote->title }} - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>{{ $clientNote->title }}</h1>
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
                            <a href="{{ route('admin.client-notes.edit', $clientNote->id) }}" class="btn btn-primary">
                                Edit Note
                            </a>
                            <a href="{{ route('admin.clients.show', $clientNote->user_id) }}" class="btn btn-primary" >Back to clients profile</a>

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
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td>{{ $clientNote->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{!! $clientNote->content !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Created at:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($clientNote->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated at:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($clientNote->updated_at)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

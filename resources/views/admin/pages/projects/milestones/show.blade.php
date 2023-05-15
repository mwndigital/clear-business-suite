@extends('admin.layouts.main')
@push('page-title')
    {{ $milestone->name }} Project Milestone - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>{{ $milestone->name }}</h1>
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
                        <div class="btn-wrap d-flex flex-md-row justify-content-end w-full">
                            <a href="{{ route('admin.projects-milestones.index') }}" class="btn btn-secondary">All Project Milestones</a>
                            <a href="{{ route('admin.projects-milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit Note</a>
                            <form action="{{ route('admin.projects-milestones.destroy', $milestone->id) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="confirm-delete-btn btn btn-danger">Delete</button>
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
                        <table class="table table-responsive w-100 d-block d-md-table">
                            <tbody>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td>{{ $milestone->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td>{{ $milestone->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date</strong></td>
                                    <td>{{ date('d/m/Y', strtotime($milestone->start_date)) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Due Date</strong></td>
                                    <td>{{ date('d/m/Y', strtotime($milestone->due_date)) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td>{!! $milestone->description !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Project</strong></td>
                                    <td><a href="{{ route('admin.projects.show', $milestone->project->id) }}">{{ $milestone->project->name }}</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

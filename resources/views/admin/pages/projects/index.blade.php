@extends('admin.layouts.main')
@push('page-title')
    Projects - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>All Projects</h1>
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
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add Project</a>
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
                        <table class="table table-hover dataTablesTable rowLinks">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th>Progress</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr onClick="window.location.href = '{{ route('admin.projects.show', $project->id) }}'">
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($project->start_date)) }}</td>
                                    <td>
                                        @if($project->due_date != NULL)
                                            {{ date('d/m/Y', strtotime($project->due_date)) }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $project->project_status }}</td>
                                    <td>{{ $project->user->first_name }} {{ $project->user->last_name }}</td>
                                    <th>{{ $project->progress }}%</th>

                                    <td>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('admin.projects.show', $project->id) }}">View</a>
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

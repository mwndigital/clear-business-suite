@extends('admin.layouts.main')
@push('page-title')
    {{ $project->name }} - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="sub-title">
                                    <a href="{{ route('admin.clients.show', $project->user_id) }}">
                                        {{ $project->user->first_name }} {{ $project->user->last_name }} <i class="fas fa-chevron-right"></i>
                                    </a>
                                </h6>
                                <h1>{{ $project->name }}</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="tablist" id="projectListGroup" role="tablist">
                            <a href="#overviewTab" class=" active" data-bs-toggle="list" role="tab">Overview</a>
                            <a href="#tasksTab" class="" data-bs-toggle="list" role="tab">Tasks</a>
                            <a href="#notesTab" class="" data-bs-toggle="list" role="tab">Notes</a>
                            <a href="#filesTab" class="" data-bs-toggle="list" role="tab">Files</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overviewTab" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table w-100 d-block d-md-table">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Project #</strong></td>
                                                    <td>{{ $project->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Client</strong></td>
                                                    <td>
                                                        <a href="{{ route('admin.clients.show', $project->user_id) }}">
                                                            {{ $project->user->first_name }} {{ $project->user->last_name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Billing Type:</strong></td>
                                                    <td>{{ $project->billing_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Rate</strong></td>
                                                    <td>{{ $project->total_rate }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status</strong></td>
                                                    <td>{{ $project->project_status }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date Created</strong></td>
                                                    <td>{{ date('d/m/Y', strtotime($project->created_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Start Date</strong></td>
                                                    <td>{{ date('d/m/Y', strtotime($project->start_date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Due Date</strong></td>
                                                    <td>
                                                        @if($project->due_date != NULL)
                                                            {{ date('d/m/Y', strtotime($project->due_date)) }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p><strong>Description</strong></p>
                                        {!! $project->description !!}
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tasksTab" role="tabpanel">
                                Tasks
                            </div>
                            <div class="tab-pane" id="notesTab" role="tabpanel">
                                Notes
                            </div>
                            <div class="tab-pane" id="filesTab" role="tabpanel">
                                Files
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

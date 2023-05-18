@extends('admin.layouts.main')
@push('page-title')
    Show Time Tracking {{ $timeTracking->id }}
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Show Tracked Time #{{ $timeTracking->id }}</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.projects-time-tracking.index') }}" class="btn btn-primary btn-lg">Back to all tracked time</a>
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
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <table class="table table-responsive w-100 d-block d-md-table">
                            <tbody>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td>{{ $timeTracking->id }}</td>
                                </tr>
                                @if($timeTracking->project_id != NULL)
                                    <tr>
                                        <td><strong>Project</strong></td>
                                        <td>{{ $timeTracking->project->name }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->task_id != NULL)
                                    <tr>
                                        <td><strong>Task</strong></td>
                                        <td>{{ $timeTracking->task->title }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->milestone_id != NULL)
                                    <tr>
                                        <td><strong>Milestone</strong></td>
                                        <td>{{ $timeTracking->milestone->title }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><strong>Assigned Staff Member</strong></td>
                                    <td>{{ $timeTracking->staff->first_name }} {{ $timeTracking->staff->last_name }}</td>
                                </tr>
                                @if($timeTracking->client_id != NULL)
                                    <tr>
                                        <td><strong>Related Client</strong></td>
                                        <td>{{ $timeTracking->client->first_name }} {{ $timeTracking->client->last_name }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->start_time != NULL)
                                    <tr>
                                        <td><strong>Start Time</strong></td>
                                        <td>{{ $timeTracking->start_time }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->end_time != NULL)
                                    <tr>
                                        <td><strong>End Time</strong></td>
                                        <td>{{ $timeTracking->end_time }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->time_spent != NULL)
                                    <tr>
                                        <td><strong>Time Spent</strong></td>
                                        <td>{{ $timeTracking->time_spent }}</td>
                                    </tr>
                                @endif
                                @if($timeTracking->notes != NULL)
                                    <tr>
                                        <td><strong>Notes</strong></td>
                                        <td>{!! $timeTracking->notes !!}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

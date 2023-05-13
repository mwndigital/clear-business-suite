@extends('admin.layouts.main')
@push('page-title')
    {{ $task->title }}
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>{{ $task->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageActionsBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner" >
                        <div class="btn-wrap d-flex flex-md-row justify-content-end w-full">
                            <a class="btn btn-secondary" href="">All Tasks</a>
                            <a class="btn btn-primary" href="{{ route('admin.projects-tasks.edit', $task->id) }}">Edit</a>
                            <form action="{{ route('admin.projects-tasks.destroy' , $task->id) }}" method="post">
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
                                    <td>{{ $task->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Title</strong></td>
                                    <td>{{ $task->title }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date</strong></td>
                                    <td>{{ date('d/m/Y', strtotime($task->start_date)) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Due Date</strong></td>
                                    <td>
                                        @if($task->due_date != NULL)
                                            {{ date('d/m/Y', strtotime($task->due_date)) }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Priority</strong></td>
                                    <td>{{ $task->priority }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td>{!! $task->description !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Project</strong></td>
                                    <td>{{ $task->project->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layouts.main')
@push('page-title')
    All Project Tasks - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                       <div class="row">
                           <div class="col-md-8"><h1>All Project Tasks</h1></div>
                           <div class="col-md-4">
                               <div class="d-flex justify-content-end">
                                   <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectCreateTaskModal">
                                       Create Task
                                   </button>
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
                        <table class="table table-hover dataTablesTable rowLinks">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Project</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ date('d/m/Y', strtotime($task->start_date)) }}</td>
                                        <td>
                                            @if($task->due_date != NULL)
                                                {{ date('d/m/Y', strtotime($task->due_date)) }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $task->priority }}</td>
                                        <td>{{ $task->project->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('admin.projects-tasks.show', $task->id) }}">View</a>
                                                    <a href="{{ route('admin.projects-tasks.edit', $task->id) }}">Edit</a>
                                                    <form action="{{ route('admin.projects-tasks.destroy' , $task->id) }}" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="confirm-delete-btn btn btn-danger">Delete</button>
                                                    </form>
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
        <div class="modal fade" id="projectCreateTaskModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Create Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.projects-tasks.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Title *</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                    @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Start Date *</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Due Date</label>
                                    <input type="date" name="due_date" id="date_date" value="{{ old('due_date') }}">
                                    @error('due_date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Project *</label>
                                    <select name="project_id" id="project_id">
                                        @foreach($projects as $ap)
                                            <option value="{{ $ap->id }}" >{{ $ap->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Priority</label>
                                    <select name="priority" id="priority">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                    @error('priority')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Task Description</label>
                                    <textarea name="description" id="description" class='tinyEditor' cols="30" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Add Task</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

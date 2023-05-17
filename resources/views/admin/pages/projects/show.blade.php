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

    <section class="pageMain projectShowMain">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="tablist" id="projectListGroup" role="tablist">
                            <a href="#overviewTab" class=" active" data-bs-toggle="list" role="tab">Overview</a>
                            <a href="#tasksTab" class="" data-bs-toggle="list" role="tab">Tasks</a>
                            <a href="#milestonesTab" class="" data-bs-toggle="list" role="tab">Milestones</a>
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
                                                    <td>£{{ $project->total_rate }}</td>
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
                                        <h3>Description</h3>
                                        {!! $project->description !!}
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Project Progress - {{ $project->progress }}%</h3>
                                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-animated" style="width: {{ $project->progress }}%">{{ $project->progress }}%</div>
                                        </div>
                                        <h3>Tasks</h3>
                                        <table class="table table-hover rowLinks">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                {{--<th>Status</th>--}}
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Priority</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projectTasks as $task)
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
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="">View</a>
                                                                <a href="">Edit</a>
                                                                <form action="" method="post">
                                                                    @csrf
                                                                    @method("delete")
                                                                    <button type="submit" class="confirm-delete-btn">Delete</button>
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
                            <div class="tab-pane" id="tasksTab" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectCreateTaskModal">
                                            Create Task
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover dataTablesTable rowLinks">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                {{--<th>Status</th>--}}
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Priority</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($projectTasks as $task)
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
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a type="button" data-bs-toggle='modal' data-bs-target="#projectTaskViewModal">
                                                                        View
                                                                    </a>
                                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#projectTaskEditModal">
                                                                        Edit
                                                                    </a>
                                                                    <form action="{{ route('admin.projects-tasks.destroy', $task->id) }}" method="post">
                                                                        @csrf
                                                                        @method("delete")
                                                                        <button type="submit" class="confirm-delete-btn">Delete</button>
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

                                @if($projectTasks->isNotEmpty())
                                    <div class="modal fade" id="projectTaskEditModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1>Edit Task {{ $task->title }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.projects-tasks.update', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Title *</label>
                                                                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
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
                                                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date) }}" required>
                                                                @error('start_date')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Due Date</label>
                                                                <input type="date" name="due_date" id="date_date" value="{{ old('due_date', $task->due_date) }}">
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
                                                                    @foreach($allProjects as $ap)
                                                                        <option value="{{ $ap->id }}" @if($ap->id == $project->id) selected @endif>{{ $ap->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Priority</label>
                                                                <select name="priority" id="priority">
                                                                    @foreach(['low', 'medium', 'high', 'urgent'] as $priority)
                                                                        @if($priority == $task->priority)
                                                                            <option value="{{ $priority }}" selected>{{ ucfirst($priority) }}</option>
                                                                        @else
                                                                            <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
                                                                        @endif
                                                                    @endforeach
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
                                                                <textarea name="description" id="description" class='tinyEditor' cols="30" rows="10">{{ $task->description }}</textarea>
                                                                @error('description')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary btn-lg">Update Task</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="projectTaskViewModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">{{ $task->title }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                </div>
                                                <div class="modal-body w-100 d-block">
                                                    <table class="table w-100 d-block">
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
                                @endif

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
                                                                @foreach($allProjects as $ap)
                                                                    <option value="{{ $ap->id }}" @if($ap->id == $project->id) selected @endif>{{ $ap->name }}</option>
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
                            </div>
                            <div class="tab-pane" id="milestonesTab" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectMilestonesCreateModal">
                                            Create Milestone
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover dataTablesTable rowLinks">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projectMilestones as $milestone)
                                                <tr>
                                                    <td>{{ $milestone->id }}</td>
                                                    <td>{{ $milestone->name }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($milestone->start_date)) }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($milestone->due_date)) }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#projectMilestonesViewModal">
                                                                    View
                                                                </button>
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#projectMilestonesEditModal">
                                                                    Edit
                                                                </button>
                                                                <form action="{{ route('admin.projects-milestones.destroy', $milestone->id) }}" method="post">
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
                                @if($projectMilestones->isNotEmpty())
                                    <div class="modal fade" id="projectMilestonesViewModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">Create Milestone</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
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
                                    <div class="modal fade" id="projectMilestonesEditModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">Create Milestone</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.projects-milestones.update', $milestone->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Name *</label>
                                                                <input type="text" name="name" id="name" value="{{ old('name', $milestone->name) }}" required>
                                                                @error('name')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">Start Date *</label>
                                                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $milestone->start_date) }}" required>
                                                                @error('start_date')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Due Date *</label>
                                                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $milestone->due_date) }}" required>
                                                                @error('due_date')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Description</label>
                                                                <textarea name="description" id="description" class="tinyEditor" cols="30" rows="10">{{ old('description', $milestone->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Project *</label>
                                                                <select name="project_id" id="project_id" required>
                                                                    @foreach($allProjects as $project)
                                                                        <option value="{{ $project->id }}" @if($project->id == $milestone->project_id) selected @endif>{{ $project->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="modal fade" id="projectMilestonesCreateModal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title">Create Milestone</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.projects-milestones.store') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="">Name *</label>
                                                            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                                            @error('name')
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
                                                            <label for="">Due Date *</label>
                                                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                                                            @error('due_date')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="">Description</label>
                                                            <textarea name="description" id="description" class="tinyEditor" cols="30" rows="10">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="">Project *</label>
                                                            <select name="project_id" id="project_id" required>
                                                                @foreach($allProjects as $project)
                                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="notesTab" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectCreateNotesModal">
                                            Create Note
                                        </button>
                                        <div class="modal fade" id="projectCreateNotesModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Create Note</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.projects-notes.store') }}" method="POST">
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
                                                                <div class="col-12">
                                                                    <label for="">Content *</label>
                                                                    <textarea name="the_content" id="the_content" class="tinyEditor" cols="30" rows="10" required>{{ old('the_content') }}</textarea>
                                                                    @error('the_content')
                                                                    <div class="text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="">Project *</label>
                                                                    <select name="project_id" id="project_id" required>
                                                                        @foreach($allProjects as $project)
                                                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="">Show this note to client?</label>
                                                                    <select name="show_to_client" id="show_to_client" required>
                                                                        <option value="1">Yes</option>
                                                                        <option value="0" selected>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary btn-lg">Add Note</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover dataTablesTable rowLinks w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Show to client?</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projectNotes as $note)
                                                <tr>
                                                    <td>{{ $note->id }}</td>
                                                    <td>{{ $note->title }}</td>
                                                    <td>{!! Str::limit($note->the_content, 50) !!}</td>
                                                    <td>
                                                        @if($note->show_to_client == true)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#projectNotesViewModal">View</button>
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#projectNotesEditModal">Edit</button>
                                                                <form action="{{ route('admin.projects-notes.destroy', $note->id) }}" method="post">
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

                                @if($projectNotes->isNotEmpty())
                                    <div class="modal fade" id="projectNotesEditModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1>Edit Task {{ $note->title }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.projects-notes.update', $note->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Title *</label>
                                                                <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}" required>
                                                                @error('title')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Content *</label>
                                                                <textarea name="the_content" id="the_content" class="tinyEditor" cols="30" rows="10" required>{{ $note->the_content }}</textarea>
                                                                @error('the_content')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Project *</label>
                                                                <select name="project_id" id="project_id" required>
                                                                    @foreach($allProjects as $project)
                                                                        <option value="{{ $project->id }}" @if($project->id == $note->project_id) selected @endif>{{ $project->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Show this note to client?</label>
                                                                <select name="show_to_client" id="show_to_client">
                                                                    @foreach(['0', '1'] as $show_to_client)
                                                                        @if($show_to_client == $note->show_to_client)
                                                                            <option value="{{ $show_to_client }}" selected>@if($show_to_client == 0) No @else Yes @endif</option>
                                                                        @else
                                                                            <option value="{{ $show_to_client }}">@if($show_to_client == 0) No @else Yes @endif</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary btn-lg">Update Note</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="projectNotesViewModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">{{ $note->title }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                </div>
                                                <div class="modal-body w-100 d-block">
                                                    <table class="table w-100 d-block">
                                                        <tbody>
                                                        <tr>
                                                            <td><strong>#</strong></td>
                                                            <td>{{ $note->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Title</strong></td>
                                                            <td>{{ $note->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Content</strong></td>
                                                            <td>{!! $note->the_content !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Show to client</strong></td>
                                                            <td>
                                                                @if($note->show_to_client == true)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Created</strong></td>
                                                            <td>{{ date('d/m/Y', strtotime($note->created_at)) }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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

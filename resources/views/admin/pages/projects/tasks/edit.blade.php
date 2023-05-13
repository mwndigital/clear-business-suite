@extends("admin.layouts.main")
@push('page-title')
    Edit Task {{ $task->title }}- Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>Edit {{ $task->title }}</h1>
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
                        <form action="{{ route('admin.projects-tasks.update', $task->id) }}" method="POST">
                            @csrf
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
                                            <option value="{{ $ap->id }}" @if($ap->id == $task->project_id) selected @endif>{{ $ap->name }}</option>
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
                                    <textarea name="description" id="description" class='tinyEditor' cols="30" rows="10">{{ old('description', $task->description) }}</textarea>
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
    </section>
@endsection

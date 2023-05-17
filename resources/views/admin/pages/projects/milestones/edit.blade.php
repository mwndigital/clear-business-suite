@extends('admin.layouts.main')
@push('page-title')
    Edit {{ $milestone->name }} Milestone
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Edit {{ $milestone->name }}</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.projects-milestones.index') }}" class="btn btn-primary btn-lg">All Milestones</a>
                                </div>
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
                                        @foreach($projects as $project)
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
    </section>
@endsection

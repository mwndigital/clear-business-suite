@extends('admin.layouts.main')
@push('page-title')
    Project Notes - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>All Project Notes</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectNotesCreateModal">
                                        Create Note
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
                                <th>Content</th>
                                <th>Show to client?</th>
                                <th>Project</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notes as $note)
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
                                    <td><a href="">{{ $note->project->name }}</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('admin.projects-notes.show', $note->id) }}">View</a>
                                                <a href="{{ route('admin.projects-notes.edit', $note->id) }}">Edit</a>
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
            </div>
        </div>
        <div class="modal fade" id="projectNotesCreateModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Create Task</h1>
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
                                        @foreach($projects as $project)
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
    </section>
@endsection

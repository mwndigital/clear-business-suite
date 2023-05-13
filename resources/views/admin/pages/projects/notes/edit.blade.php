@extends('admin.layouts.main')
@push('page-title')
    Edit Project Note {{ $note->title }} - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8"><h1>{{ $note->title }}</h1></div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.projects-notes.index') }}" class="btn btn-primary">Back to all notes</a>
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
                                        @foreach($projects as $project)
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
    </section>
@endsection

@extends('admin.layouts.main')
@push('page-title')
    Edit {{ $note->title }} Project Note
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>Edit {{ $note->title }} Note</h1>
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
                        <div class="btn-wrap d-flex flex-md-row justify-content-end w-full">
                            <a href="{{ route('admin.projects-notes.index') }}" class="btn btn-secondary">All Project Notes</a>
                            <a href="{{ route('admin.projects-notes.edit', $note->id) }}" class="btn btn-primary">Edit Note</a>
                            <form action="{{ route('admin.projects-notes.destroy' , $note->id) }}" method="post">
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
                                    <td><strong>Project</strong></td>
                                    <td><a href="{{ $note->project->id }}">{{ $note->project->name }}</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Show to client</strong></td>
                                    <td>
                                        @if($note->show_to_client == 0)
                                            No
                                        @else
                                            Yes
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
    </section>
@endsection

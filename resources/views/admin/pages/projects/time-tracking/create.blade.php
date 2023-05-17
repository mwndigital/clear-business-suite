@extends('admin.layouts.main')
@push('page-title')
    Track Time - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Track Time</h1>
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
                        <form action="{{ route('admin.projects-time-tracking.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12"><label for="">Related To:</label></div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="project" id="projectCB">
                                        <label for="">Project</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="milestone" id="milestoneCB">
                                        <label for="">Milestone</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="tasks" id="taskCB">
                                        <label for="">Task</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row projectsRow" style="display: none;">
                                <div class="col-12">
                                    <label for="">Related Project</label>
                                    <select name="project_id" id="project_id">
                                        <option selected disabled>Select a project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row taskRow" style="display: none;">
                                <div class="col-12">
                                    <label for="">Related Task</label>
                                    <select name="task_id" id="task_id">
                                        <option selected disabled>Select a task</option>
                                        @foreach($projectTasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('task_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row milestoneRow" style="display: none;">
                                <div class="col-12">
                                    <label for="">Related Milestone</label>
                                    <select name="milestone_id" id="milestone_id">
                                        <option selected disabled>Select a milestone</option>
                                        @foreach($projectMilestones as $milestone)
                                            <option value="{{ $milestone->id }}">{{ $milestone->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('milestone_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Client</label>
                                    <small>Only select this if this is relating to a client</small>
                                    <select name="client_id" id="client_id">
                                        <option selected disabled>Please select a client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row dateTimeInputRow">
                                <div class="col-md-6">
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}">
                                    @error('start_time')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">End Time</label>
                                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}">
                                    @error('end_time')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row inputTimeRow" style="display: none;">
                                <div class="col-12">
                                    <label for="">Time Spent</label>
                                    <input type="text" name="time_spent" id="time_spent" value='{{ old('time_spent') }}' placeholder="HH:MM">
                                    @error('time_spent')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href=""  class="durationStartEndToggle">
                                        Enter time duration instead
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Notes</label>
                                    <textarea name="notes" id="notes" class="tinyEditor" cols="30"
                                              rows="10">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Add Time</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        $(document).ready(function(){
            $('.durationStartEndToggle').click(function(event){
                event.preventDefault();

                $('.dateTimeInputRow').toggle();
                $('.inputTimeRow').toggle();

                var toggleText = $(this).text().trim();
                var newText = (toggleText === 'Enter time duration instead') ? 'Set start and end time instead' : 'Enter time duration instead';

                $(this).text(newText);
            });
            $('#milestoneCB').on('change', function(){
                if($(this).is(':checked')){
                    $('.milestoneRow').show();
                }
                else {
                    $('.milestoneRow').hide();
                }
            });
            $('#taskCB').on('change', function(){
                if($(this).is(':checked')){
                    $('.taskRow').show();
                }
                else {
                    $('.taskRow').hide();
                }
            });
            $('#projectCB').on('change', function(){
               if($(this).is(':checked')){
                   $('.projectsRow').show();
               }
               else {
                   $('.projectsRow').hide();
               }
            });

            $('.clockpicker').clockpicker({
                placement: 'bottom',
                align: 'left',
                donetext: 'Done'
            });
        });
    </script>
@endsection

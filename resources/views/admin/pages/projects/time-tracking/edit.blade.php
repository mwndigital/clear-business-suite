@extends('admin.layouts.main')
@push('page-title')
    Edit Tracked Time - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Edit Tracked Time</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary btn-lg" href="{{ route('admin.projects-time-tracking.index') }}">Back to all time tracked</a>
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
                        <form action="{{ route('admin.projects-time-tracking.update', $timeTracking->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            @if($timeTracking->project_id != NULL)
                                <div class="row projectsRow">
                                    <div class="col-12">
                                        <label for="">Related Project</label>
                                        <select name="project_id" id="project_id">
                                            <option selected disabled>Select a project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" @if($project->id == $timeTracking->project_id) selected @endif>{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($timeTracking->task_id != NULL)
                                <div class="row taskRow" >
                                    <div class="col-12">
                                        <label for="">Related Task</label>
                                        <select name="task_id" id="task_id">
                                            <option selected disabled>Select a task</option>
                                            @foreach($projectTasks as $task)
                                                <option value="{{ $task->id }}" @if($task->id == $timeTracking->task_id) selected @endif>{{ $task->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('task_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($timeTracking->milestone_id != NULL)
                                <div class="row milestoneRow">
                                    <div class="col-12">
                                        <label for="">Related Milestone</label>
                                        <select name="milestone_id" id="milestone_id">
                                            <option selected disabled>Select a milestone</option>
                                            @foreach($projectMilestones as $milestone)
                                                <option value="{{ $milestone->id }}" @if($milestone->id == $project->mileston_id) selected @endif>{{ $milestone->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('milestone_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($timeTracking->client_id != NULL)
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Client</label>
                                        <select name="client_id" id="client_id">
                                            <option selected disabled>Please select a client</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}" @if($timeTracking->client_id == $client->id) selected @endif>{{ $client->first_name }} {{ $client->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="row dateTimeInputRow">
                                @if($timeTracking->start_time != NULL)
                                    <div class="col-md-6">
                                        <label for="">Start Time</label>
                                        <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $timeTracking->start_time) }}">
                                        @error('start_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif
                                @if($timeTracking->end_time != NULL)
                                    <div class="col-md-6">
                                        <label for="">End Time</label>
                                        <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $timeTracking->endTime) }}">
                                        @error('end_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            @if($timeTracking->time_spent != NULL)
                                <div class="row inputTimeRow" >
                                    <div class="col-12">
                                        <label for="">Time Spent</label>
                                        <input type="text" name="time_spent" id="time_spent" value='{{ old('time_spent', $timeTracking->time_spent) }}' placeholder="HH:MM">
                                        @error('time_spent')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Notes</label>
                                    <textarea name="notes" id="notes" class="tinyEditor" cols="30"
                                              rows="10">{{ old('notes', $timeTracking->notes) }}</textarea>
                                    @error('notes')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Has this been billed?</label>
                                    <select name="billed" id="billed">
                                        <option value="0" @if($timeTracking->billed == 0) selected @endif>No</option>
                                        <option value="1" @if($timeTracking->billed == 1) selected @endif>Yes</option>
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

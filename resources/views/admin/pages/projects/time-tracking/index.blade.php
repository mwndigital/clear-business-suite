@extends('admin.layouts.main')
@push('page-title')
    Project Time Tracking - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>Time Tracking</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#projectTrackTimeModal">
                                        Add Time Entry
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
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="whiteAmountBox">
                        <h4 class="amount">{{ $totalHours }} Hours {{ $totalMinutes }} Minutes</h4>
                        <h3 class="desc">Total Hours</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="whiteAmountBox">
                        <h4 class="amount">{{ $totalUnbilledHours }} Hours {{ $totalUnbilledMins }} Minutes</h4>
                        <h3 class="desc">Total Unbilled Hours</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="whiteAmountBox">
                        <h4 class="amount">{{ $totalbilledHours }} Hours {{ $totalbilledMins }} Minutes</h4>
                        <h3 class="desc">Total Billed Hours</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <table class="table table-hover dataTablesTable rowLinks">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Related to</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Time Spent</th>
                                    <th>Total Hours</th>
                                    <th>Billed</th>
                                    <th>Staff Member</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($timeTracking as $tt)
                                    <tr>
                                        <td>{{ $tt->id }}</td>
                                        <td>
                                            @if ($tt->project_id != null && $tt->milestone_id != null && $tt->task_id != null)
                                                {{ $tt->project->name }}, {{ $tt->milestone->name }}, {{ $tt->task->title }}
                                            @elseif ($tt->project_id != null)
                                                {{ $tt->project->name }}
                                            @elseif ($tt->milestone_id != null)
                                                {{ $tt->milestone->name }}
                                            @elseif ($tt->task_id != null)
                                                {{ $tt->task->title }}
                                            @endif

                                        </td>
                                        <td>
                                            @if($tt->start_time != NULL)
                                                {{ date('H:i', strtotime($tt->start_time)) }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            @if($tt->end_time != NULL)
                                                {{ date('H:i', strtotime($tt->end_time)) }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            @if($tt->time_spent != NULL)
                                                {{ $tt->time_spent }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $tt->total }}</td>

                                        <td>
                                            @if($tt->billed == 0)
                                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                                            @else
                                                <i class="fa-solid fa-circle-check text-success"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $tt->staff->first_name }} {{ $tt->staff->last_name }}
                                        </td>
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
        <div class="modal fade" id="projectTrackTimeModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Track Time</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                        @foreach($tasks as $task)
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
                                        @foreach($milestones as $milestone)
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

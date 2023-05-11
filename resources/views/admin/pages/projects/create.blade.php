@extends('admin.layouts.main')
@push('page-title')
    Create Project - Admin
@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>Create project</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($errors->any())
        <div class="flex flex-row alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <form action="{{ route('admin.projects.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Project Name *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                    @error('project_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Project Type *</label>
                                    <select name="project_type" id="project_type" required>
                                        <option value="" selected disabled>Please choose a project type</option>
                                        @foreach($projectTypes as $projectType)
                                            <option value="{{ $projectType->name }}">
                                                {{ $projectType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_type')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Client</label>
                                    <select name="user_id" id="user_id">
                                        <option value="" selected disabled>Please choose a client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->first_name }} {{ $client->last_name }} @if($client->userDetail->company_name != NULL)
                                                                                                                                            - {{ $client->userDetail->company_name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Project Status *</label>
                                    <select name="project_status" id="project_status" required>
                                        <option value="" selected disabled>Choose a project status</option>
                                        @foreach($projectStatuses as $projectStatus)
                                            <option value="{{ $projectStatus->name }}">{{ $projectStatus->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_status')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Progress</label>
                                    <input type="number" name="progress" id="progress" step="any" value="{{ old('progress') }}">
                                </div>
                                @error('progress')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Billing Type *</label>
                                    <select name="billing_type" id="billing_type" required>
                                        <option value="" selected disabled>Please choose a billing type</option>
                                        @foreach($billingType as $bt)
                                            <option value="{{ $bt->name }}">{{ $bt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('billing_type')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="total_rate" style="display: none;">
                                        <label for="">Total Rate</label>
                                        <input type="number" name="total_rate" id="total_rate" value="{{ old('total_rate') }}" step="any">

                                    </div>
                                    <div class="rate_per_hour" style="display: none;">
                                        <label for="">Rate per hour</label>
                                        <input type="number" name="rate_per_hour" id="rate_per_hour" step="any" value="{{ old('rate_per_hour') }}">

                                    </div>
                                    @error('rate_per_hour')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('total_rate')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Estimated Hours</label>
                                    <input type="number" name="estimated_hours" id="estimated_hours" step="any" value="{{ old('estimated_hours') }}">
                                    @error('edtimated_hours')
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
                                    <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}">
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
                                    <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="darkBlueBtnXl">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('page-scripts')
    <script>
        $(document).ready(function(){
            $('#billing_type').change(function(){
                var selected = $(this).val();
                if(selected === 'Hourly'){
                    $('.rate_per_hour').show();
                    $('.total_rate').hide();
                }
                else if(selected === 'Fixed Rate') {
                    $('.rate_per_hour').hide();
                    $('.total_rate').show();
                }
                else {
                    $('.rate_per_hour').show();
                    $('.total_rate').hide();
                }
            });
        });
    </script>
@endpush

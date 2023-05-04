@extends('layouts.admin')
@push('page-title')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>Create new client</h1>
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
                        <div class="d-flex flex-md-row justify-content-end" style="width: 100%;">
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-primary" style="width: 100px;">Back to all clients</a>

                        </div>
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
                        <form action="{{ route('admin.clients.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">First Name *</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" id="company_name" required>
                                    @error('company_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Email Address*</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Address Line One *</label>
                                    <input type="text" name="address_line_one" id="address_line_one" value='{{ old('address_line_one') }}' required>
                                    @error('address_line_one')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address Line Two</label>
                                    <input type="text" name="address_line_two" id="address_line_two">
                                    @error('address_line_two')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Town / City</label>
                                    <input type="text" name="town_city" id="town_city" value="{{ old('town_city') }}" required>
                                    @error('town_city')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">State/region/county</label>
                                    <input type="text" name="state_region" id="state_region" value="{{ old('state_region') }}" required>
                                    @error('state_region')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Zip/Postcode</label>
                                    <input type="text" name="zip_postcode" id="zip_postcode" value="{{ old('zip_postcode') }}" required>
                                    @error('zip_postcode')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Country</label>
                                    <select name="country" id="country" required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

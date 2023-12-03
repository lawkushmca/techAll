@extends('employee.layouts.main')

@section('title', 'Edit Employee Profile')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="col-md-8">
{{--{{dd($employee)}}--}}
                    <h2>Edit Profile</h2>
                    <form action="{{ route('emp-profile.store', $employee->user_id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            @include('common.form-errors')
                        </div>
                                <!-- User ID -->
                        {{--<div class="form-group row">--}}
                            {{--<label for="user_id" class="col-md-3 col-form-label text-right pr-0">User ID</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" id="user_id" name="user_id" value="{{ $employee->user_id }}" class="form-control" readonly>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Employee ID -->
                        <div class="form-group row">
                            <label for="emp_id" class="col-md-3 col-form-label text-right pr-0">Employee ID</label>
                            <div class="col-md-9">
                                <input type="text" id="emp_id" name="emp_id" value="{{ $employee->emp_id }}" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-right pr-0">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" value="{{ $employee->name }}" class="form-control" placeholder="Enter employee's name" required>
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-3 col-form-label text-right pr-0">Date of Birth</label>
                            <div class="col-md-9">
                                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}" class="form-control">
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right pr-0">Gender</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $employee->gender === 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $employee->gender === 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <!-- Marital Status -->
                        <div class="form-group row">
                            <label for="marital_status" class="col-md-3 col-form-label text-right pr-0">Marital Status</label>
                            <div class="col-md-9">
                                <select id="marital_status" name="marital_status" class="form-control">
                                    <option value="Single" {{ $employee->marital_status === 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $employee->marital_status === 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Divorced" {{ $employee->marital_status === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="Widowed" {{ $employee->marital_status === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="form-group row">
                            <label for="nationality" class="col-md-3 col-form-label text-right pr-0">Nationality</label>
                            <div class="col-md-9">
                                <input type="text" id="nationality" name="nationality" value="{{ $employee->nationality }}" class="form-control">
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="form-group row">
                            <label for="contact_number" class="col-md-3 col-form-label text-right pr-0">Contact Number</label>
                            <div class="col-md-9">
                                <input type="tel" id="contact_number" name="contact_number" value="{{ $employee->contact_number }}" class="form-control">
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="form-group row">
                            <label for="emergency_contact" class="col-md-3 col-form-label text-right pr-0">Emergency Contact</label>
                            <div class="col-md-9">
                                <input type="tel" id="emergency_contact" name="emergency_contact" value="{{ $employee->emergency_contact }}" class="form-control">
                            </div>
                        </div>

                        <!-- Home Address -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right pr-0">Home Address</label>
                            <div class="col-md-9">
                                <input type="text" id="home_address_street" name="home_address_street" placeholder="Street" value="{{ $employee->home_address_street }}" class="form-control">
                                <input type="text" id="home_address_city" name="home_address_city" placeholder="City" value="{{ $employee->home_address_city }}" class="form-control">
                                <input type="text" id="home_address_state" name="home_address_state" placeholder="State" value="{{ $employee->home_address_state }}" class="form-control">
                                <input type="text" id="home_address_zip" name="home_address_zip" placeholder="Zip Code" value="{{ $employee->home_address_zip }}" class="form-control">
                            </div>
                        </div>

                        <!-- Mailing Address -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right pr-0">Mailing Address</label>
                            <div class="col-md-9">
                                <input type="text" id="mailing_address_street" name="mailing_address_street" placeholder="Street" value="{{ $employee->mailing_address_street }}" class="form-control">
                                <input type="text" id="mailing_address_city" name="mailing_address_city" placeholder="City" value="{{ $employee->mailing_address_city }}" class="form-control">
                                <input type="text" id="mailing_address_state" name="mailing_address_state" placeholder="State" value="{{ $employee->mailing_address_state }}" class="form-control">
                                <input type="text" id="mailing_address_zip" name="mailing_address_zip" placeholder="Zip Code" value="{{ $employee->mailing_address_zip }}" class="form-control">
                            </div>
                        </div>

                        <!-- Personal Email -->
                        <div class="form-group row">
                            <label for="personal_email" class="col-md-3 col-form-label text-right pr-0">Personal Email</label>
                            <div class="col-md-9">
                                <input type="email" id="personal_email" name="personal_email" value="{{ $employee->personal_email }}" class="form-control">
                            </div>
                        </div>

                        <!-- Personal Phone -->
                        <div class="form-group row">
                            <label for="personal_phone" class="col-md-3 col-form-label text-right pr-0">Personal Phone</label>
                            <div class="col-md-9">
                                <input type="tel" id="personal_phone" name="personal_phone" value="{{ $employee->personal_phone }}" class="form-control">
                            </div>
                        </div>

                        <!-- Work Phone -->
                        <div class="form-group row">
                            <label for="work_phone" class="col-md-3 col-form-label text-right pr-0">Work Phone</label>
                            <div class="col-md-9">
                                <input type="tel" id="work_phone" name="work_phone" value="{{ $employee->work_phone }}" class="form-control">
                            </div>
                        </div>

                        <!-- Alternate Phone -->
                        <div class="form-group row">
                            <label for="alternate_phone" class="col-md-3 col-form-label text-right pr-0">Alternate Phone</label>
                            <div class="col-md-9">
                                <input type="tel" id="alternate_phone" name="alternate_phone" value="{{ $employee->alternate_phone }}" class="form-control">
                            </div>
                        </div>

                        <!-- Job Title -->
                        <div class="form-group row">
                            <label for="job_title" class="col-md-3 col-form-label text-right pr-0">Job Title</label>
                            <div class="col-md-9">
                                <input type="text" id="job_title" name="job_title" value="{{ $employee->job_title }}" class="form-control">
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="form-group row">
                            <label for="department" class="col-md-3 col-form-label text-right pr-0">Department</label>
                            <div class="col-md-9">
                                <input type="text" id="department" name="department" value="{{ $employee->department }}" class="form-control">
                            </div>
                        </div>

                        <!-- Employment Status -->
                        <div class="form-group row">
                            <label for="employment_status" class="col-md-3 col-form-label text-right pr-0">Employment Status</label>
                            <div class="col-md-9">
                                <select id="employment_status" name="employment_status" class="form-control">
                                    <option value="Full-Time" {{ $employee->employment_status === 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                    <option value="Part-Time" {{ $employee->employment_status === 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                    <option value="Contract" {{ $employee->employment_status === 'Contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="Temporary" {{ $employee->employment_status === 'Temporary' ? 'selected' : '' }}>Temporary</option>
                                </select>
                            </div>
                        </div>

                        <!-- Joining Date -->
                        <div class="form-group row">
                            <label for="joining_date" class="col-md-3 col-form-label text-right pr-0">Joining Date</label>
                            <div class="col-md-9">
                                <input type="date" id="joining_date" name="joining_date" value="{{ $employee->joining_date }}" class="form-control">
                            </div>
                        </div>

                        <!-- Employment Type -->
                        <div class="form-group row">
                            <label for="employment_type" class="col-md-3 col-form-label text-right pr-0">Employment Type</label>
                            <div class="col-md-9">
                                <select id="employment_type" name="employment_type" class="form-control">
                                    <option value="Permanent" {{ $employee->employment_type === 'Permanent' ? 'selected' : '' }}>Permanent</option>
                                    <option value="Temporary" {{ $employee->employment_type === 'Temporary' ? 'selected' : '' }}>Temporary</option>
                                </select>
                            </div>
                        </div>

                        <!-- Work Location -->
                        <div class="form-group row">
                            <label for="work_location" class="col-md-3 col-form-label text-right pr-0">Work Location</label>
                            <div class="col-md-9">
                                <input type="text" id="work_location" name="work_location" value="{{ $employee->work_location }}" class="form-control">
                            </div>
                        </div>

                        <!-- Status -->
                        {{--<div class="form-group row">--}}
                            {{--<label for="status" class="col-md-3 col-form-label text-right pr-0">Status</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<select id="status" name="status" class="form-control">--}}
                                    {{--<option value="Active" {{ $employee->status === 'Active' ? 'selected' : '' }}>Active</option>--}}
                                    {{--<option value="Inactive" {{ $employee->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Submit Button -->
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

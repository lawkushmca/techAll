<style>
    /*body{*/
    /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
    /*}*/
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: left;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

</style>
@extends('employee.layouts.main')

@section('title', 'Employee')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Profile'])

    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('/user-pic.jpg') }}" alt="Employee Photo" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-head">
                        <h5>{{ $employee->name }}</h5>
                        <h6>{{ $employee->job_title }}</h6>
                        <p class="proile-rating">Joining Date : <span>09-Aug-2010</span></p>
                        {{--<ul class="nav nav-tabs" id="myTab" role="tablist">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"--}}
                                   {{--aria-controls="home" aria-selected="true">About</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"--}}
                                   {{--aria-controls="profile" aria-selected="false">Timeline</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab"--}}
                                   {{--aria-controls="message" aria-selected="false">Send Message</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
                {{--<div class="col-md-2">--}}
                    {{--<a href="{{ route('employees.edit', $employee->id) }}" class="">Edit Profile</a>--}}
                {{--</div>--}}

            </div>
            <div class="row">
                <div class="col-md-4">

                <div class="profile-work1">
                    <h5 class="page-subtitle">Quick Links</h5>
                    {{--{{ route('employee.leave-history', ['id' => $employee->id]) }}--}}
                    {{--{{ route('employee.events-attended', ['id' => $employee->id]) }}--}}
                    {{--{{ route('employee.projects', ['id' => $employee->id]) }}--}}
                    <a href="{{ route('emp-profile.edit') }}" class="">Edit Profile</a><br>
                    <a href="#">Leave History</a><br>
                    <a href="#">Events Attended</a><br>
                    <a href="#">Projects</a><br>
                    <!-- Add more links for other types of history as needed -->
                </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->personal_phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->job_title }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->date_of_birth }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Marital Status</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->marital_status }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nationality</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->nationality }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Contact Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->contact_number }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Emergency Contact</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->emergency_contact }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Home Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        @if (!empty($employee->home_address_street))
                                            {{ $employee->home_address_street }},<br>
                                        @endif
                                        @if (!empty($employee->home_address_city))
                                            {{ $employee->home_address_city }},<br>
                                        @endif
                                        @if (!empty($employee->home_address_state))
                                            {{ $employee->home_address_state }},<br>
                                        @endif
                                        @if (!empty($employee->home_address_zip))
                                            {{ $employee->home_address_zip }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mailing Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        @if (!empty($employee->mailing_address_street))
                                            {{ $employee->mailing_address_street }},<br>
                                        @endif
                                        @if (!empty($employee->mailing_address_city))
                                            {{ $employee->mailing_address_city }},<br>
                                        @endif
                                        @if (!empty($employee->mailing_address_state))
                                            {{ $employee->mailing_address_state }},<br>
                                        @endif
                                        @if (!empty($employee->mailing_address_zip))
                                            {{ $employee->mailing_address_zip }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                            @include('admin.members.form-write-message')
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->experience }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->hourly_rate }}$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->total_projects }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->english_level }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $employee->availability }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>{{ $employee->bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-12 text-right">--}}
                    {{--<a href="{{ route('admin.employees.index') }}" class="btn btn-info">Back to Employee List</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

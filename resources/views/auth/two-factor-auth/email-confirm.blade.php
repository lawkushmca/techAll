@extends('layouts.main')

@section('title', 'Two Factor Authentication')

@section('content')

    <div class="login-container">
        <div class="form-wrapper-guest" style="min-height: 500px;">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <h4 class="page-subtitle">
                                Choose Verification Method
                            </h4>
                            <h5 class="card-title col-md-4">
                                <i class='far fa-envelope'></i>
                                Email
                            </h5>

                            <form method="get" action="{{ route('2fa.generate') }}">
                                @csrf
                                @method('GET')
                                <div class="form-check" >
                                    <input class="form-check-input" type="radio" name="verification_method" id="emailOption" value="email" checked>
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <label class="form-check-label" for="emailOption">
                                        {{ $email }}
                                    </label>
                                </div>

                                <!-- You can add more verification options (e.g., SMS) here -->
                                <hr>
                                <div class="form-group row">

                                    <div class="offset-md-4 col-md-8">

                                        <button type="submit" class="col-sm-6 btn btn-primary btn-sm">Send OTP</button>
                                    </div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

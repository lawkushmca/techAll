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
                                Verify Two Factor Authentication
                            </h4>

                            <p class="mb-3">
                                An OTP has been sent to your registered email address <strong>{{ $email }}</strong>. Please enter the OTP to complete the verification.
                            </p>

                            <form method="post" action="{{ route('2fa.verify') }}">

                                <div class="form-group">
                                    @include('common.form-errors')
                                </div>
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    {{--<span class="col-md-3 text-right pr-2 mt-1" for="otp">Enter OTP</span>--}}
                                    <div class="offset-md-3 col-md-4">
                                        <input type="text" class="form-control" id="token" name="token" placeholder="Enter OTP" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="offset-md-3 col-md-8">
                                        <button type="submit" class="col-sm-6 btn btn-primary btn-sm">Submit OTP</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

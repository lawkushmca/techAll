@extends('layouts.main')

@section('title', 'Locations')

@section('content')
    <style>
        .img-box img {
            max-width: 100%; /* set your desired maximum width */
            max-height: 100%; /* set your desired maximum height */
            width: 600px;
            height: 480px;
        }
    </style>
    <div class="login-container">
        <div class="form-wrapper-guest">

            <div class="row">
                <div class="col-md-12">

                    <div class="text-center">
                        <h1>Our Locations</h1>
                    </div>

                    {{--<div class="col-md-12">--}}
                        <div class="form-group row">
                            <img src="{{asset('img/our-location.webp')}}" class="img-fluid" alt="Tech4All" width="100%">

                        </div>
                        <div class="row">
                            <div class="col text-center mt-3">
                                <h4>Chavadi Ashramam, Hyderabad, India</h4>
                            </div>
                        </div>
                    {{--</div>--}}

                    {{--<div class="col-md-12 pt-4">--}}
                        {{--<div class="col-md-12">--}}
                        <div class="form-group row pt-4">

                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('img/sneha.webp')}}" alt="">
                                </div>
                                <div class="col text-center mt-3">
                                    <h4>Snehalaya Auxilium, Delhi, India</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('img/nanda.webp')}}" alt="">
                                </div>
                                <div class="col text-center mt-3">
                                    <h4>Nanda Gokula Rashtrotthana Parishat, Bengaluru, India</h4>
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<section class="layout_padding1 pt-4">--}}

                        <div class="form-group row pt-4">

                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('img/sankalp.webp')}}" alt="" width="100%" height="100%">
                                </div>
                                <div class="col text-center mt-3">
                                    <h4>Sankalp Foundation, Hyderabad, India</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('img/aashri.webp')}}" alt="" width="100%" height="100%">
                                </div>
                                <div class="col text-center mt-3">
                                    <h4>Aashri Foundation, Hyderabad, India</h4>
                                </div>
                            </div>
                        </div>

                    {{--</section>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="login-container">
        <div class="form-wrapper-guest row">

            <section class="layout_padding pt-3">
                <div class="col-md-12" style="overflow-x: auto;">
                <div class="row">
                    <img src="{{asset('img/index-img.webp')}}" class="img-fluid" alt="Tech4All" width="100%">
                    <div class="offset-md-5 position-absolute top-50 start-50 translate-middle text-center text-white">
                        <h1 class="font-weight-bold" style="font-size: 3rem;">
                            TECH4ALL
                        </h1>
                        <span>
                        <p class="font-italic" style="font-size: 20px;">
                            Breaking the cycle of poverty
                        </p>
                            </span>
                    </div>
                </div>
                </div>
            </section>

            <section class="layout_padding pt-5">
                <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>
                                    OUR <span>GOAL</span>
                                </h1>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                Our organisation, Tech4All aims to eradicate poverty by providing technology and services to the impoverished children across India. We aim to ameliorate their lifestyle and education; our mission is to ensure that through this improvement, these children attain employment and a sustainable income that helps them escape the vicious cycle of poverty.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="img-box">
                            <img src="{{asset('img/goal-img.webp')}}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                </div>
            </section>

        </div>
    </div>

@endsection

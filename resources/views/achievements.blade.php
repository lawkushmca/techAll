@extends('layouts.main')

@section('title', 'Achievements')

@section('content')
    <style>
        .img-box img {
            border-radius: 5px;
        }
        .achievement-card {
            width: 100%;
            margin-bottom: 2rem;
            padding: 1rem 1rem 1rem 1rem;
            background: #e7e7e7;
            border: 1px solid #f3f3f3;
        }

        .ac-shadow {
            box-shadow: 2px 2px 3px 0 rgba(33,33,33,.1);
        }
        .detail-box {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
    <div class="login-container">
        <div class="form-wrapper-guest row">

            <div class="col-md-12">
                <div class="heading_container text-center">
                    <h1>ACHIEVEMENTS</h1>
                    <p class="text-description">Our milestones as an organization</p>
                </div>
            </div>


            @foreach($models as $model)
                @if($model->type === 'foundation')
                    <div class="achievement-card ac-shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset($model->file_path) }}" alt="{{ $model->title }}" width="100%" height="100%">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-box pr-2 pt-1">
                                    <h2>{{ $model->title }}</h2>
                                    <p class="text-description" style="text-align:justify;">
                                        {{ $model->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="col-md-12 mt-3">
                <div class="heading_container text-center">
                    <h1>SUCCESS STORIES</h1>
                </div>
            </div>
            @foreach($models as $model)
                @if($model->type === 'success_story')
                    <div class="achievement-card ac-shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset($model->file_path) }}" alt="{{ $model->title }}" width="100%" height="100%">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-box pr-2 pt-1">
                                    <h2>{{ $model->title }}</h2>
                                    <p class="text-description" style="text-align:justify;">
                                        {{ $model->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-md-12 mt-3">
                <div class="heading_container  text-center">
                    <h1>INTERVIEWS</h1>
                </div>
            </div>
            <div class="achievement-card ac-shadow" style="overflow-x: auto;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="video-container">
                            <iframe src="{{ asset('/video/interview.mp4') }}" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" height="500px" width="800px"></iframe>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="detail-box">
                            <h2>Interview with Ravi Kiran</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

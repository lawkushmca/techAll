<?php
if(!isset($pageTitle))$pageTitle = null;

?>

<section class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">

                    <div class="col-sm-6">
                        <h1>{{$pageTitle}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="breadcrumbs">

                        </div>
                    </div>
                </div>
            </div>

            {{--@if($pageSubtitle)--}}
                {{--<div class="col-12">--}}
                    {{--{{$pageSubtitle}}--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>
    </div>
</section>

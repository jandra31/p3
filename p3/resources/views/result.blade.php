<?php
//include_once('get_data.inc.php');
//
//if ($_GET['ACTION'] == 'ADD') {
//    //run query to add to table gets data from post and then inserts into database
//    add_data($_POST);
//}
//?>
@extends('layouts.master')
@section('content')
    <div class="common-margin-top-50 row text-center common-font-size-lg common-margin-20">
        <div class="col-sm-12">
            payments due:
        </div>
    </div>
    <div class="common-margin-top-30 row text-center common-margin-top-20 common-margin-bottom-10">
        <div class="col-sm-12 cente">
            today is {{$date}}
        </div>
    </div>
    <div class="row">
        <div class="dropdown show common-block-centering">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                filter options
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/p3/public/result_filter?FILTER=P">pending</a>
                <a class="dropdown-item" href="/p3/public/result_filter?FILTER=D">past due</a>
                <a class="dropdown-item" href="/p3/public/result_filter?FILTER=M">monthly</a>
                <a class="dropdown-item" href="/p3/public/result_filter?FILTER=1">one time</a>
                <a class="dropdown-item" href="/p3/public/result_filter?FILTER=O">other</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 text-center">
    </div>
    <div class="">
        @if($filter)
            @if($results==null)
                <div class="text-center common-padding-10">no events found</div>
            @else
                @foreach($results as $item)
                    <div class='row common-padding-top-5'>
                        <div class='col-md-8 offset-md-2 common-padding-10'>
                            <div class='text-center'>
                                {{$item['event_name']}}
                            </div>
                            <div class='text-center'>
                                {{$item['description']}}
                            </div>
                            <div class='text-center'>
                                {{$item['due_date']}}
                            </div>
                            <div class='text-center'>
                                {{$item['event_type']}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @else
            @foreach($results as $item)
                <div class='row common-padding-top-5'>
                    <div class='col-md-8 offset-md-2 common-padding-10'>
                        <div class='text-center'>
                            {{$item['event_name']}}
                        </div>
                        <div class='text-center'>
                            {{$item['description']}}
                        </div>
                        <div class='text-center'>
                            {{$item['due_date']}}
                        </div>
                        <div class='text-center'>
                            {{$item['event_type']}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="common-margin-top-30 row text-center common-font-size-lg common-margin-20">
        <div class="col-sm-12">
            <a class="text-center" href="/p3/public/">ADD AN EVENT</a>
        </div>
    </div>
@endsection






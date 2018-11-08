@extends('layouts.master')
@section('content')
    <div class="common-margin-top-30 col-md-8 offset-md-2 text-center common-font-size-lg common-margin-top-50">
        Welcome, if you want to see the current list click <a class="font-weight-bold"
                                                              href="/p3/public/result">here</a>
    </div>
    <div class="col-md-8 offset-md-2 common-margin-top-20">
        <form action="/p3/public/create" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4 offset-md-2 input-group-text">
                    <span class="input-group-text" id="basic-addon1">Payment Name*</span>
                    <input class="input-group-text width100 form-control" type="text" name="event_name" required
                           aria-describedby="basic-addon1">
                </div>
                <div class="col-md-4  input-group-text">
                    <span class="input-group-text" id="basic-addon2">Due By*:</span>
                    <input class="input-group-text width100 form-control" type="date" name="due_date"
                           aria-describedby="basic-addon2" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 input-group-text ">
                    <span class="input-group-text common-min-height-10" id="basic-addon3">Payment Name</span>
                    <textarea class="input-group-text width100 form-control common-min-height-10 width100"
                              name="event_description" aria-describedby="basic-addon3"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-group-text col-md-8 offset-md-2">
                    <div class="">
                        <label class="input-group-text" for="inputGroupSelect01">Type*</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="event_type" required size="1">
                        <option selected disabled>Choose...</option>
                        <option value="monthly">Monthly</option>
                        <option value="one time">One Time</option>
                        <option value="other">other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8 offset-md-2 common-font-size-sm text-right">*required</div>
            <div class="text-center">
                <button class="btn btn-outline-secondary common-width-15 common-margin-top-10" type="submit"
                        value="FORM-SUMBMIT">
                    ADD
                </button>
            </div>
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
@endsection








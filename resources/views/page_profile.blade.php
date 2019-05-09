@extends('page')

@section('title', 'Profile')

@section('page-content')

<?php
    use Carbon\Carbon;
?>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile information <i class="mdi mdi-face float-right"></i></h4>
                <div>
                    <h3>{{$user->first_name}} {{$user->name}}</h3>
                    <span class="text-muted">{{$user->getFunction()}}</span>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Activity</h4>
                <div class="activity">

                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

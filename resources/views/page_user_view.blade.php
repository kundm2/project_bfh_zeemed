@extends('page')

@section('title', 'User: ' . $user->first_name . ' ' . $user->name )

@section('navbar')
@endsection

@section('page-content')

<?php
    use Carbon\Carbon;
?>


<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">user Information</h4>
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


<div class="row">
</div>



@endsection

@extends('page')

@section('title', 'Add patient' )

@section('page-content')

<?php
    use Carbon\Carbon;
?>

<div class="row">

    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Add Patient</h3>
                <form class="" method="POST" action="{{ URL::asset("/patient/add") }}" target="_self">

                    <div class="form-group {{ $errors->has('name') ? 'text-danger' : '' }}">
                        <label for="name" class="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{old('name')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('name')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('firstname') ? 'text-danger' : '' }}">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" autocomplete="off" value="{{old('firstname')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('firstname')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('birthdate') ? 'text-danger' : '' }}">
                        <label for="birthdate">Birthate</label>
                        <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="dd.mm.yyyy" autocomplete="off" value="{{old('birthdate')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('birthdate')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <div class="form-radio form-radio-flat">
                            <label class="form-check-label" for="male">
                                <input type="radio" class="form-check-input" name="gender" id="male" value="1" checked="true"> Male
                            </label>
                        </div>
                        <div class="form-radio form-radio-flat">
                            <label class="form-check-label" for="female">
                                <input type="radio" class="form-check-input" name="gender" id="female" value="2"> Female
                            </label>
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group float-right">
                        <a type="cancel" class="btn btn-link" href="">Cancel</a>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5 grid-margin stretch-card">
            ...
    </div>

</div>




@endsection

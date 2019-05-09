@extends('page')

@section('title', 'Edit ' . $patient->first_name . ' ' . $patient->name )

@section('page-content')

<?php
    use Carbon\Carbon;
?>

<div class="row">

    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Edit {{$patient->first_name}} {{$patient->name}}</h3>
                <form class="" method="POST" action="{{ URL::asset("/patient/edit/" . $patient->patientID ) }}" target="_self">

                    <div class="form-group">
                        <label for="MRN" class=""><abbr title="Medical Record Number">MRN</abbr></label>
                        <input type="text" class="form-control" name="MRN" id="MRN" autocomplete="off" value="{{ $patient->MRN }}" disabled>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'text-danger' : '' }}">
                        <label for="name" class="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ $errors->has('name') ? old('name') : $patient->name }}">
                        @if ($errors)
                            <small>
                                {{$errors->first('name')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('firstname') ? 'text-danger' : '' }}">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" autocomplete="off" value="{{ $errors->has('first_name') ? old('first_name') : $patient->first_name }}">
                        @if ($errors)
                            <small>
                                {{$errors->first('firstname')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('birthdate') ? 'text-danger' : '' }}">
                        <label for="birthdate">Birthate</label>
                        <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="dd.mm.yyyy" value="{{ $errors->has('birthdate') ? old('birthdate') : $patient->birthdate }}">
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
                                <input type="radio" class="form-check-input" name="gender" id="male" value="1" {{ ($patient->gender == 1 ? ' checked="true"' : '') }}"> Male
                            </label>
                        </div>
                        <div class="form-radio form-radio-flat">
                            <label class="form-check-label" for="female">
                                <input type="radio" class="form-check-input" name="gender" id="female" value="2" {{ ($patient->gender == 2 ? ' checked="true"' : '') }}> Female
                            </label>
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group float-right">
                        <a type="cancel" class="btn btn-link" href="{{ URL::asset("/patient/" . $patient->patientID ) }}">Cancel</a>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <p class="text-danger">Please be careful with this option.</p>
                <a class="btn btn-danger btn-sm" href="{{ URL::asset("/patient/del/" . $patient->patientID ) }}" onclick="return confirm('You\'re about to delete the records of {{$patient->first_name . ' ' . $patient->name}}. Are you sure?');">
                        <i class="mdi mdi-alert-outline"></i>
                        Delete
                </a>
                </button>
            </div>
        </div>
    </div>

</div>




@endsection

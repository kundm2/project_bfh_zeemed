@extends('page')

@section('title', 'Patient: ' . $patient->name )

@section('navbar')
@endsection

@section('page-content')

<?php
    use Carbon\Carbon;
    $currDate = new Carbon();
    $currDate->addHours(2);
?>


<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Patient Information
                <a href="{{ URL::asset("/patient/edit/" . $patient->patientID) }}" class="float-right btn btn-secondary btn-sm">
                    <i class="mdi mdi-account-edit"></i>Edit
                </a>
            </h4>
            <div>
                <h3>
                    {{$patient->first_name}} {{$patient->name}}
                </h3>

                <table class="table table-hover">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th><abbr title="Medical Record Number">MRN</abbr></th>
                            <td>{{$patient->MRN}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$patient->getGender()}}</td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>
                                {{$patient->getAge()}}&nbsp;
                                <small class="text-muted">Birthdate: {{Carbon::parse($patient->birthdate)->format('d.m.Y')}}</small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Activity</h4>
                <div class="activities">
                    @if (!empty($activities))

                        @foreach ($activities as $id => $activity)
                            <div class="activity {{$activity['type']}}">
                                <i class="mdi {{$activity['icon']}}"></i>
                                <small>{{Carbon::parse($activity['time'])->diffForHumans()}}</small>
                                <span class="content"><?php echo  html_entity_decode($activity['content']) ?></span>
                            </div>
                        @endforeach
                    @else
                        <i>No activities found.</i>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Vital</h3>
            <form class="" method="POST" action="{{ URL::asset("/patient/" . $patient->patientID) }}" target="_self">

                <div class="form-group row {{ $errors->has('sign') ? 'text-danger' : '' }}">
                    <div class="col-lg-3 col-form-label">
                        <label for="sign">Sign</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-control" id="sign" name="sign">
                            @foreach ($signs as $sign)
                                <option value="{{$sign->signID}}">{{$sign->sign_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors)<small>{{$errors->first('sign')}}</small>@endif
                </div>

                <div class="form-group row {{ $errors->has('value') ? 'text-danger' : '' }}">
                    <div class="col-lg-3 col-form-label">
                        <label for="value">Value</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="value" id="value" autocomplete="off" value="{{old('value')}}" step="0.1">
                    </div>
                    @if ($errors)<small>{{$errors->first('value')}}</small>@endif
                </div>

                <div class="form-group row {{ $errors->has('timestamp') ? 'text-danger' : '' }}">
                    <div class="col-lg-3 col-form-label">
                        <label for="timestamp">Timestamp</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="datetime-local" class="form-control" name="timestamp" id="timestamp" autocomplete="off" value="{{$currDate->format('Y-m-d\TH:i')}}">
                        <small>
                            <a href="#" onclick="document.getElementById('timestamp').value = '{{$currDate->format('Y-m-d\TH:i')}}';">Now</a>
                        </small>
                    </div>
                    @if ($errors)<small>{{$errors->first('timestamp')}}</small>@endif
                </div>

                <div class="form-group row {{ $errors->has('note') ? 'text-danger' : '' }}">
                    <div class="col-lg-3 col-form-label">
                        <label for="note">Note</label>
                    </div>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="note" id="note" value="{{old('note')}}" rows="3"></textarea>
                    </div>
                    @if ($errors)<small>{{$errors->first('note')}}</small>@endif
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

    @if ($temperatures != '')
        @include('patient.temperature')
    @endif

    @if ($pulses != '')
        @include('patient.pulse ')
    @endif

    @if ($activities_2 != '')
        @include('patient.activity ')
    @endif

    @if ($bloodPressures != '')
        @include('patient.bloodPressure ')
    @endif

</div>



@endsection

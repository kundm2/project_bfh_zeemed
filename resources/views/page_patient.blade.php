@extends('page')

@section('title', 'Patients')

@section('page-content')

<?php
    use Carbon\Carbon;
?>


<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Patients
                    <a href="/patient/add" class="float-right btn btn-secondary btn-sm">
                        <i class="mdi mdi-wheelchair-accessibility"></i>
                        Add
                    </a>
                </h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><abbr title="Medical Record Number">MRN</abbr></th>
                            <th>Name</th>
                            <th>Firstname</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{$patient->MRN}}</td>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->first_name}}</td>
                                <td>{{$patient->getGender()}}</td>

                                <td>{{Carbon::parse($patient->birthdate)->format('d.m.Y')}} <small class="text-muted">(Age: {{$patient->getAge()}})</small></td>

                                <td>
                                    <a href="{{ URL::to('/patient/' . $patient->patientID ) }}" class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                    <a href="{{ URL::asset("/patient/edit/" . $patient->patientID  ) }}" class="btn btn-secondary btn-sm">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

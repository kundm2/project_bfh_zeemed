@extends('page')

@section('title', 'Options')

@section('page-content')

<?php
    use Carbon\Carbon;
?>


<div class="row grid-margin">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Options</h3>
            </div>
        </div>
    </div>
</div>

<div class="row grid-margin">
    <div class="col-lg-6 stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Functions <i class="mdi mdi-odnoklassniki float-right"></i></h3>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Function</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($functions as $function)
                            <tr>
                                <td>{{$function->function_name}}</td>
                                <td>
                                    @if (!$function->isUsed())
                                    <a href="{{ URL::to('/options/function/del/' . $function->functionID ) }}" onclick="return confirm('You\'re about to delete the function {{ $function->function_name }}. Are you sure?');" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <form action="{{ URL::to('/options/funciton/add') }}" method="POST">
                                <td>
                                    <input class="form-control add-option" id="f" name="f" type="text" placeholder="New function" aria-label="Search" value="{{old('f')}}">
                                    @if ($errors)
                                        <small class="text-danger">
                                            {{$errors->first('f')}}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success btn-sm">+ Add</button>
                                </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Medicament <i class="mdi mdi-medical-bag float-right"></i></h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicaments as $medicament)
                            <tr>
                                <td>{{$medicament->medicament_name}}</td>
                                <td>{{$medicament->unit}}</td>
                                <td>
                                    @if (!$medicament->isUsed())
                                    <a href="{{ URL::to('/options/medicament/del/' . $medicament->medicamentID ) }}" onclick="return confirm('You\'re about to delete the medicament {{ $medicament->medicament_name }}. Are you sure?');" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <form action="{{ URL::to('/options/medicament/add') }}" method="POST">
                                <td>
                                    <input class="form-control add-option" id="name" name="name" type="text" placeholder="New medicament" aria-label="Search" value="{{old('name')}}">
                                    @if ($errors)
                                        <small class="text-danger">
                                            {{$errors->first('name')}}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    <input class="form-control add-option" id="unit" name="unit" type="text" placeholder="Unit" aria-label="Search" value="{{old('unit')}}">
                                    @if ($errors)
                                        <small class="text-danger">
                                            {{$errors->first('unit')}}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success btn-sm">+ Add</button>
                                </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

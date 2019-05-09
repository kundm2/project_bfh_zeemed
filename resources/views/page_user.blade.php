@extends('page')

@section('title', 'Users')

@section('page-content')

<?php
    use Carbon\Carbon;
?>


<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Users
                    <a href="/user/add" class="float-right">
                        <button type="button" class="btn btn-secondary btn-sm">
                                <i class="mdi mdi-account-multiple"></i>
                                Add
                        </button>
                    </a>
                </h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Staff Id</th>
                            <th>Name</th>
                            <th>Firstname</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->staffID}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>
                                    <a href="{{ URL::to('/user/' . $user->staffID ) }}" class="btn btn-primary btn-sm">
                                        View
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

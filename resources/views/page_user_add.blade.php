@extends('page')

@section('title', 'Add user' )

@section('page-content')

<?php
    use Carbon\Carbon;
?>

<div class="row">

    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Add User</h3>
                <form class="" method="POST" action="{{ URL::asset("/user/add") }}" target="_self">

                    <div class="form-group {{ $errors->has('username') ? 'text-danger' : '' }}">
                        <label for="username" class="">Username</label>
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off" value="{{old('username')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('username')}}
                            </small>
                        @endif
                    </div>

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

                    <div class="form-group {{ $errors->has('function') ? 'text-danger' : '' }}">
                        <label for="function">Function</label>
                        <select class="form-control" id="function" name="function">
                            @foreach ($functions as $function)
                                <option value="{{$function->functionID}}">{{$function->function_name}}</option>
                            @endforeach
                          </select>
                        @if ($errors)
                            <small>
                                {{$errors->first('function')}}
                            </small>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'text-danger' : '' }}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" value="{{old('password')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('password')}}
                            </small>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('pswrd_confirmation') ? 'text-danger' : '' }}">
                        <label for="pswrd_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="pswrd_confirmation" id="pswrd_confirmation" autocomplete="off" value="{{old('pswrd_confirmation')}}">
                        @if ($errors)
                            <small>
                                {{$errors->first('pswrd_confirmation')}}
                            </small>
                        @endif
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

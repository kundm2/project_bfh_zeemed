@extends('master')

@section('title', 'Login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-5 mx-auto">
                    <div class="auto-form-wrapper">
                        <form action="{{ URL::to('/login') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*********">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Login</button>
                            </div>
                            <div class="text-block text-center my-3">
                                &nbsp;
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection

@extends('master')

<?php
    $actStaff = App\Staff::where('username', Auth::user()->name)->first();
?>

@section('content')

    @include('partials.head')

    <div class="container-fluid page-body-wrapper">

            @include('partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                        @yield('page-content')

                </div>

                @include('partials.footer')
            </div>

    </div>

@endsection

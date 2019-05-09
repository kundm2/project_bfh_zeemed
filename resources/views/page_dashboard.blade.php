@extends('page')

@section('title', 'Dashboard')

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('page-content')

<div class="row">

    <div class="col-lg-9 grid-margin stretch-card">
          <!--weather card-->
          <div class="card card-weather">
            <div class="card-body">
              <div class="weather-date-location">
                <h3>
                    {{ $dt->format('l') }}
                    <div class="input-group float-right" id="cityform">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="Biel-Bienne, Switzerland">
                        <div class="input-group-append">
                                <button type="button" class="btn btn-light">Save</button>
                        </div>
                    </div>
                    <a href="#" class="float-right text-dark" id="city-btn">
                        <i class="menu-icon mdi mdi-settings"></i>
                    </a>
                </h3>
                <p class="text-gray">
                  <span class="weather-date">{{ $dt->toFormattedDateString() }}</span><br>
                  <span class="weather-location">Biel-Bienne, Switzerland</span>
                </p>
              </div>
              <div class="weather-data d-flex">
                <div class="mr-auto">
                  <h4 class="display-3">21
                    <span class="symbol">&deg;</span>C</h4>
                  <p>
                    Mostly Cloudy
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="d-flex weakly-weather">
                <div class="weakly-weather-item">
                  <p class="mb-0">
                    Sun
                  </p>
                  <i class="mdi mdi-weather-cloudy"></i>
                  <p class="mb-0">
                    30°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Mon
                  </p>
                  <i class="mdi mdi-weather-hail"></i>
                  <p class="mb-0">
                    31°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Tue
                  </p>
                  <i class="mdi mdi-weather-partlycloudy"></i>
                  <p class="mb-0">
                    28°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Wed
                  </p>
                  <i class="mdi mdi-weather-pouring"></i>
                  <p class="mb-0">
                    30°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Thu
                  </p>
                  <i class="mdi mdi-weather-pouring"></i>
                  <p class="mb-0">
                    29°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Fri
                  </p>
                  <i class="mdi mdi-weather-snowy-rainy"></i>
                  <p class="mb-0">
                    31°
                  </p>
                </div>
                <div class="weakly-weather-item">
                  <p class="mb-1">
                    Sat
                  </p>
                  <i class="mdi mdi-weather-snowy"></i>
                  <p class="mb-0">
                    32°
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--weather card ends-->
    </div>

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 align-items-stretch grid-margin">
        <div class="card card-statistics">
            <a class="card-body" href="{{ URL::to('/patients') }}">
                <div class="float-left">
                    <i class="mdi mdi-wheelchair-accessibility text-primary icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Total Patients</p>
                    <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$patient_count}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <br>
        <div class="card card-statistics">
            <a class="card-body" href="{{ URL::to('/users') }}">
                <div class="float-left">
                    <i class="mdi mdi-account-multiple text-dark icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Total Staff</p>
                    <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$user_count}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <br>
        <div class="card card-statistics">
            <a class="card-body" href="{{ URL::to('/options') }}">
                <div class="float-left">
                    <i class="mdi mdi-medical-bag text-muted icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Total Medicament</p>
                    <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$medicament_count}}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>


@endsection

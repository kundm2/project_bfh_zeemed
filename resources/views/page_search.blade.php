@extends('page')

@section('title', 'Search results for \'' . $q . '\'')

@section('page-content')

<?php
    use Carbon\Carbon;
?>


<div class="row grid-margin">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
        <h3 class="card-title search-term"><?php echo $searchResults->count() . ' result(s) found for \'<span class="text-primary">' . htmlspecialchars($q) . '</span>\''; ?></h3>

        <form action="{{ URL::to('/search') }}" method="GET">
            <input class="form-control" id="q" name="q" type="text" value="{{ htmlspecialchars($q) }}" aria-label="Search">
        </form>
        <p>
            @foreach($searchResults as $searchResult)
                <ul class="list-arrow">
                        <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                </ul>
            @endforeach
        </p>

            </div>
        </div>
    </div>
</div>


@endsection

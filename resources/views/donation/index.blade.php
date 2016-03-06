@extends('layouts.donation')

@section('content')

<div class="container">

    <div class="row col-md-4 col-md-offset-4">
        <h3>Have you donated to us before?</h3>
        {{link_to_route('donate.create', 'Yes, please log me in!', [], ['class' => 'btn btn-lg btn-primary btn-block'])}}
    </div>

    <div class="row col-md-4 col-md-offset-4">
        <h3>No, I'd like to register</h3>
        {{link_to('/register', 'Register', ['class' => 'btn btn-lg btn-primary btn-block'])}}
    </div>


</div>


@endsection

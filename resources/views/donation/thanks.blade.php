@extends('layouts.donation')

@section('content')

<div class="container" style="padding-top: 50px;">
    <div class="jumbotron">
        <p><h1>Thank you!</h1></p>
        <p>Seriously, the world needs more people like you!</p>
        {{link_to_route('home', 'Back to the main page', [], ['class' => 'btn btn-lg btn-primary'])}}
    </div>
</div>



@endsection
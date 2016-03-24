@extends('settings.layout')

@section('content')

<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h1>{{$user->name}} <small>public profile</small></h1>
            </div>

            <div class="row">

            <ul class="nav navbar-nav">
                <li>{{ link_to_route('home', 'Home') }}</li>
                <li>{{ link_to_route('about', 'About') }}</li>
                <li>{{ link_to_route('contact', 'Contact') }}</li>
                <li>{{ link_to_route('events.index', 'Events') }}</li>
                @if (Auth::user()->id == $user->id)
                <li>{{ link_to_route('me.settings', 'Update Profile')}}</li>
                @endif
            </ul>
            </div>

            <div class="row">

                <div class="col-md-4">
                    @if (! $user->avatar == null)
                        <img src="{{$user->avatar->getUrl('avatar')}}" class="img-circle">
                    @endif
                    <!--<span class="thumbnail">
                    </span>-->
                </div>
            </div>


        </div>
    </div>


</div>



@endsection
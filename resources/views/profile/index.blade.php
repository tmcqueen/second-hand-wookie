@extends('settings.layout')

@section('content')

<h1>{{$user->name}} Public Profile</h1>

{{ link_to_route('home', 'Home') }}
{{ link_to_route('about', 'About') }}
{{ link_to_route('contact', 'Contact') }}
{{ link_to_route('events', 'Events') }}

@endsection
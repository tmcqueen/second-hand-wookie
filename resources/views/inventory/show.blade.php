@extends('layouts.inventory')

@section('content')
<div class="container">
    <ul>
    @foreach (['name','make','model','description','cost'] as $property)
        <li>{{$property}}: {{$asset[$property]}}</li>
    @endforeach
    </ul>
</div>
@endsection
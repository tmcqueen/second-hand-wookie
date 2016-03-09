@extends('layouts.inventory')

@section('content')
<div class="container">
    <ul>
    @foreach (['name','make','model','description','cost'] as $property)
        <li>{{$property}}: {{$asset[$property]}}</li>
    @endforeach
    </ul>

    {{link_to_route('inventory.edit', 'Edit', ['asset' => $asset->id], ['class' => 'btn btn-lg btn-primary'])}}
</div>
@endsection
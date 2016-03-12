@extends('layouts.inventory')

@section('content')
<div class="container">

    <div class="default-image">
        @if (! is_null($asset->defaultImage))
        <img src="{{$asset->defaultImage->getThumbnailUrl(400,400)}}" alt="">
        @else
        <img src="http://lorempixel.com/404/404/cats/No%20Image%20Found%20Have%20A%20Cat%20Instead/" alt="">
        @endif
    </div>

    <ul>
    @foreach (['name','make','model','description','cost', 'tag'] as $property)
        <li>{{$property}}: {{$asset[$property]}}</li>
    @endforeach
    </ul>

    <p>
        Owner: {{$asset->user->name}}
    </p>

    <div class="row">
    @forelse($asset->documents as $document)
    <a href="{{route('document', $document->code)}}">
        <img src="{{$document->getDocument()->getThumbnailURL()}}" class="img-thumbnail">
    </a>
    @empty
    <h3>No Documents to show</h3>
    @endforelse
    </div>

    @if(Auth::check())
    {{link_to_route('inventory.edit', 'Edit', ['asset' => $asset->id], ['class' => 'btn btn-lg btn-primary'])}}
    @endif
</div>
@endsection
@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="default-image">
        <img src="{{$asset->defaultImage->getThumbnailUrl(400,400)}}" alt="">
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

    {{link_to_route('inventory.edit', 'Edit', ['asset' => $asset->id], ['class' => 'btn btn-lg btn-primary'])}}
</div>
@endsection
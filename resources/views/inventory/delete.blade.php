@extends('layouts.inventory')

@section('content')
<div class="jumbotron">
    <h1>Are you sure you want to delete this item?</h1>
    <h3>(it can be undone by an administrator later)</h3>

    {{link_to_route('inventory.delete', 'Delete ' . $asset->name . '?', ['class' => 'btn btn-lg btn-error'])}}
</div>
@endsection
@extends('layouts.inventory')

@section('content')
<div class="buffer"></div>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>Make</th>
                <th>Model</th>
                <th>Cost</th>
                <th>Description</th>
                <th></th>
            </thead>
            <tbody>
                @each('inventory.partials.asset', $inventory, 'asset')
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="center-block">
            {{ $inventory->links() }}
        </div>

    </div>

</div>
@endsection
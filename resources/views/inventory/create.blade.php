@extends('layouts.inventory')

@section('content')
<div class="container">


    <form action="{{route('inventory.store')}}" method="POST" role="form">
        <legend>Asset Edit</legend>

        {{csrf_field()}}

        <div class="form-group">
            <label for="assetName">Name</label>
            <input type="text" name="name" class="form-control" id="assetName" placeholder="Input field">
        </div>

        <div class="form-group">
            <label for="assetMake">Make</label>
            <input type="text" name="make" class="form-control" id="assetMake" placeholder="Manufacturer">
        </div>

        <div class="form-group">
            <label for="assetModel">Model</label>
            <input type="text" name="model" class="form-control" id="assetModel" placeholder="Model"">
        </div>

        <div class="form-group">
            <label for="assetCost">Cost</label>
            <input type="text" name="cost" class="form-control" id="assetCost" placeholder="Cost">
        </div>

        <div class="form-group">
            <label for="assetDescription">Description</label>

            <textarea class="form-control" name="description" rows="4"></textarea>

        </div>

        <div class="checkbox"><label><input type="checkbox" name="in_inventory">In Inventory</label></div>

        <button type="submit" class="btn btn-primary">Submit</button>
        {{link_to(URL::previous(),'Cancel', ['class' => 'btn btn-warning'])}}
    </form>

</div>
@endsection
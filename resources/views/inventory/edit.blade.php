@extends('layouts.inventory')

@section('content')
<div class="container">


    {{Form::open([
        'route' => ['inventory.update', $asset->id],
        'files'=> false,
        'method' => 'patch'])}}

        <legend>Asset Edit</legend>

        <div class="form-group">
            <label for="assetName">Name</label>
            <input type="text" class="form-control" name="name" id="assetName" placeholder="Input field" value="{{$asset->name}}">
        </div>

        <div class="form-group">
            <label for="assetMake">Make</label>
            <input type="text" class="form-control" name="make" id="assetMake" placeholder="Manufacturer" value="{{$asset->make}}">
        </div>

        <div class="form-group">
            <label for="assetModel">Model</label>
            <input type="text" class="form-control" name="model" id="assetModel" placeholder="Model" value="{{$asset->model}}">
        </div>

        <div class="form-group">
            <label for="assetCost">Cost</label>
            <input type="text" class="form-control" name="cost" id="assetCost" placeholder="Cost" value="{{$asset->cost}}">
        </div>

        <div class="form-group">
            <label for="assetDescription">Description</label>

            <textarea class="form-control" name="description" rows="4">{{$asset->description}}</textarea>

        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="in_inventory"
                checked="{{($asset->in_inventory) ? 'true' : 'false'}}">In Inventory
            </label>
       </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        {{link_to(URL::previous(),'Cancel', ['class' => 'btn btn-warning'])}}
    </form>

</div>

<div class="container" style="margin-top: 30px">
    {{Form::open([
        'route' => ['inventory.update', $asset->id],
        'files'=> true,
        'method' => 'patch'])}}
        <input name="file" type="file">
        <button class="btn btn-primary">Submit</button>
    </form>

    <div class="row">

    </div>

    <div class="row">


    </div>
</div>

@endsection
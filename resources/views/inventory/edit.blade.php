@extends('layouts.inventory')

@section('content')
<div class="container">


    <form action="" method="POST" role="form">
        <legend>Asset Edit</legend>

        <div class="form-group">
            <label for="assetName">Name</label>
            <input type="text" class="form-control" id="assetName" placeholder="Input field" value="{{$asset->name}}">
        </div>

        <div class="form-group">
            <label for="assetMake">Make</label>
            <input type="text" class="form-control" id="assetMake" placeholder="Manufacturer" value="{{$asset->make}}">
        </div>

        <div class="form-group">
            <label for="assetModel">Model</label>
            <input type="text" class="form-control" id="assetModel" placeholder="Model" value="{{$asset->model}}">
        </div>

        <div class="form-group">
            <label for="assetCost">Cost</label>
            <input type="text" class="form-control" id="assetCost" placeholder="Cost" value="{{$asset->cost}}">
        </div>

        <div class="form-group">
            <label for="assetDescription">Description</label>

            <textarea class="form-control" rows="4">{{$asset->description}}</textarea>

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

    <p>
        <pre>
            {{var_dump($asset)}}
        </pre>
    </p>

</div>

<div class="container">

    <form action="">
        <input type="file">
    </form>

    <div class="row">

    </div>
    <div class="row">


    </div>
</div>
@endsection
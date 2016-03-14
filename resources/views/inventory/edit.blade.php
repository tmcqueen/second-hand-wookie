@extends('layouts.inventory')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="default-image">
                @if (! is_null($asset->defaultImage))
                <img src="{{$asset->defaultImage->getThumbnailUrl(400,400)}}" alt="">
                @else
                <img src="http://lorempixel.com/404/404/cats/No%20Image%20Found%20Have%20A%20Cat%20Instead/" alt="">
                @endif
            </div>
        </div>

        <div class="col-md-6">
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
    </div>
</div>


<div class="container" style="margin-top: 30px">

    <div class="row">

        {{Form::open([
            'route' => ['inventory.update', $asset->id],
            'files'=> true,
            'method' => 'patch'])}}
            <div class="form-group">
                <label for="inputFile"></label>
                <input name="file" type="file" id="inputFile">
            </div>
            <button class="btn btn-primary">Attach</button>
        </form>

    </div>

    <div class="row">
    {{Form::open([
        'route' => ['inventory.update', $asset->id],
        'files'=> true,
        'method' => 'patch'])}}
        <input type="hidden" name="documents" value="true">
        @forelse($asset->documents as $document)
        @include('inventory.partials.attachment')
        @empty
        <h3>No Documents to show</h3>
        @endforelse
    </div>

    <button class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
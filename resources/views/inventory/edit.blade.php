@extends('layouts.inventory')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-md-8 col-md-offset-2 asset-info">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{link_to_route('inventory.show', $asset->name, ['asset' => $asset->tag])}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if(!! $header_img = $asset->getMedia('images')->first())
                            <img src="{{$header_img->getUrl()}}"
                                 alt="$asset->name"
                                 class="img-responsive">
                            @else
                            <img src="http://lorempixel.com/1024/768/cats"
                                 alt="{{$asset->name}}"
                                 class="img-responsive">
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{Form::open([
                                'route' => ['inventory.update', $asset->tag],
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


                </div>

                @include('partials.gallery', [
                    'asset' => $asset,
                    'collection' => 'images',
                    'type' => 'Images',
                    'gallery' => 'data-gallery',
                ])

                @include('partials.gallery', [
                    'asset' => $asset,
                    'collection' => 'documents',
                    'type' => 'Documents',
                ])

                <div class="panel-heading">
                    <h4>Attach Files</h4>
                </div>
                <div class="panel-body">

                @include('partials.dropzone', [
                    'target' => route('inventory.update', $asset->tag)
                ])

                </div>
                <div class="panel-footer"></div>
            </div>




        </div>
    </div>
<!--</div>-->
@include('partials.blueimp')
@endsection
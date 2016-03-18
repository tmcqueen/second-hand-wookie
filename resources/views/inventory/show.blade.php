@extends('layouts.inventory')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 asset-info">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$asset->name}}</h3>
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
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$asset->name}}</td>
                                </tr>
                                <tr>
                                    <th>Make</th>
                                    <td>{{$asset->make}}</td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td>{{$asset->model}}</td>
                                </tr>
                                <tr>
                                    <th>Aquired On</th>
                                    <td>{{$asset->created_at->format('Y-m-d')}}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{$asset->updated_at->format('Y-m-d')}}</td>
                                </tr>
                            </table>
                            @if(Auth::check())
                            {{link_to_route('inventory.edit', 'Edit', ['asset' => $asset->tag], ['class' => 'btn btn-lg btn-primary'])}}
                            @endif
                        </div>
                    </div>
                </div>

                @include('partials.gallery', [
                    'asset' => $asset,
                    'collection' => 'images',
                    'type' => 'Images',
                ])

                @include('partials.gallery', [
                    'asset' => $asset,
                    'collection' => 'documents',
                    'type' => 'Documents',
                ])

                <div class="panel-footer"></div>
            </div>




        </div>
    </div>
</div>
@include('partials.blueimp')
@endsection
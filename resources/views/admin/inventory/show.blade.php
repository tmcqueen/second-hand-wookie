@extends('admin.layouts.master')

@push('style-after')
<style>
    .asset-info {
        padding-top: 50px;
    }

   .button-remove {
        position:absolute;
        left: 20px;
        top: 5px;
    }

    .button-default {
        position:absolute;
        color: chartreuse;
        top: 5px;
        right: 25px;
    }

    .img-container {
        border: solid 1px red;
        min-height: 160px;
    }
</style>
@endpush



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

                <div class="panel-heading">
                    <h4>Attach Files</h4>
                </div>
                <div class="panel-body">

                @include('partials.dropzone', [
                    'target' => route('admin.inventory.update', $asset->tag)
                ])

                </div>
                <div class="panel-footer"></div>
            </div>




        </div>
    </div>
</div>
@include('partials.blueimp')
@endsection
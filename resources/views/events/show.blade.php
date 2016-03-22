@extends('layouts.home')

@section('title', 'Foomatic|Events')

@push('styles-after')
<link rel="stylesheet" href="/css/leaflet.css">
<!--<link rel="stylesheet" href="/css/l.geosearch.css">-->
<style>

    #map {
        height: 400px;
    }


</style>
@endpush

@push('scripts-after')

<script src="/js/vue.min.js"></script>
<script src="/js/leaflet.js"></script>
<script>
    var osm_tile_url = "http://{s}.tile.osm.org/{z}/{x}/{y}.png";

    new Vue({
        el: '#app',
        data: {
            map: L.map('map'),
            location: [{{$event->latitude}}, {{$event->longitude}}],
        },
        ready: function() {
            this.map.setView(this.location, 16);
            L.tileLayer(osm_tile_url).addTo(this.map);
            L.marker(this.location).addTo(this.map);
        }
    })

</script>
@endpush

@section('content')
<div class="buffer"></div>
<div class="container-fluid">

    <row>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-header"></div>
            <div class="panel-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Event Title:</td>
                            <td>{{$event->title}}</td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td>{{$event->location}}</td>
                        </tr>
                        <tr>
                            <td>Start Time:</td>
                            <td>{{$event->start}}</td>
                        </tr>
                        <tr>
                            <td>EndStart Time:</td>
                            <td>{{$event->end}}</td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>{{$event->description}}</td>
                        </tr>
                        <tr>
                            <td>Created On:</td>
                            <td>{{$event->created_at->toCookieString()}}</td>
                        </tr>
                        <tr>
                            <td>Last Updated On:</td>
                            <td>{{$event->updated_at->toCookieString()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-body" id="app">
                <div class="row">

                <div id="map"></div>

                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </row>


</div>

@endsection


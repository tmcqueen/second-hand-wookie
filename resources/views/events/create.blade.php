@extends('layouts.home')

@section('title', 'Foomatic|Events')

@section('styles-after')
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="/css/leaflet.css">
<style>

    #map {
        min-height: 200px;
    }

    .map-row {
        margin-top: 20px;
        margin-bottom: 20px;
    }


</style>
@endsection

@section('scripts-after')
<script src="/js/vue.min.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/leaflet.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/bootstrap-datetimepicker.js"></script>
<script>

    'use strict'

    $(function() {
        $('#datetimepickerStart').datetimepicker();
        $('#datetimepickerEnd').datetimepicker();
    });

    var osm_api_url = "http://nominatim.openstreetmap.org/search";
    var osm_tile_url = "http://{s}.tile.osm.org/{z}/{x}/{y}.png";

    new Vue({
        el: '#app',
        data: {
            title: '',
            slug: '',
            allday: false,
            map: L.map('map'),
            address: '',
            address_details: '',
            address_list: '',
            marker: null,
            latitude: '',
            longitude: ''
        },
        methods: {
            slugify: function () {
                //var text = this.title.trim();
                this.slug = this.title
                    .replace(/[^a-z0-9-]/gi,'-')
                    .replace(/-+/g, '_')
                    .replace(/^-|-$/g, '')
                    .toLowerCase();
            },
            lookupAddress: function() {
                var xhr = new XMLHttpRequest();
                var self = this;
                console.log(self.address);
                var request = osm_api_url + '?q=' + this.address + '&format=json';
                console.log(request);
                xhr.open('GET', request);
                xhr.onload = function() {
                    self.address_list = JSON.parse(xhr.responseText);
                    console.log(self.address_list);
                }
                xhr.send();
            },
            display: function(address) {
                this.address_details = address;
                this.address = address.display_name;
                this.latitude = address.lat;
                this.longitude = address.lon;
                var latlon = [address.lat, address.lon];
                this.map.setView(latlon, 14);
                if (this.marker == null) {
                    this.marker = L.marker(latlon).addTo(this.map);
                } else {
                    this.marker.setLatLng(L.latLng(address.lat, address.lon)).update();
                }
            }
        },
        ready: function() {
            this.map.setView([32.3718829, -86.3150959], 16);
            L.tileLayer(osm_tile_url).addTo(this.map);
        }
    });

</script>

@endsection

@section('content')
<div class="buffer"></div>
<div class="container-fluid">

    <div class="row" id="app">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Create a new Event</div>
                <div class="panel-body">

                    <form action="/events" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="inputTitle">Title of the Event</label>
                            <input v-model="title" v-on:keyup="slugify" type="text" name="title" class="form-control" id="inputTitle" placeholder="Event Title">
                        </div>
                        <div class="form-group">
                            <label for="inputSlug">Event URL</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="url-prefix">https://foomatic.org/events/</span>
                                <input v-model="slug" type="text" name="slug" class="form-control" id="inputSlug" aria-describedby="url-prefix" placeholder="Event URL">
                            </div>
                        </div>

                        <input type="hidden" name="latitude" v-model="latitude">
                        <input type="hidden" name="longitude" v-model="longitude">

                        <div class="form-group">
                                <label for="inputLocation">Location</label>
                                <input type="text" name="location" id="inputLocation" class="form-control" v-model="address">
                        </div>
                        <a v-on:click="lookupAddress" class="btn btn-md btn-primary">Look up</a>


                        <div class="row map-row">
                            <div class="col-md-6">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li v-on:click="display(address)" class="list-group-item" v-for="address in address_list">
                                        @{{address.display_name}}
                                    </li>
                                </ul>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputStartDateTime">Start Time</label>
                                    <div class='input-group date' id='datetimepickerStart'>
                                        <input type='text' class="form-control"
                                            id="inputStartDateTime" name="start"
                                            placeholder="" value="{{$start}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEndDateTime">End Time</label>
                                    <div class='input-group date' id='datetimepickerEnd'>
                                        <input type='text' class="form-control" v-bind:disabled="allday"
                                            id="inputEndDateTime" name="end"
                                            placeholder="" value="{{$end}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox">
                            <label>
                            <input v-model="allday" type="checkbox" name="allday"> All Day Event
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea name="description" id="inputDescription" rows="5" class="form-control"></textarea>
                        </div>


                        <button type="submit" class="btn btn-large btn-primary">Submit</button>
                        <button type="reset" class="btn btn-large btn-default">Cancel</button>


                    </form>

                </div>
                <div class="panel-footer"></div>
            </div>




        </div>

    </div>

</div>

@endsection
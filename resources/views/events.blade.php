@extends('layouts.events')

@section('content')

<div class="container" style="padding-top: 50px;">
    <h1>{{$uri}}</h1>
    <hr>
    <div id="calendar"></div>
</div>

@endsection

@push('styles-before')

    <link rel="stylesheet" type="text/css" href="/css/events.css">

@endpush

@push('scripts-before')
    <script src="/js/jquery.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/fullcalendar.js"></script>
@endpush

@push('scripts-after')
    <script>

        $(document).ready(function(){
           $('#calendar').fullCalendar({
               events: [
                   {
                       title: 'Event1',
                       start: '2016-03-09T09:00:00',
                       end: '2016-03-09T10:00:00',
                   }
               ]
           });
        });


    </script>

@endpush
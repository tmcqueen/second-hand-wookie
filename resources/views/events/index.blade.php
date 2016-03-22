@extends('layouts.home')

@section('title', 'Foomatic|Events')

@section('content')

<div class="container" style="padding-top: 50px;">
    <h1>Events</h1>
    <hr>
    <div id="calendar"></div>
</div>

@endsection

@push('styles-after')

    <link rel="stylesheet" href="/css/events.css">
    <link rel="stylesheet" href="/css/sweetalert.css">

@endpush

@push('scripts-after')
    <!--<script src="/js/jquery.js"></script>-->
    <script src="/js/moment.js"></script>
    <script src="/js/fullcalendar.js"></script>
    <script src="/js/sweetalert.min.js"></script>
@endpush

@push('scripts-after')
    <script>

        $(document).ready(function(){
           $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventLimit: true, // allow "more" link when too many events
                events: '/events',
                dayClick: function(date, jsEvent, view) {
                    console.log(date.toString());

                    if (view.name != 'month')
                        return;

                    if (view.name == 'month') {
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                        $('#calender').fullCalendar('gotoDate', date);
                    }

                },
                eventMouseover: function(calEvent, jsEvent, view) {
                    $('#calendar').css('cursor', 'pointer');
                },
                eventMouseout: function(calEvent, jsEvent, view) {
                    $('#calendar').css('cursor', 'default');
                },
                eventClick: function(calEvent, jsEvent, view) {
                    console.log(calEvent);
                    swal({
                        title: calEvent.title,
                        text:
                        "Starts at " + calEvent.start.calendar() + ". Do you want to go to the event page?",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    },
                    function() {
                        var url = "/events/"+calEvent.slug;
                        console.log(url);
                        window.location.href = url;
                    });
                }
           });
        });


    </script>

@endpush
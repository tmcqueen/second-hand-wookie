@extends('layouts.common')

@push('scripts-after')

<script src="/js/vue.min.js"></script>
<script>

    new Vue({

        el: '#app',
        data: {
            section: '{{$section}}',
        }
    })



</script>

@endpush

@section('content')


<div class="container-fluid" id="app">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="page-header">
                <h2>{{$user->name}} <small>Settings</small></h2>
            </div>
            <nav class="navbar navbar-default">
                <div class="container">
                    {!!$menu!!}
                </div>
            </nav>
            <ul class="nav nav-tabs">
                <li role="presentation" v-bind:class="[section == 'basic' ? 'active' : '']">
                    {{link_to_route('me.settings', 'Basic', ['section' => 'basic'])}}
                </li>
                <li role="presentation" v-bind:class="[section == 'password' ? 'active' : '']">
                    {{link_to_route('me.settings', 'Password', ['section' => 'password'])}}
                </li>
                <li role="presentation" v-bind:class="[section == 'avatar' ? 'active' : '']">
                    {{link_to_route('me.settings', 'Profile Photo', ['section' => 'avatar'])}}
                </li>
            </ul>

            @if($section == 'basic')
            @include('settings.partials.basic')
            @endif
            @if($section == 'password')
            @include('settings.partials.password')
            @endif
            @if($section == 'avatar')
            @include('settings.partials.avatar', ['target' => '/me/settings', 'imageType' => 'profile photo'])
            @endif

        </div>
    </div>


</div>

@endsection
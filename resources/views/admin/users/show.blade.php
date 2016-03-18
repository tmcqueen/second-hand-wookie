@extends('admin.layouts.master')


@push('style-after')
<style>
    .user-info {
        padding-top: 50px;
    }
</style>
@endpush

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 user-info">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$user->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3" align="center">
                                <img src="http://lorempixel.com/300/300/people" alt="{{$user->name}}" class="img-circle img-responsive">
                            </div>
                            <div class="col-md-9">
                                <table class="table table-user-info">
                                    <tr>
                                        <td>Username:</td>
                                        <td>{{$user->username}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Joined:</td>
                                        <td>{{$user->created_at->subDays(24)->diffForHumans()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{$user->address1}}<br>
                                            {{$user->address2}}<br>
                                            {{$user->city}}, {{$user->state}}<br>
                                            {{$user->zip}}<br>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Roles:</td>
                                        <td>
                                            <ul class="list-group">
                                                @foreach ($user->roles as $role)
                                                <li class="list-group-item">
                                                    {{$role->name}}
                                                    <span class="pull-right">
                                                        <a href="#" class="btn btn-xs btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </span>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <select name="" id="" class="form-control">
                                                @foreach(\Spatie\Permission\Models\Role::all()->sortBy('name') as $role)
                                                <option>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="panel-footer" style="height: 50px;">
                        <span class="pull-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-ban"></i>
                            </a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
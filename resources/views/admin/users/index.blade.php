@extends('admin.layouts.master')


@section('content')
<div class="container">

    <div class="row" style="padding-top: 50px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <th>{{$user->name}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{link_to_route('admin.users.show', 'Edit', ['id' => $user->username], ['class' => 'btn btn-sm btn-primary'])}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
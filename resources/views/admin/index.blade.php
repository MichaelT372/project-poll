@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <strong>Users:</strong> {{ $userCount }} <a href="{{ url('/admin/users') }}">Manage Users</a>
                    <br>
                    <strong>Polls:</strong> {{ $pollCount }} <a href="{{ url('/admin/polls') }}">Manage Polls</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

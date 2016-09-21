@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard - Manage User</div>

                <div class="panel-body">
                    {{ $user->name }}
                    <br>
                    {{ $user->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

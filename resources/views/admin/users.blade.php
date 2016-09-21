@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard - Manage Users</div>

                <div class="panel-body">
                    <ul>
                        @foreach($users as $user)
                            <li><a href="{{ url('/admin/user/' . $user->id) }}">{{ $user->name }}</a></li>
                        @endforeach
                    </ul>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

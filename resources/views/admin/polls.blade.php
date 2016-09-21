@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard - Manage Polls</div>

                <div class="panel-body">
                    <ul>
                        @foreach($polls as $poll)
                            <li><a href="{{ url('/admin/poll/' . $poll->slug) }}">{{ $poll->title }}</a></li>
                        @endforeach
                    </ul>

                    {{ $polls->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

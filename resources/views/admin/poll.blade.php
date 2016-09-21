@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard - Manage Poll</div>

                <div class="panel-body">
                    {{ $poll->title }}
                    @foreach($poll->options as $option)
                        <br>
                        {{ $option->name }} {{ $option->votes }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    			<div class="panel-heading">
    		      	<h1 class="panel-title">{{ $poll->title }}</h1>
    		    </div>
    		    <div class="panel-body">
					@foreach ($poll->options as $option)
						{{ $option->name }}
                        <br>
                        Votes: {{ $option->votes }}
                        <br>
					@endforeach
    		    </div>
    	  	</div>
        </div>
    </div>
</div>

@endsection

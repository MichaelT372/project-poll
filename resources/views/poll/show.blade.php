@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
		      	<h1 class="panel-title">{{ $poll->title }}</h1>
		    </div>
		    <div class="panel-body">
				@include('poll.forms.vote')
		    </div>
	  	</div>

	</div>
</div>

@endsection

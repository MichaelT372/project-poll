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
					@if($poll->multiple_choice)
						<p class="small">This is a multiple choice poll. Select as many answers as you like.</p>
					@endif

					@include('poll.forms.vote')

					@if($poll->ip_checking)
						<p class="small">This poll has duplicate IP checking. You can only vote once.</p>
					@endif
			    </div>
		  	</div>
		</div>
	</div>
</div>

@endsection

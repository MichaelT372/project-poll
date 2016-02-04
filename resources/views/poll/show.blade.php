@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Poll: {{ $poll->title }}</h1>

		<ul>
			@foreach ($poll->options as $option)
				<li>Choice: {{ $option->name }} Votes: {{ $option->votes }}</li>
				<form method="POST" action="/poll/{{ $option->poll_id }}/{{ $option->id }}">
					{!! csrf_field() !!}
					<button type="submit">Vote</button>
				</form>
			@endforeach
		</ul>
	</div>
</div>




@stop
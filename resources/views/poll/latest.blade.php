@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6">

		<h1>Latest Polls</h1>

		<hr>

		@foreach ($polls as $poll)
			<h4><a href="{{ url('/poll/' . $poll->slug) }}">{{ $poll->title }}</a></h4>
		@endforeach

	</div>
</div>

@endsection

@extends('layout')

@section('content')

	<h1>Create A Poll</h1>

	<hr>
	

	<form method="POST" action="/poll">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif			

		@include('poll.form')
	</form>


@stop
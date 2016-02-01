@extends('layout')

@section('content')

	<h1>Create A Poll</h1>

	<hr>
	

	<form method="POST" action="/polls">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif			

		@include('polls.form')
	</form>


@stop
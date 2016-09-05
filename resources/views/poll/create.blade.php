@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6">

		<h1>Create A Poll</h1>

		<hr>

		@include('poll.forms.make')

	</div>
</div>

@endsection

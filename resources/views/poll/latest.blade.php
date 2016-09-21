@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Latest Polls</div>

				<div class="panel-body">
					@foreach ($polls as $poll)
						<h5><a href="{{ url('/poll/' . $poll->slug) }}">{{ $poll->title }}</a></h5>
					@endforeach

					{{ $polls->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

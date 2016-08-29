@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
		      	<h1 class="panel-title">{{ $poll->title }}</h1>
		    </div>
		    <div class="panel-body">
				<form class="form-horizontal" method="POST" action="/poll/vote">
					{!! csrf_field() !!}
					@foreach ($poll->options as $option)
						<div class="form-group">
							<div class="col-md-12">
								<div class="radio">
									<label>
										<input type="radio" name="option" value="{{ $option->id }}" required>
										{{ $option->name }}
									</label>
								</div>
							</div>
						</div>
					@endforeach
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Vote</button>
						</div>
					</div>
				</form>
		    </div>
	  	</div>

	</div>
</div>

@endsection

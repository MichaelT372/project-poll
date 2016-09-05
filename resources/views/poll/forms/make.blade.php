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

	{{ csrf_field() }}

	<div class="form-group">
		<label for="stitle">Title:</label>
		<input type="text" name="title" class="form-control" value="" required>
	</div>

	<div class="form-group">
		<label for="option1">Option 1:</label>
		<input type="text" name="options[]" class="form-control" value="" required>
	</div>

	<div class="form-group">
		<label for="option2">Option 2:</label>
		<input type="text" name="options[]" class="form-control" value="" required>
	</div>

	<div class="more-options"></div>

	<div class="form-group">
		<button id="add" class="btn btn-primary">Add Option</button>
		<button id="del" class="btn btn-primary">Delete Option</button>
	</div>


	<hr>

	{!! app('captcha')->display(); !!}

	<br>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Poll</button>
	</div>
</form>


@section('js')
<script type="text/javascript">
	var options = 2;

	$('#add').on('click', function(e){
		e.preventDefault();
		options = options + 1;
		var optionHTML = '<div class="form-group extra-option"><label for="option' + options +'">Option ' + options + ':</label><input type="text" name="options[]" class="form-control" value="" required></div>';
		$('.more-options').append(optionHTML);
	});

	$('#del').on('click', function(e){
		e.preventDefault();
		options = (options > 2) ? options - 1 : 2;
		$('.extra-option').last().remove();
	});
</script>
@endsection

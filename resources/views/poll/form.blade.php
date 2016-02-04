<div class="row">

	<div class="col-md-6">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="stitle">Title:</label>
			<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
		</div>

		<div class="form-group">
			<label for="option1">Option1:</label>
			<input type="text" name="option1" id="option1" class="form-control" value="{{ old('option1') }}" required>
		</div>

		<div class="form-group">
			<label for="option2">Option2:</label>
			<input type="text" name="option2" id="option2" class="form-control" value="{{ old('option2') }}" required>
		</div>

	<div class="col-md-12">
		<hr>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create Poll</button>
		</div>
	</div>


</div>
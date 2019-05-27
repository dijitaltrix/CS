@extends('app/layouts/detail')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('students') }}">Students</a></li>
		<li class="breadcrumb-item"><a href="{{ route('students.view', $student->id) }}">{{ $student->name }}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit</li>
	</ol>
</nav>
<br>
<h1>Edit Student</h1>
<form method="post" action="{{ route('students.edit', $student->id) }}">
	@csrf
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="name">Full name</label>
			@if ($errors->has('name'))
			<span class="error">{{ $errors->first('name') }}</span>
			@endif
			<input name="name" value="{{ request()->old('name') ?? $student->name }}" type="text" class="form-control" id="name" placeholder="Full name...">
	    </div>
	</div>
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="date_of_birth">Date of birth</label>
			@if ($errors->has('date_of_birth'))
			<span class="error">{{ $errors->first('date_of_birth') }}</span>
			@endif
			<input name="date_of_birth" value="{{ request()->old('date_of_birth') ?? $student->date_of_birth->format('d M Y') }}" type="text" class="form-control" id="date_of_birth" placeholder="YYYY-MM-DD">
	    </div>
	</div>
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="skills">Skills</label>
			<small class="form-text text-muted">Hold down CTRL or CMD to select multiple items</small>
			
			<select name="skills[]" multiple="multiple" class="form-control" id="skills" size="10">
			@foreach ($skills as $skill)
				<option value="{{ $skill->id }}" @if (in_array($skill->id, $student->skills->pluck('id')->toArray())) selected="selected" @endif>{{ $skill->name }}</option>
			@endforeach
			</select>
	    </div>
	</div>
	<hr>
	<div class="form-row">
		<div class="col-sm-3">
			<button type="submit" class="btn btn-sm btn-primary">Update</button>
		</div>
	</div>
</form>
@endsection

@section('style')
<style>

</style>
@endsection
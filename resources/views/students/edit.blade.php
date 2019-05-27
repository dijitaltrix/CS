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
			<label class="sr-only" for="name">Full name</label>
			@if ($errors->has('name'))
			<span class="error">{{ $errors->first('name') }}</span>
			@endif
			<input name="name" value="{{ request()->old('name') ?? $student->name }}" type="text" class="form-control" id="name" placeholder="Full name...">
	    </div>
	</div>
	<div class="form-row">
	    <div class="col-sm-6">
			<label class="sr-only" for="email">Email address</label>
			@if ($errors->has('email'))
			<span class="error">{{ $errors->first('email') }}</span>
			@endif
			<input name="email" value="{{ request()->old('email') ?? $student->email }}" type="text" class="form-control" id="email" placeholder="name@somewhere.com">
	    </div>
	</div>
	<div class="form-row">
		<div class="col-sm-3">
			<button type="submit" class="btn btn-sm btn-primary">Create</button>
		</div>
	</div>
</form>
@endsection

@section('style')
<style>

</style>
@endsection
@extends('app/layouts/detail')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('customers') }}">Customers</a></li>
		<li class="breadcrumb-item"><a href="{{ route('customers.view', $customer->id) }}">{{ $customer->name }}</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit</li>
	</ol>
</nav>
<br>
<h1>Edit Customer</h1>
<form method="post" action="{{ route('customers.edit', $customer->id) }}">
	@csrf
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="name">Full name</label>
			@if ($errors->has('name'))
			<span class="error">{{ $errors->first('name') }}</span>
			@endif
			<input name="name" value="{{ request()->old('name') ?? $customer->name }}" type="text" class="form-control" id="name" placeholder="Full name...">
	    </div>
	</div>
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="email">Email address</label>
			@if ($errors->has('email'))
			<span class="error">{{ $errors->first('email') }}</span>
			@endif
			<input name="email" value="{{ request()->old('email') ?? $customer->email }}" type="text" class="form-control" id="email" placeholder="name@somewhere.com">
	    </div>
	</div>
	<div class="form-row">
	    <div class="col-sm-6">
			<label for="students">Students</label>
			<small class="form-text text-muted">Hold down CTRL or CMD to select multiple items</small>
			
			@if ($errors->has('email'))
			<span class="error">{{ $errors->first('email') }}</span>
			@endif
			<select name="students[]" multiple="multiple" class="form-control" id="students" size="10">
			@foreach ($students as $student)
				<option value="{{ $student->id }}" @if (in_array($student->id, $customer->students->pluck('id')->toArray())) selected="selected" @endif>{{ $student->name }}</option>
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
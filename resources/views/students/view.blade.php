@extends('app/layouts/detail')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('customers') }}">Students</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $student->name }}</li>
	</ol>
</nav>
<br>
<h1>Student details</h1>
<div class="student student-details">
	<div class="row">
		<div class="col col-xs-12">
			<a class="btn btn-sm btn-success" href="/admin/students/{{ $student->id }}/edit">Edit</a>
		</div>
	</div>
	<br>
	<div class="row">
		{{-- Using readonly form input looks a bit weird -- wouldn't suggest this in reality! --}}
		<div class="col col-xs-12 col-md-6">
			<label>Name</label>
			<input class="form-control" value="{{ $student->name }}" readonly>
		</div>
		<div class="col col-xs-12 col-md-6">
			<label>Date of birth</label>
			<input class="form-control" value="{{ $student->date_of_birth->format('d M Y') }}" readonly>
		</div>
	</div>
	<br>
	<h3>Skills</h3>
	<hr>
	<div class="row">
		@foreach ($student->skills as $skill)
			@include('students/includes/skill-card', [
				'skill' => $skill,
			])
		@endforeach
		@if ( ! count($student->skills))
		<div class="col col-12">
			<p>Nothing to show</p>
		</div>
		@endif
	</div>
</div>
@endsection

@section('style')
<style>

</style>
@endsection
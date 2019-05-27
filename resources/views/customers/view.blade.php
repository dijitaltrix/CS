@extends('app/layouts/detail')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('customers') }}">Customers</a></li>
		<li class="breadcrumb-item active" aria-current="page">Create</li>
	</ol>
</nav>
<br>
<h1>Customer details</h1>
<div class="customer customer-details">
	<div class="row">
		<div class="col col-xs-12">
			<a class="btn btn-sm btn-success" href="/admin/customers/{{ $customer->id }}/edit">Edit</a>
		</div>
	</div>
	<br>
	<div class="row">
		{{-- Using readonly form input looks a bit weird -- wouldn't suggest this in reality! --}}
		<div class="col col-xs-12 col-md-6">
			<label>Name</label>
			<input class="form-control" value="{{ $customer->name }}" readonly>
		</div>
		<div class="col col-xs-12 col-md-6">
			<label>Email address</label>
			<input class="form-control" value="{{ $customer->email }}" readonly>
		</div>
	</div>
	<br>
	<h3>Students</h3>
	<hr>
	<div class="row">
		@foreach ($customer->students as $student)
			@include('app/includes/contact-card', [
				'contact' => $student,
				'route' => route('students.edit', $student->id)
			])
		@endforeach
		@if ( ! count($customer->students))
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
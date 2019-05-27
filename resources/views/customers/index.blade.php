@extends('app/layouts/index')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Customers</li>
	</ol>
</nav>
<h1>Customers</h1>
<div class="well well-sm">
	<form method="get" action="{{ route('customers') }}">
		<div class="form-row align-items-center">
		    <div class="col-sm-6">
				<label class="sr-only" for="search">Name</label>
				<input name="search" value="{{ request()->input('search') }}" type="text" class="form-control" id="search" placeholder="Search...">
		    </div>
			<div class="col-sm-3">
				<button type="submit" class="btn btn-sm btn-primary">Search</button>
				<a href="{{ route('customers.create') }}" class="btn btn-sm btn-success">New Customer</a>
			</div>
		</div>
	</form>
</div>
<br>
<div class="customers customers-index">
	@if ($customers->total())
	<span class="meta customers-meta">Showing {{ $customers->total() }} customers</span>
	<hr>
	<div class="row">
	@foreach ($customers as $customer)
		@include('app/includes/contact-card', [
			'contact' => $customer,
			'route' => route('customers.edit', $customer->id)
		])
	@endforeach
	</div>
	<hr>
	<div class="pagination">
		{{ $customers->links() }}
	</div>
	@else
	<span class="meta customers-meta">There are no customers to display</span>
	@endif
</div>
@endsection

@section('style')
<style>

</style>
@endsection
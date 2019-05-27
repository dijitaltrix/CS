@extends('app/layouts/base')
	
@section('body')
<div class="container">
	<main id="main">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Home</li>
			</ol>
		</nav>
		<h1>Dashboard</h1>
		
		<div class="row">
			<div class="col-3">
				
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title">Customers</h5>
						<h6 class="card-subtitle mb-2 text-muted">View the customers list</h6>
						<p class="card-text"></p>
						<a href="{{ route('customers') }}" class="card-link">View customers</a>
					</div>
				</div>
				
			</div>
			<div class="col-3">

				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title">Students</h5>
						<h6 class="card-subtitle mb-2 text-muted">View the students list</h6>
						<p class="card-text"></p>
						<a href="{{ route('students') }}" class="card-link">View students</a>
					</div>
				</div>

			</div>
		</div>

	</main>
</div>
@endsection

@section('style')
<style>

</style>
@endsection
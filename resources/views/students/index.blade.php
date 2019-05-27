@extends('app/layouts/index')
	
@section('main')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Students</li>
	</ol>
</nav>
<h1>Students</h1>
<div class="well well-sm">
	<form method="get" action="{{ route('students') }}">
		<div class="form-row align-items-center">
		    <div class="col-sm-6">
				<label class="sr-only" for="search">Name</label>
				<input name="search" value="{{ request()->input('search') }}" type="text" class="form-control" id="search" placeholder="Search...">
		    </div>
			<div class="col-sm-3">
				<button type="submit" class="btn btn-sm btn-primary">Search</button>
				<a href="{{ route('students.create') }}" class="btn btn-sm btn-success">New Student</a>
			</div>
		</div>
	</form>
</div>
<br>
<div class="students students-index">
	@if ($students->total())
	<span class="meta students-meta">Showing {{ $students->total() }} students</span>
	<hr>
	<div class="row">
	@foreach ($students as $student)
		@include('app/includes/contact-card', [
			'contact' => $student,
			'route' => route('students.view', $student->id)
		])
	@endforeach
	</div>
	<hr>
	<div class="pagination">
		{{ $students->links() }}
	</div>
	@else
	<span class="meta students-meta">There are no students to display</span>
	@endif
</div>
@endsection

@section('style')
<style>

</style>
@endsection
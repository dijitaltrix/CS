@extends('app/layouts/base')
	
@section('body')
<div class="container">
	<main id="main">
		@yield('main')
	</main>
</div>
@endsection

@section('style')
	@yield('style')
@endsection

@section('script')
	@yield('script')
@endsection
@extends('app/layouts/base')
	
@section('body')
<div class="container">
	<div id="main" class="col-xs-12 col-sm-8 col-md-9">
		@yield('main')
	</div>
	<aside id="aside" class="col-xs-12 col-sm-4 col-md-3">
		@yield('aside')
	</aside>
</div>	
@endsection

@section('style')
	@yield('style')
@endsection

@section('script')
	@yield('script')
@endsection
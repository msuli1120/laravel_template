<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'XingApps') }}</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@if(Request::is('password/reset'))
		<script src="https://www.google.com/recaptcha/api.js?" async defer></script>
	@endif
</head>
<body>
<div id="app">

	@include('layouts.top-nav')
	
	@if(Session::get('success'))
		@include('message.msg')
	@endif

	@if(Session::get('warning'))
		@include('message.warn')
	@endif

	@if(Session::get('error'))
		@include('message.error')
	@endif

	<main class="py-4">
		@yield('content')
	</main>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
@yield ('scripts')

</body>
</html>

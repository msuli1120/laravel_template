@extends('layouts.app')

@section('content')
	<h2>Profile</h2>

	<p>Username: {{ auth()->user()->name }}</p>
	<p>Email: {{ auth()->user()->email }}</p>
	<p>Joined on: {{ auth()->user()->created_at }} PDT</p>
@endsection
@extends('layouts.app')

@section('content')

	<div class="uk-child-width-1-2" uk-grid id="profile-card">
		<div>
			<div class="uk-card-default uk-card-hover uk-card-body">
				<h2>Profile</h2>
				<p>Username: {{ auth()->user()->name }}</p>
				<p>Email: {{ auth()->user()->email }}</p>
				<p>Joined on: {{ auth()->user()->created_at }} PDT</p>
			</div>
		</div>
	</div>
@endsection
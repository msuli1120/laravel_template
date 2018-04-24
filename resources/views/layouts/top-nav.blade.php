<nav class="uk-navbar-container" uk-navbar="boundary-align: true; align: center; dropbar: true; dropbar-mode: push">
	<div class="uk-navbar-left">
		<ul class="uk-flex uk-navbar-nav">
			<a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'XingApps') }}</a>
			<li>
				<a class="uk-icon-link uk-hidden@s uk-flex uk-flex-middle" uk-icon="menu"></a>
				<div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify; offset: 0">
					<ul class="uk-nav uk-navbar-dropdown-nav">
						@if(Request::is('/'))
							<li class="uk-nav-header"><a href="/" style="color: deeppink;">Home</a></li>
						@else
							<li class="uk-nav-header"><a href="/">Home</a></li>
						@endif
						@auth
							@if(Request::is('projects'))
								<li class="uk-nav-header"><a href="" style="color:deeppink;">Projects</a></li>
							@else
								<li class="uk-nav-header"><a href="">Projects</a></li>
							@endif
						@endauth
						@if(Request::is('about'))
							<li class="uk-nav-header"><a href="{{ route('about') }}" style="color: deeppink;">About</a></li>
						@else
							<li class="uk-nav-header"><a href="{{ route('about') }}">About</a></li>
						@endif
						@if(Request::is('contact'))
							<li class="uk-nav-header"><a href="{{ route('contact') }}" style="color: deeppink;">Contact</a></li>
						@else
							<li class="uk-nav-header"><a href="{{ route('contact') }}">Contact</a></li>
						@endif
					</ul>
				</div>
			</li>
		</ul>
		<ul class="uk-navbar-nav uk-visible@s">
			<li>
				@if(Request::is('/'))
					<a href="/" style="color: deeppink;">Home</a>
				@else
					<a href="/">Home</a>
				@endif
			</li>
			@auth
				<li>
					@if(Request::is('projects'))
						<a href="#" style="color: deeppink;">Projects</a>
					@else
						<a href="#">Projects</a>
					@endif
				</li>
			@endauth
			<li>
				@if(Request::is('about'))
					<a href="{{ route('about') }}" style="color: deeppink;">About</a>
				@else
					<a href="{{ route('about') }}">About</a>
				@endif
			</li>
			<li>
				@if(Request::is('contact'))
					<a href="{{ route('contact') }}" style="color: deeppink;">Contact</a>
				@else
					<a href="{{ route('contact') }}">Contact</a>
				@endif
			</li>
		</ul>

	</div>

	<div class="uk-navbar-right">
		<ul class="uk-navbar-nav">
			@guest
			<li>
				<a href="{{ route('login')  }}">Login</a>
			</li>
			<li>
				<a href="{{ route('register') }}">Register</a>
			</li>
			@else
			<li>
				<a class="uk-icon-link" uk-icon="user" type="button"></a>
				<div class="uk-text-center" uk-dropdown="animation: uk-animation-slide-top-small; duration: 800">
					<ul class="uk-nav uk-dropdown-nav">
						<li class="uk-active"><a href="{{ route('profile') }}">Profile</a></li>
						<li class="uk-active"><a href="{{ route('edit.profile') }}">Edit Profile</a></li>
						<li class="uk-nav-divider"></li>
						<form id="logout-form" action="{{ url('/logout') }}" method="POST">
							{{ csrf_field() }}
							<button class="uk-button uk-button-primary uk-button-small" type="submit"><span uk-icon="sign-out"></span></button>
						</form>
					</ul>
				</div>
			</li>
			@endguest
		</ul>
	</div>

</nav>

<nav class="uk-navbar-container" uk-navbar="boundary-align: true; align: center; dropbar: true; dropbar-mode: push">
	<div class="uk-navbar-left">
		<ul class="uk-flex uk-navbar-nav">
			<a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'XingApps') }}</a>
			<li>
				<a class="uk-icon-link uk-hidden@s uk-flex uk-flex-middle" uk-icon="menu"></a>
				<div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify; offset: 0">
					<ul class="uk-nav uk-navbar-dropdown-nav">
						<li class="uk-nav-header"><a href="">Home</a></li>
						@auth
							<li class="uk-nav-header"><a href="">Projects</a></li>
						@endauth
						<li class="uk-nav-header"><a href="{{ route('about') }}">About</a></li>
						<li class="uk-nav-header"><a href="{{ route('contact') }}">Contact</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<ul class="uk-navbar-nav uk-visible@s">
			<li>
				<a href="/" class="">Home</a>
			</li>
			@auth
				<li>
					<a href="#">Projects</a>
				</li>
			@endauth
			<li>
				<a href="{{ route('about') }}">About</a>
			</li>
			<li>
				<a href="{{ route('contact') }}">Contact</a>
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

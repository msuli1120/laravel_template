@extends('layouts.app')

@section('content')

	<div class="uk-child-width-1-2" uk-grid id="register-form">
		<div>
			<div class="uk-card uk-card-hover uk-card-body">
				<form action="{{ route('register') }}" method="post" class="uk-form-stacked">
					@csrf
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Register</legend>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="name">Username</label>
								<input id="name" type="text" class="uk-input" name="name" value="{{ old('name') }}" required autofocus>
								@if ($errors->has('name'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="email">Email</label>
								<input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="password">Password</label>
								<input id="password" type="password" class="uk-input" name="password" required>
								@if ($errors->has('password'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="password-confirm">Confirm Password</label>
								<input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required>
							</div>
						</div>
						<div class="uk-margin uk-animation-toggle">
							<button type="submit" class="uk-button uk-button-primary uk-animation-scale-up">Register</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

@endsection

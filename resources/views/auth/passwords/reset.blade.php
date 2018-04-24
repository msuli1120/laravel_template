@extends('layouts.app')

@section('content')
	<div class="uk-child-width-1-2" uk-grid id="passforget-form">
		<div>
			<div class="uk-card uk-card-hover uk-card-body">
				<form method="POST" action="{{ route('password.request') }}" class="uk-form-stacked">
					@csrf
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Reset Password</legend>
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="email">Email Address</label>
								<input id="email" type="email" class="uk-input" name="email" value="{{ $email or old('email') }}" required autofocus>
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

								@if ($errors->has('password_confirmation'))
									<span class="invalid-feedback">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
								@endif
							</div>
						</div>

						<div class="uk-margin uk-animation-toggle">
							<button type="submit" class="uk-button uk-button-primary uk-animation-scale-up">Reset Password</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection

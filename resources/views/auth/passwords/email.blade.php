@extends('layouts.app')

@section('content')

	@if (session('status'))
		<div class="uk-alert-success uk-text-center" uk-alert>
			<a class="uk-alert-close" uk-close></a>
			{{ session('status') }}
		</div>
	@endif

	<div class="uk-child-width-1-2" uk-grid id="passforget-form">
		<div>
			<div class="uk-card uk-card-hover uk-card-body">
				<form method="POST" action="{{ route('password.email') }}">
				@csrf
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Reset Password</legend>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
								<input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required>
								@if ($errors->has('email'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						{!! NoCaptcha::renderJs() !!}
						{!! NoCaptcha::display(['data-theme' => 'dark']) !!}
						@if ($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
							</span>
						@endif
						<div class="uk-margin uk-animation-toggle">
							<button type="submit" class="uk-button uk-button-primary uk-animation-scale-up">Reset</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection

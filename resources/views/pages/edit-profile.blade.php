@extends('layouts.app')

@section('content')
	<div class="uk-child-width-1-2" uk-grid id="profile-card">
		<div>
			<div class="uk-card-default uk-card-hover uk-card-body">
				<form action="{{ route('update.profile') }}" method="post" class="uk-form-stacked">
					<input type="hidden" name="id" value="{{ auth()->user()->id }}">
					@csrf
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Edit Profile</legend>
						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="name">Username</label>
								<input id="name" type="text" class="uk-input" name="name" placeholder="{{ auth()->user()->name }}" required>
								@if ($errors->has('name'))
									<span class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div id="hide-pass">
							<div class="uk-margin">
								<div class="uk-form-controls">
									<label class="uk-form-label" for="password">New Password</label>
									<input id="password" type="password" class="uk-input" name="password">
									@if ($errors->has('password'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="uk-margin">
								<div class="uk-form-controls">
									<label class="uk-form-label" for="password_confirmation">Confirm Password</label>
									<input id="password-confirm" type="password" class="uk-input" name="password_confirmation">
								</div>
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-form-controls">
								<label class="uk-form-label" for="current_password">Current Password</label>
								<input id="current-password" type="password" class="uk-input" name="current_password" required>
								@if($errors->has('current_password'))
									<p class="invalid-feedback">{{$errors->first('current_password')}}</p>
								@endif
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-animation-toggle">
								<button type="submit" class="uk-button uk-button-primary uk-animation-scale-up">Update</button>
							</div>

							<p><span class="uk-link uk-margin-small-top" id="change-password" uk-tooltip="Leave new password and confirm password blank if you don't want to change password.">
								Change Password?
							</span></p>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
    document.getElementById('name').setAttribute('value', {!! json_encode(auth()->user()->name) !!});
    document.getElementById('name').addEventListener('click', function () {
			this.value = '';
    });
    document.getElementById('name').addEventListener('focusout', function () {
	    if (this.value === '' || this.value === null) {
        this.value = {!! json_encode(auth()->user()->name) !!};
	    }
    });
	</script>
@endsection
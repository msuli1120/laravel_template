<?php

	namespace App\Http\Controllers\Auth;

	use App\User;
	use Validator;
	use Carbon\Carbon;
	use Illuminate\Support\Str;
	use Illuminate\Http\Request;
	use App\Jobs\SendVerifyEmailJob;
	use Illuminate\Support\Facades\Hash;
	use App\Http\Controllers\Controller;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Foundation\Auth\RegistersUsers;

	class RegisterController extends Controller
	{

		use RegistersUsers;

		/**
		 * Where to redirect users after registration.
		 *
		 * @var string
		 */
		protected $redirectTo = '/';

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('guest');
		}

		/**
		 * Handle a registration request for the application.
		 *
		 * @param Request $request
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function register(Request $request)
		{
			$this->validator($request->all())->validate();

			event(new Registered($user = $this->create($request->all())));
			
			$request->session()->flash('success', 'Please verify your email first!');
			return view('welcome');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param  array  $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			return Validator::make($data, [
				'name' => 'required|string|max:255|min:6',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:8|confirmed',
			]);
		}

		/**
		 * Create a new user instance after a valid registration.
		 *
		 * @param  array $data
		 *
		 * @return User|\Illuminate\Database\Eloquent\Model
		 */
		protected function create(array $data)
		{
			$user = User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
				'verifyToken' => Str::random(40),
			]);

			if ($user->id === 1) {
				$user->update(['role' => 'superadmin']);
			} else {
				$user->update(['role' => 'user']);
			}

			$toUser = User::findOrFail($user->id);
			$sendVerifyEmailJob = (new SendVerifyEmailJob($toUser))->delay(Carbon::now()->addSecond(30));
			dispatch($sendVerifyEmailJob);
			return $user;
		}

		public function emailVerified($email, $verifyToken)
		{
			$user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
			if ($user) {
				User::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => 1, 'verifyToken' => null]);
				\Session::flash('success', "Your email has been verified");
				return redirect('/');
			} else {
				\Session::flash('error', 'User not found!');
				return redirect('/');
			}
		}

	}

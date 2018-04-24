<?php

namespace App\Http\Controllers;

use App\User;
use App\Rules\ValidPassword;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
	}

	public function index()
	{
		return view('pages.profile');
	}

	public function editProfile()
	{
		return view('pages.edit-profile');
	}

	public function updateProfile(Request $request)
	{
		if (empty($request->password) || empty($request->password_confirmation)) {
			$this->validate($request, [
				'current_password' => ['required', 'string', new ValidPassword],
				'id' => 'required|numeric',
				'name' => 'required|string|max:255|min:6'
			]);
			$user = User::findOrFail($request->id);
			if ($request->name === $user->name) {
				\Session::flash('warning', 'New username is same as old username!');
				return back();
			}
			if (\Hash::check($request->current_password, $user->password)) {
				$user->name = $request->name;
				$user->save();
				$request->session()->flash('success', 'Successfully updated!');
				return redirect()->back();
			}
			\Session::flash('error', 'Invalid credential');
			return back();
		}

		$this->validate($request, [
			'id' => 'required|numeric',
			'name' => 'required|string|max:255|min:6',
			'password' => 'required|string|min:8|confirmed',
		]);
		$user = User::findOrFail($request->id);
		if (\Hash::check($request->current_password, $user->password)) {
			$user->name = $request->name;
			$user->password = bcrypt($request->password);
			$user->save();
			$request->session()->flash('success', 'Successfully updated!');
			return redirect()->back();
		}
		\Session::flash('error', 'Invalid credential');
		return back();

	}
}

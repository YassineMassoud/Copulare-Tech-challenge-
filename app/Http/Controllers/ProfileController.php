<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\organizationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    function index() {
		$user_id = Auth::user()->id;
		return view('Profile', [
			'user_id' => $user_id
		]);
    }

	function checkUniqueEmail($id, $email) {
		$user = User::find($id);
		if($user->email == $email) {
			echo json_encode("unique");
		} else {
			$unique = User::where('email', $email)->get();
			if(count($unique) > 0) {
				echo json_encode("not_unique");
			} else {
				echo json_encode("unique");
			}
		}
	}

	function updateProfile(Request $request) {
		$old_data = User::find($request->input('id'));
		if($old_data->email == $request->input('email')) {
			$validate = $request->validate([
				'name' => 'required',
				'email' => 'required'
			]);
		} else {
			$validate = $request->validate([
				'name' => 'required',
				'email' => 'required|unique:users'
 			]);
		}

		if($request->hasFile('img_url')) {
			$file = $request->file('img_url');
			$imageName = time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('uploads'), $imageName);
			$logo = $imageName;
		} else {
			$logo = $old_data->img_url;
		}

		$result = User::where('id', $request->input('id'))->update([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'img_url' => $logo,
		]);

		Employee::where('email', $request->input('email'))->update([
			'first_name' => $request->input('name'),
			'email' => $request->input('email')
		]);

		organizationModel::where('org_email', $request->input('email'))->update([
			'name' => $request->input('name'),
			'org_email' => $request->input('email')
		]);

		if($result) {
			session()->flash('message', 'profile_updated');
			return Redirect::to('profile');
		} else {
			session()->flash('message', 'profile_not_updated');
			return Redirect::to('profile');
		}
	}

	function updatePassword(Request $request) {
		$validate = $request->validate([
			'password' => 'required'
		]);

		$result = User::where('id', $request->input('id'))->update([
			'password' => bcrypt($request->input('password'))
		]);

		if($result) {
			session()->flash('message', 'password_updated');
			return Redirect::to('profile');
		} else {
			session()->flash('message', 'password_not_updated');
			return Redirect::to('profile');
		}
	}
}

<?php namespace App\Http\Controllers;

use Auth;
Use Hash;
use Input;
use Redirect;

use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return view('welcome');
	}

	public function settings() {
		$is_admin = true;
		$user = Auth::user();
		return view('settings', compact('is_admin', 'user'));
	}

	public function save_settings() {
		$input = Input::all();
		$user = Auth::user();
		if( !empty( $input['email'] ) && $input['email'] !== $user->email ) {
			$user->email = $input['email'];
		}
		if( !empty( $input['pass'] ) ) {
			$user->password = Hash::make( $input['pass'] );
		}

		$saved = $user->save();

		if( $saved ) {
			return redirect('/admin/settings')->with('message', 'Updated settings');
		} else {
			return redirect('/admin/settings')->with('message', 'Failed to Update settings');
		}

	}

}

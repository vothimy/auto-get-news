<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(Request $request){
		$username = trim($request->username);
		$password = trim($request->password);

		if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('admin.news.index');
        }else{//đn sai
        	$request->session()->flash('msg','Sai username hoặc password');
        	return redirect()->route('auth.auth.login');
        }
	}
	public function logout(){
		Auth::logout();
		return redirect()->route('public.index.index');
	}
}
 
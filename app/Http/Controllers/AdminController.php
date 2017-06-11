<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function admintool(){
        return view('admin.index');
    }

    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
    	$this->validate($request,
            [
                'email'    =>  'required|email',
                'password' => 'required|max:32|min:6'
            ],
            [
                'email.required'    => 'Vui lòng nhập Email',
                'email.email'       => 'Nhập sai định dạng Email',
                'password.required' => 'Vui lòng nhập password',
                'password.max'      => 'Password không được quá 32 ký tự',
                'password.min'      => 'Password phải ít nhất 6 ký tự'
            ]
        );
    	$login = [
    		'email' => $request->email,
    		'password' => $request->password,
            'level' => 1
    	];
    	if (Auth::attempt($login)) {
    		return redirect()->route('dashboard');
    	}else{
    		return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Đăng nhập thất bại !!', 'flash_icon' => 'times']);
    	}
    }

    public function getlogout(){
        Auth::logout();
        return redirect('/');
    }
}

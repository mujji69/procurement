<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Auth;


class LogController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showform(){
        return view('auth.adminlogin');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);


    if(Auth::guard('admin')->attempt(['username'=>$request->username ,'password'=>$request->password ]))
    {

        return redirect()->intended('admin');
    }


    // return redirect()->back()->withInput($request->only('email','remember'));
    return $this->sendFailedLoginResponse($request);


    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username(){
        return 'username';
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }

}

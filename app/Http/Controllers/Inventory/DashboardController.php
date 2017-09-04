<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Validator;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth',['only'=>'index']);
    	$this->middleware('guest',['only'=>'getLogin']);
    }

    public function index(){
    	return view('inventory.dashboard.index');
    }

    public function getLogin(){
    	return view('inventory.admin.login')->with('title','Inventory Login');
    }

    public function postLogin(Request $request){
    	if(Auth::attempt([
    		'email'=>$request->email,
    		'password'=>$request->password,
    	])){
    		return redirect('admin/dashboard');
    	}
    	Auth::logout();
        return redirect('admin')
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid email/password'
        ]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin');
    }
}

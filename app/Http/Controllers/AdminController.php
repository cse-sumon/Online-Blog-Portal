<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class AdminController extends Controller
{
    public function index(){
    	$this->auth_check();
    	return view('admin.admin_login');
    }


    public function admin_login_check(Request $request){
    	$admin_email = strip_tags($request->admin_email);
    	$admin_password = strip_tags($request->admin_password);

    	$result = DB::table('tbl_admin')
    				->where('admin_email',$admin_email)
    				->where('admin_password',md5($admin_password))
    				->first();

    	if($result)
    	{	
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_name',$result->admin_name);
    		return redirect::to('/dashboard');
    	}
    	else
    	{
    		Session::put('message','Your User Id or Password Invalid.');
           return redirect::to('admin-panel');
    	
    	}			

    }


    public function auth_check(){
    	session_start();
    	$admin_id=Session::get('admin_id');
    	if($admin_id != NULL)
    	{
    		return redirect::to('/dashboard')->send();
    	}
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class SuperAdminController extends Controller
{
    public function index(){
    	$this->super_admin_auth_check();
    	$dashboard_home = view('admin.pages.dashboard_home');
    	return view('admin.admin_master')
    				->with('admin_main_content',$dashboard_home);
    }

    public function super_admin_auth_check(){
    	session_start();
    	$admin_id=Session::get('admin_id');
    	if($admin_id == NULL)
    	{
    		return redirect::to('admin-panel')->send();
    	}
    }

    public function add_category(){
    	$add_category=view('admin.pages.add_category');
    	return view('admin.admin_master')
    				->with('admin_main_content',$add_category);
    }

    public function save_category(Request $request){
    	$data=array();
    	$data['category_name']=($request->category_name);
    	$data['category_description']=($request->category_description);
    	$data['publication_status']=($request->publication_status);
    	$data['created_at']=date("Y-m-d H:i:s");
    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Category Save Auccessfully.');
    	return redirect::to('/add-category');

    }

    public function manage_category() {
        $this->super_admin_auth_check();
        $all_category = DB::table('tbl_category')
                ->select('*')
                ->get();
        $manage_category = view('admin.pages.manage_category')
                ->with('all_category', $all_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_category);
    }


    public function unpublished_category($category_id) {
        $data = array();
        $data['publication_status'] = 0;
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }

    public function published_category($category_id) {
        $data = array();
        $data['publication_status'] = 1;
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }

    public function delete_category($category_id) {
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->delete();
        return Redirect::to('/manage-category');
    }

    public function edit_category($category_id) {
        $category_info_by_id = DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->first();
        $edit_category = view('admin.pages.edit_category')
                ->with('category_info', $category_info_by_id);
        return view('admin.admin_master')
                        ->with('admin_main_content', $edit_category);
    }

    public function update_category(Request $request) {
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $category_id = $request->category_id;
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return Redirect::to('manage-category');
    }


    // Blog method
    public function add_blog() {
        $this->super_admin_auth_check();
        $published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $add_blog = view('admin.pages.add_blog')
                ->with('published_category', $published_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $add_blog);
    }

    public function save_blog(Request $request) {
        $data = array();
        $data['category_id'] = ($request->category_id);
        $data['blog_title'] = ($request->blog_title);
        $data['bloger_name'] = Session::get('admin_name');
        $data['blog_short_description'] = ($request->blog_short_description);
        $data['blog_long_description'] = ($request->blog_long_description);
        //$data['blog_image']=;
        $data['publication_status'] = ($request->publication_status);
        $data['blog_verified'] = 1;
        $data['created_at'] = date("Y-m-d H:i:s");
        $image = $request->file('blog_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/blog_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['blog_image'] = $image_url;
                DB::table('tbl_blog')->insert($data);
                Session::put('message', 'Save Blog Information Successfully!');
                return Redirect::to('/add-blog');
            }
        } else {
            DB::table('tbl_blog')->insert($data);
            Session::put('message', 'Save Blog Information Successfully!');
            return Redirect::to('/add-blog');
        }
    }

    public function manage_blog() {
        $this->super_admin_auth_check();
        $all_blog = DB::table('tbl_blog')
                ->select('*')
                ->where('blog_verified',1)
                ->get();
        $manage_blog = view('admin.pages.manage_blog')
                ->with('all_blog', $all_blog);
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_blog);
    }

    public function unpublished_blog($blog_id) {
        $data = array();
        $data['publication_status'] = 0;
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->update($data);
        return Redirect::to('/manage-blog');
    }

    public function published_blog($blog_id) {
        $data = array();
        $data['publication_status'] = 1;
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->update($data);
        return Redirect::to('/manage-blog');
    }

    public function edit_blog($blog_id) {
        $blog_info_by_id = DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->first();
        $all_published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $edit_blog = view('admin.pages.edit_blog')
                ->with('blog_info', $blog_info_by_id)
                ->with('category_info', $all_published_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $edit_blog);
    }

    public function update_blog(Request $request) {
        $data = array();
        $blog_id = ($request->blog_id);
        $data['blog_title'] = ($request->blog_title);
        $data['category_id'] = ($request->category_id);
        $data['bloger_name'] = Session::get('admin_name');
        $data['blog_short_description'] = ($request->blog_short_description);
        $data['blog_long_description'] = ($request->blog_long_description);
        $image = $request->file('blog_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/blog_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['blog_image'] = $image_url;
                DB::table('tbl_blog')
                        ->where('blog_id', $blog_id)
                        ->update($data);
                @unlink($request->blog_old_image);
                Session::put('message', 'Update Blog Information Successfully!');
                return Redirect::to('/manage-blog');
            }
        } else {
            DB::table('tbl_blog')
                    ->where('blog_id', $blog_id)
                    ->update($data);
            Session::put('message', 'Update Blog Information Successfully!');
            return Redirect::to('/manage-blog');
        }
    }

    public function delete_blog($blog_id) {
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->delete();
        return Redirect::to('/manage-blog');
    }
    // Blog method




    //Manage Bloger Content
        public function manage_bloger_content()
        {
            $this->super_admin_auth_check();
        $all_blog = DB::table('tbl_blog')
                ->select('*')
                ->where('blog_verified',0)
                ->get();
        $manage_bloger_content = view('admin.pages.manage_bloger_content')
                ->with('all_blog', $all_blog);
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_bloger_content);
        }



       public function blog_verification($blog_id) {
        $data = array();
        $data['blog_verified'] = 1;
        $data['publication_status'] = 1;
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->update($data);
        return Redirect::to('/manage-bloger-content');
    }


    public function delete_bloger_content($blog_id) {
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->delete();
        return Redirect::to('/manage-bloger-content');
    }
    //Manage Bloger Content

















    public function admin_logout(){
    	Session::put('admin_id','');
    	Session::put('admin_name','');
    	Session::put('message','Your are successfully logout!');
    	return redirect::to('admin-panel');
    }
}

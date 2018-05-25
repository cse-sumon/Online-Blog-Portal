<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Auth;

class FrontController extends Controller
{

    public function __construct(){
        $tag_show = array("h1","h2","h3","h4","h5","h6","p","br","span","li","ul","div");
        $dat="ssss";
    }

    public function index(){
    	$all_published_blog = DB::table('tbl_blog')
                            ->where('publication_status',1)
                            ->orderBy('blog_id','desc')
                            ->take('10')
                            ->get();
        $home_content= view('pages.home_content')
                    ->with('all_published_blog',$all_published_blog);
    	 return view('master')
    	 			->with('main_content',$home_content);

    }


    public function about(){
        $about= view('pages.about');
                    
         return view('master')
                    ->with('main_content',$about);
    }


    public function blog_by_category($category_id)
        {
            $all_published_blog_by_category_id = DB::table('tbl_blog')
                                ->where('publication_status',1)
                                ->where('category_id',$category_id)
                                ->orderBy('blog_id','desc')
                                ->take(10)
                                ->get();
            $home_content=view('pages.home_content')
                                ->with('all_published_blog',$all_published_blog_by_category_id);
            
            return view('master')
                         ->with('main_content',$home_content);
                                 
        }

        public function blog_details($blog_id)
        {
            
            $blog_info = DB::table('tbl_blog')
                        ->where('blog_id',$blog_id)
                        ->first();
            $data=array();
            $data['hit_count']=$blog_info->hit_count+1;
            DB::table('tbl_blog')
                       ->where('blog_id',$blog_id)
                        ->update($data);
            $blog_new_info = DB::table('tbl_blog')
                        ->where('blog_id',$blog_id)
                        ->first();
            
            $blog_details=view('pages.blog_details')
                        ->with('blog_info',$blog_new_info);
                        
          
            return view('master')
                    ->with('main_content',$blog_details);
                    
        }




        public function search (Request $request)
        {
            $searchdata = $request->search;
            $data = DB::table('tbl_blog')
                            ->select('*')
                            ->where('blog_title','like','%' .$searchdata. '%')
                            ->get();
            return view('pages.home_content')
                        ->with('all_published_blog',$data) ;               

        }



        public function bloger_write(){
            $all_published_category=DB::table('tbl_category')
                                    ->select('*')
                                    ->where('publication_status',1)
                                    ->get();    
            $bloger_page=view('pages.bloger_write')
                            ->with('published_category',$all_published_category);

            return view('master')
                        ->with('main_content',$bloger_page);
        }



        public function bloger_save(Request $request)
        {
          $data = array();
          $data['category_id'] = ($request->category_id);
          $data['blog_title'] = ($request->blog_title);
          $data['bloger_name'] = $request->bloger_id;
          $data['blog_short_description'] = $request->blog_short_description;
          $data['blog_long_description'] = $request->blog_long_description;
          $data['publication_status'] = 0;
          $data['blog_verified'] = 0;
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
                return Redirect::to('/bloger-write');
            }
        } 
        else {
            DB::table('tbl_blog')->insert($data);
            Session::put('message', 'Save Blog Information Successfully!');
            return Redirect::to('/bloger-write');
        }
    }




    public function manage_self_blog()
        {
          $id = Auth::user()->id;
        $all_blog = DB::table('tbl_blog')
                ->select('*')
                ->where('bloger_name',$id)
                ->get();
        $manage_self_blog = view('pages.manage_self_blog')
                ->with('all_blog', $all_blog);
        return view('master')
                        ->with('main_content', $manage_self_blog);
        }


        public function unpublished_bloger_content ($blog_id) 
        {
        $data = array();
        $data['publication_status'] = 0;
        DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->update($data);
        return Redirect::to('/manage-self-blog');
        }


        public function edit_bloger_content($blog_id){
            $blog_info_by_id = DB::table('tbl_blog')
                    ->where('blog_id', $blog_id)
                    ->first();
            $all_published_category = DB::table('tbl_category')
                    ->where('publication_status', 1)
                    ->orderBy('category_name','ASC')
                    ->get();
            $edit_blog = view('pages.edit_bloger_content')
                    ->with('blog_info', $blog_info_by_id)
                    ->with('category_info', $all_published_category);
            return view('master')
                            ->with('main_content', $edit_blog);
        }




        public function update_bloger_content(Request $request)
        {
          $data = array();
          $blog_id =($request->blog_id);
          $data['category_id'] = ($request->category_id);
          $data['blog_title'] = ($request->blog_title);
          $data['bloger_name'] = $request->bloger_id;
          $data['blog_short_description'] = ($request->blog_short_description);
          $data['blog_long_description'] = ($request->blog_long_description);
          $data['publication_status'] = 0;
          $data['blog_verified'] = 0;
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
                DB::table('tbl_blog')
                            ->where('blog_id',$blog_id)
                            ->update($data);
                Session::put('message', 'Update Blog Information Successfully!');
                return Redirect::to('/manage-self-blog');
            }
        } 
        else {
            DB::table('tbl_blog')
                    ->where('blog_id',$blog_id)
                    ->update($data);
            Session::put('message', 'Update Blog Information Successfully!');
            return Redirect::to('/manage-self-blog');
        }

        }




        public function save_comments(Request $request)
        {
            $data=array();
            $data['user_id']=$request->id;
            $data['blog_id']=$request->blog_id;
            $data['comments']=$request->comments;
            $data['publication_status']=1;
            $data['created_at']=date("Y-m-d H:i:s");
            DB::table('tbl_comments')
                    ->insert($data);

            return Redirect()->back();        
            
        }






 






}


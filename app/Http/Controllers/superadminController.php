<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class superadminController extends Controller
{
    public function index(){
        $dashboard = view('frontend.admin-pages.admin_content_dashboard');
        return view('frontend.admin.dashboard')
        ->with('admin-content',$dashboard);
    }
    
    public function addCatFunction(){
        $addcat = view('frontend.admin-pages.addcategory');
        return view('frontend.admin.dashboard')
        ->with('admin-content',$addcat);
    }
    
     function logoutFunction() {
        Session::put('admin_id');
        Session::put('admin_name');
        Session::put('message', 'you are successfully logout');
        return Redirect::to('/admin_panel');
    }
    
    public function save_cat_function(Request $request){
        $this->validate($request,[
            'cat_name'=>'required|min:5|max:7|unique:categories',
            'cat_description'=>'required',
            'cat_status'=>'required'
        ]);
        $data = array();
        $data['cat_name'] = $request->cat_name;
        $data['cat_description'] = $request->cat_description;
        $data['cat_status'] = $request->cat_status;
        
        DB::table('categories')
            ->insert($data); 
        Session::put('message', 'Category Added successfully');
        return Redirect::to('/addcategory');
    }
    
    public function manage_cat_function(){
        $allcategory = DB::table('categories')
                ->select('*')
                ->get();
        //echo "<pre>";
        //print_r($allcategory);
        //echo"</pre>";
        
        $manage_category = view('frontend.admin-pages.manage-cat')
                ->with('allcategory',$allcategory);
        return view('frontend.admin.dashboard')
                ->with('admin-content',$manage_category);
    }
    
    public function unpublish_cat_function($id){
        $data = array();
        $data['cat_status']= 0;
        DB::table('categories')
             ->where('id',$id)  
             ->update($data);
        return redirect::to('/manage_cat');
                
    }
    
    public function publish_cat_function($id){
        $data = array();
        $data['cat_status']= 1;
        DB::table('categories')
             ->where('id',$id)  
             ->update($data);
        return redirect::to('/manage_cat');
                
    }
    
    public function delete_cat_function($id){
        DB::table('categories')
                ->where('id',$id)
                ->delete();
        return redirect::to('/manage_cat');
    }
    
    public function edit_cat_function($id){
       $cat_info_by_id = DB::table('categories')
                ->where('id',$id)
                ->first();
        $cat_edit = view('frontend.admin-pages.editcategory')
                ->with('cat_info',$cat_info_by_id);
        return view('frontend.admin.dashboard')
                ->with('admin-content', $cat_edit);
    }
    
    public function update_cat_function(Request $request){
        $data = array();
        $data['cat_name'] = $request->cat_name;
        $data['cat_description'] = $request->cat_description;
        $cat_id = $request->id;
        
        DB::table('categories')
            ->where('id',$cat_id)
            ->update($data); 
       
        return redirect::to('/manage_cat');
    }
}

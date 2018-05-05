<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class manufacturerController extends Controller
{
    public function index(){
        return view('frontend.admin-pages.add-manufacturer');
    }
    
     
    
    public function save_manufacturer_function(Request $request){
        $data = array();
        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['manufacturer_description'] = $request->manufacturer_description;
        $data['manufacturer_status'] = $request->manufacturer_status;
        
        DB::table('tbl_manufacturer')
            ->insert($data); 
        Session::put('message', 'Manufacturer Added successfully');
        return Redirect::to('/add_manufacturer');
       
    }
    
    public function manage_manufacturer_function(){
        $allmanufacturer = DB::table('tbl_manufacturer')
                ->select('*')
                ->get();
        //echo "<pre>";
        //print_r($allmanufacturer);
        //echo"</pre>";
        
        $manage_manufacturer = view('frontend.admin-pages.manage-manufacturer')
                ->with('allmanufacturer',$allmanufacturer);
        return view('frontend.admin.dashboard')
                ->with('admin-content',$manage_manufacturer);
    }
    
    public function unpublish_manufacturer_function($id){
        $data = array();
        $data['manufacturer_status'] = 0;
        DB::table('tbl_manufacturer')
             ->where('manufacturer_id',$id)  
             ->update($data);
        return redirect::to('/manage_manufacturer');
                
    }
    
    public function publish_manufacturer_function($id){
        $data = array();
        $data['manufacturer_status'] = 1;
        DB::table('tbl_manufacturer')
             ->where('manufacturer_id',$id)  
             ->update($data);
        return redirect::to('/manage_manufacturer');
                
    }
    
    public function delete_manufacturer_function($id){
        DB::table('tbl_manufacturer')
                ->where('manufacturer_id',$id)
                ->delete();
        return redirect::to('/manage_manufacturer');
    }
    
    public function edit_manufacturer_function($id){
       $manufacturer_info_by_id = DB::table('tbl_manufacturer')
                ->where('manufacturer_id',$id)
                ->first();
        $manufacturer_edit = view('frontend.admin-pages.editmanufacturer')
                ->with('manufacturer_info',$manufacturer_info_by_id);
        return view('frontend.admin.dashboard')
                ->with('admin-content',$manufacturer_edit);
    }
    
    public function update_manufacturer_function(Request $request){
        $data = array();
        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['manufacturer_description'] = $request->manufacturer_description;
        $manufacturer_id = $request->manufacturer_id;
        
        DB::table('tbl_manufacturer')
            ->where('manufacturer_id',$manufacturer_id)
            ->update($data); 
       
        return redirect::to('/manage_manufacturer');
    }
}

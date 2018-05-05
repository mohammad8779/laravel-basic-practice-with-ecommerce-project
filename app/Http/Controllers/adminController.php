<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    public function adminFunction(){
        return view('frontend.admin.admin_login');
    }
    
    public function admin_LoginCheck_Function(Request $request){
        $email_address = $request->admin_email;
        $admin_password = $request->admin_password;
        //echo $email_address, '------------------', $admin_password;
        //exit();

        $admin_info = DB::table('tbl_admin')
                ->where('admin_email', $email_address)
                ->where('admin_password', md5($admin_password))
                ->first();
         //echo '<pre>';
         //print_r($admin_info);
         //exit();
        if ($admin_info) {
            Session::put('admin_name', $admin_info->admin_name);
            Session::put('admin_id', $admin_info->admin_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('exception', 'your user id or password invalid');
            return redirect::to('/admin_panel');
        }
        
         
    }
}

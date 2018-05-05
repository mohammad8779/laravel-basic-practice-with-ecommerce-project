<?php

namespace App\Http\Controllers;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\tblProducts;
use App\category;
use Illuminate\Support\Facades\Redirect;
class productController extends Controller
{
    public function add_product_function(){
        
        $category = category::where('cat_status','1')->get();
        return view('frontend.admin-pages.add-product',['category'=>$category]);
    }
    
    public function save_product_function(Request $request){
        $product_picture = $request->file('product_picture');
        $name = $product_picture->getClientOriginalName();
        $uploadPath = 'public/uploadPic/';
        $product_picture->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        
        $product = new tblProducts();
        $product->product_name = $request->product_name;
        //$product->cat_id = $request->cat_id ;
        $product->product_price  = $request->product_price ;
        $product->product_quantity  = $request->product_quantity ;
        $product->product_description = $request->product_description;
        $product->product_picture = $imageUrl;
        $product->product_status = $request->product_status;
        $product->save();
        
        //this image update comment codes does not work but why ? start image update code
        //$lastId = $product->id;
        
        
        //$updateImg = tblProducts::find($lastId);
        //$updateImg->product_picture = $imageUrl;
       // $updateImg->save();
        
       // end image update code 
        return redirect('/add_product')->with('msg','added product into db successfully');
    }
    /*****
        public function manage_product_function(){
        $products = DB::table('tbl_products')
            ->join('categories', 'tbl_products.cat_id', '=', 'categories.id')
            ->select('tbl_products.*', 'categories.cat_name')
            ->get();
        
        return view('frontend.admin-pages.manage-products',['products'=>$products]);
        //return"Hello Manage Products";
        
        echo $products;
        
    } 
    
    /*****
     * above task is created just by one table(tbl_products) without cat_id field..... 
     * 
     */
    
    
    public function manage_product_function(){
        
      $allproducts = DB::table('tbl_products')
                ->select('*')
                ->get();
        //echo "<pre>";
        //print_r($allcategory);
        //echo"</pre>";
        
        $manage_products = view('frontend.admin-pages.manage-products')
                ->with('allproducts',$allproducts);
        return view('frontend.admin.dashboard')
                ->with('admin-content',$manage_products);
        
    } 
    
    public function unpublish_product_function($id){
        $data = array();
        $data['product_status']= 0;
        DB::table('tbl_products')
             ->where('id',$id)  
             ->update($data);
        return redirect::to('/manage_product');
                
    }
    
    public function publish_product_function($id){
        $data = array();
        $data['product_status']= 1;
        DB::table('tbl_products')
             ->where('id',$id)  
             ->update($data);
        return redirect::to('/manage_product');
                
    }
    
     public function delete_product_function($id){
       /* DB::table('tbl_products')
                ->where('id',$id)
                ->delete();
       
        return redirect::to('/manage_product');******** */
         
        $product = tblProducts::find($id); 
        unlink($product->product_picture);
        $product->delete();
        return redirect('/manage_product')->with('msg','product deleted succesfully');
    }
    
    public function edit_product_function($id){
       $product_info_by_id = DB::table('tbl_products')
                ->where('id',$id)
                ->first();
        $product_edit = view('frontend.admin-pages.editproduct')
                ->with('product_info',$product_info_by_id);
        return view('frontend.admin.dashboard')
                ->with('admin-content',$product_edit);
    }
    
    public function update_product_function(Request $request){
       /*without image
         $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        
        $data['product_description'] = $request->product_description;
        //$data['product_picture'] = $request->product_picture;
        //$data['product_status'] = $request->product_status;
        
        $product_id = $request->id;
        
        DB::table('tbl_products')
            ->where('id',$product_id)
            ->update($data); 
       
        return redirect::to('/manage_product');
        * 
        */
        
        //with image is below
        
        $product = tblProducts::find($request->id);
        $productImage = $request->file('product_picture');
        if($productImage){
            unlink($product->product_picture);
            $imageName = $request->id.$productImage->getClientOriginalName();
            $uploadPath = 'public/uploadPic/';
            $productImage->move($uploadPath,$imageName);
            $imageUrl = $uploadPath.$imageName;
        }
        else{
            $imageUrl = $product->product_picture;
        }
        
        
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->product_picture = $imageUrl;
        $product->product_status = $request->product_status;
        
        $product->save();
        return redirect('/manage_product')->with('msg','product updated succesfully');
    }
}

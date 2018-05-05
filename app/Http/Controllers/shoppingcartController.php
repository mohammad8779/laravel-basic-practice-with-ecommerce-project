<?php

namespace App\Http\Controllers;
use App\tblProducts;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Redirect;
class shoppingcartController extends Controller
{
    public function add_to_cart_function(Request $request){
        $productId = $request->id;
        
        $productById = tblProducts::where('id',$productId)->first();
        
        Cart::add([
            
            'id'=>$productId,
            'name'=>$productById->product_name,
            'price'=>$productById->product_price,
            'qty'=>$productById->product_quantity,
        ]);
        
        return redirect('cart-show');
    }
    
    public function cart_show_function(){
        $cartProducts = Cart::content();
        
        return view('frontend.layouts.show-cart',['cartProducts'=>$cartProducts]);
    }
    
    public function update_cart_function(Request $request){
        
        Cart::update($request->rowId,$request->product_quantity);
        return redirect('/cart-show')->with('msg','cart updated successfully');
    }
    
    public function remove_cart_function($rowId){
        
        Cart::remove($rowId);
        return redirect('/cart-show')->with('msg','Product Remove successfully');
    }
}

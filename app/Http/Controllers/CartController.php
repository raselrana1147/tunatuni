<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Admin\Stock;
class CartController extends Controller
{
    


    public function add_to_cart(Request $request)
    {


    	if (empty($request->color_id) || empty($request->size_id) || empty($request->quantity)) {
    		 $notification=['status'=>'200', 'type'=>'error','message'=>'Something went wrong'];
    	}else
    	{

	    	if (Auth::check()) 
	    	{
	    		$cart=Cart::where('product_id','=',$request->product_id)
	    		->where('color_id',$request->color_id)
	    		->where('size_id',$request->size_id)
	    		->where('user_id',Auth::user()->id)->first();
	    	}else{
	    	   	
			   $cart=Cart::where('product_id','=',$request->product_id)
			   ->where('color_id',$request->color_id)
	    	   ->where('size_id',$request->size_id)
			   ->where('ip_address',$request->ip())->first();
	          }
	          if (is_null($cart)) {
	          	$cart            =new Cart();
	          	$cart->product_id=$request->product_id;
	          	$cart->size_id   =$request->size_id;
	          	$cart->color_id  =$request->color_id;
	          	$cart->quantity  =$request->quantity;
	          	if (Auth::check()) 
	          	{
	          		$cart->user_id=Auth::user()->id;
	          	}else
	          	{
	          		$cart->ip_address=$request->ip();
	          	}
	          	$cart->save();
	          }else
	          {
	          	$cart->increment('quantity');
	          }

	           $total_item=Cart::total_item();
	           $cart_items=$this->cart_items();
	          
	            $notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully added to cart','total_item'=>$total_item,'carts'=>$cart_items];
        }

         echo json_encode($notification);
    }

    public function cart()
    {
    	$carts=Cart::carts();
    	$total_price=Cart::total_price();
    	return view('front.cart',compact('carts','total_price'));
    }


  

    public function cart_delete(Request $request)
    {
      
    	$cart=Cart::findOrFail($request->cart_id);
	    $cart->delete();
	    $total_item =Cart::total_item();
		  $total_price=Cart::total_price();
		  $grand_total=$this->grand_total();

    	$notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully deleted','total_item'=>$total_item,'carts'=>$this->cart_items(),'total_price'=>$total_price,'grand_total'=>$grand_total];

    	echo json_encode($notification);
    }



    public  function cart_update(Request $request)
    {
    	
    	//dd($request->all());
    	$check_stock=Stock::where('product_id',$request->product_id)
    	->where('size_id',$request->size_id)
    	->where('color_id',$request->color_id)
    	->first();

    	//return $check_stock;
    	
    		if ($request->quantity>$check_stock->quantity) 
    		{
    			$notification=['status'=>'200', 'error'=>'error','message'=>'Stcok ot out'];
    			
    		}else{
    			$cart=Cart::findOrFail($request->cart_id);
    			$cart->quantity=$request->quantity;
    			$cart->save();

    			$each_cart_price=$cart->quantity*$cart->product->current_price;
    			$notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully updated','total_price'=>Cart::total_price(),'grand_total'=>$this->grand_total(),'each_cart_price'=>$each_cart_price];
    		}
    	
    	echo json_encode($notification);

    }





    public function grand_total()
    {
    	$total_price=Cart::total_price();
    	$grand_total=$total_price+shipping_charge()+tax();
    	return $grand_total;
    }


      public function cart_items()
    {
    	   $cart_items=Cart::carts();
    	   $total_price=Cart::total_price();
           $setProduct='';
       	    foreach ($cart_items as $cart) 
       	    {
                  $setProduct.='<div class="dropdown-cart-products">
                   <div class="product">
                       <div class="product-cart-details">
                           <h4 class="product-title">
                               <a href="'.route('product.detail',$cart->product_id).'">'.$cart->product->name.'</a></h4>
                           <span class="cart-product-info">
                               <span class="cart-product-qty">'.$cart->quantity.'</span>'.
                               'x'. currency().$cart->product->current_price.'
                           </span>
                       </div>
                       <figure class="product-image-container">
                           <a href="'.route('product.detail',$cart->product_id).'" class="product-image">
                               <img src="'. asset('assets/backend/image/product/small/'.$cart->product->thumbnail).'" alt="product"></a></figure>
                       <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                   </div>
                 </div>';
             }

            $setProduct.='<div class="dropdown-cart-total">
                   <span>Total</span>
                   <span class="cart-total-price">'.currency(). $total_price.'</span>
               </div>
               <div class="dropdown-cart-action">
                   <a href="'.route('view.cart').'" class="btn btn-primary">View Cart</a>
                   <a href="'.route('checkout').'" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
               </div>';
              return $setProduct;
    }

}

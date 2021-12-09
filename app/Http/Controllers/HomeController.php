<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Stock;
use Illuminate\Http\Response;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Brand;

class HomeController extends Controller
{
    
    public function index()
    {
    	$features=Product::where('featured',"=","0")->latest()->take(10)->get();
    	$top_sales=Product::where('top_sale',"=","0")->latest()->take(10)->get();
    	$trendings=Product::where('trending',"=","0")->latest()->take(10)->get();
    	$products=Product::latest()->paginate(12);
        return view('index',compact("products","features","top_sales","trendings"));
    }

    public function product_detail($id)
    {
    	$product=Product::findOrFail($id);
        $releted_products=Product::where("category_id",$product->category_id)->get();
        $stocks=Stock::where('product_id',$id)->get();
        $stock_check=Stock::where('product_id',$id)->where('quantity','>',"0")->get();
    	return view('front.product_detail',compact("product","releted_products","stocks","stock_check"));

    }

    public function find_color(Request $request)
    {
       
         $colors=Stock::with('color')->where(['product_id'=>$request->product_id,'size_id'=>$request->size_id])->get();

         return response()->json([
            'colors' =>$colors,
            'status_code' => 200
          ], Response::HTTP_OK);
    }

    public function available_quantity(Request $request)
    {
         $quantity=Stock::with('color')->where(
                [
                 'product_id'=>$request->product_id,
                 'size_id'=>$request->size_id,
                 'color_id'=>$request->color_id,
                 ]
            )->first();

         return response()->json([
            'quantity' =>$quantity,
            'status_code' => 200
          ], Response::HTTP_OK);
    }


    public function category_product($id)
    {
         $products=Product::where('category_id','=',$id)->latest()->paginate(12);
         $category=Category::findOrFail($id);
         return view('front.category_product',compact("products","category"));
    }

     public function subcategory_product($id)
    {
         $products=Product::where('sub_category_id','=',$id)->latest()->paginate(12);
         $subcategory=SubCategory::findOrFail($id);
         return view('front.subcategory_product',compact("products","subcategory"));
    }

    public function childcategory_product($id)
    {
         $products=Product::where('child_category_id','=',$id)->latest()->paginate(12);
         $childcategory=ChildCategory::findOrFail($id);
         return view('front.childcategory_product',compact("products","childcategory"));
    }

    public function brand_wise_product($id)
    {
         $products=Product::where('brand_id','=',$id)->latest()->paginate(12);
         $brand=Brand::findOrFail($id);
         return view('front.brand_product',compact("products","brand"));
    }

    public function search(Request $request)
    {

          if (!empty($request->keyword) && empty($request->category_id)) {
              $products=Product::where('name',"LIKE","%$request->keyword%")->paginate(12);

          }elseif (empty($request->keyword) && !empty($request->category_id)) {
              $products=Product::where('category_id',$request->category_id)->paginate(12);

          }elseif (!empty($request->keyword) && !empty($request->category_id)) {

              $products=Product::where('category_id',$request->category_id)
              ->Orwhere('name',"LIKE","%$request->keyword%")
              ->paginate(12);

          }else{
             $products=Product::latest()->paginate(12);;
         }

         
         return view('front.search',compact("products"));
    }
}

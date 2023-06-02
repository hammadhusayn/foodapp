<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Size;
use App\Models\Topping;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index(){
        $menu=Menu::all();
        // $record=Product::all();
        $record=DB::table('products')
      ->select('products.title as product_title','products.description as product_description','products.price as product_price','products.image as product_image','sizes.product_id as product_id','sizes.title as size_title','sizes.price as size_price','sizes.*', 'toppings.*','toppings.title as topping_title', 'toppings.price as topping_price')
      ->join('sizes', 'sizes.product_id', '=', 'products.id')
      ->join('toppings','toppings.product_id', '=', 'products.id')->get();
        return response()->json(['success' => $record]);
}
public function store(Request $request){
       
    $image=$request->file('image');
    if($image){
        $name_gen= hexdec(uniqid());
        $image_ext=strtolower($image->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $up_location='Backend/images/';
        $last_img=$up_location.$image_name;
        $image->move(public_path($up_location),$image_name);
   
        $record=Product::insertGetId([
        'menu_id' => $request->menu_id,
       'title'=>$request->name,
       'description'=>$request->description,
       'price'=>$request->price,
       'image'=>$image_name,
       'created_at' => Carbon::now(),
       ]);
    }
    else{
        $record=Product::insertGetId([
        'menu_id' => $request->menu_id,
       'title'=>$request->name,
       'description'=>$request->description,
       'price'=>$request->price,
       'created_at' => Carbon::now(),
            ]);
        }
      $size=new Size();
      $size_price=explode(',',$request->size_price);
      for($i=0; $i<(count($size_price)); $i++){
      $size->product_id=$record;
      $size->title=$request->size_title;
      $size->price=$request->size_price;
      $size->save();
      }

      $topping=new Topping();
      $topping_price=explode(',',$request->topping_price);
      for($i=0; $i<(count($topping_price)); $i++){
      $topping->product_id=$record;
      $topping->title=$request->topping_title;
      $topping->price=$request->topping_price;
      $topping->save();
      }
return response()->json(['success' => 'true', 'message' => 'Product Created Successfully !!!', 'Product' => $record]);
}
public function edit(Request $request)
        {
          $id=$request->id;
          $record = Product::findOrfail($id);
          
          return response()->json(['success' => 'true', 'Product' => $record]);
        }
        public function update(Request $request){
          $id=$request->id;
            if ($request->file('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid());
                $image_ext = strtolower($image->getClientOriginalExtension());
                $image_name = $name_gen . '.' . $image_ext;
                $up_location = 'Backend/images/';
                $last_img = $up_location . $image_name;
                $image->move($up_location, $image_name);
                $record=Product::where(['id' =>  $id])->update([
                    'menu_id' => $request->menu_id,
                    'title'=>$request->name,
                    'description'=>$request->description,
                    'price'=>$request->location,
                    'image'=>$image_name,
                  'updated_at' => Carbon::now(),
                ]);
              } else {
                $record=Product::where(['id' => $request->id])->update([
                    'menu_id' => $request->menu_id,
                    'title'=>$request->name,
                    'description'=>$request->description,
                    'price'=>$request->price,
                  'updated_at' => Carbon::now(),
                ]);
              }
              $size=new Size();
              $size_price=explode(',',$request->size_price);
              for($i=0; $i<(count($size_price)); $i++){
                $size->product_id=$id;
                $size->title=$request->size_title;
                $size->price=$request->size_price;
                $size->save();
              }
              

              $topping=new Topping();
              $topping_price=explode(',',$request->topping_price);
              for($i=0; $i<(count($topping_price)); $i++){
                $topping->product_id=$id;
                $topping->title=$request->topping_title;
                $topping->price=$request->topping_price;
                $topping->save();
              }
              return response()->json(['success' => 'true', 'message' => 'Product record updated Successfully !!!', 'Product' => $record]);
            }
            public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Product::findOrfail($id)->forceDelete();
    $deleteSize = Size::where('product_id',$id)->delete();
    $deleteTopping = Topping::where('product_id',$id)->delete();
    return response(['success' => 'true', 'message' => 'Product record has been Deleted Succesfully !!!']);
  }
}

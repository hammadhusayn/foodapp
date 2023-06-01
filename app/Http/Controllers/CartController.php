<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    public function index(){
        $cart=Cart::all();
        return response()->json(['success' => $cart]);
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
       
            $record=Cart::insert([
            'size' => implode(",",$request->size),
           'beverage'=> implode(",",$request->beverage),
           'topping'=>implode(",",$request->topping),
           'price'=>$request->price,
           'image'=>$image_name,
           'title'=>$request->title,
           'description'=>$request->description,
           'created_at' => Carbon::now(),
           ]);
        }
        else{
            $record=Cart::insert([
                'size' => implode(",",$request->size),
                'beverage'=> implode(",",$request->beverage),
                'topping'=>implode(",",$request->topping),
                'price'=>$request->price,
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at' => Carbon::now(),
           'created_at' => Carbon::now(),
                ]);
            }
            return response()->json(['success' => 'true', 'message' => 'Items has been add into Cart Successfully !!!', 'Cart' => $record]);
    }

    function edit(Request $request)
        {
          $id=$request->id;
          $record = Cart::findOrfail($id);
          
          return response()->json(['success' => 'true', 'Cart' => $record]);
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
                  $record=Cart::where(['id' =>  $id])->update([
                    'size' => implode(",",$request->size),
                    'beverage'=> implode(",",$request->beverage),
                    'topping'=>implode(",",$request->topping),
                    'price'=>$request->price,
                    'image'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'updated_at' => Carbon::now(),
                  ]);
                } else {
                  $record=Cart::where(['id' => $request->id])->update([
                    'size' => implode(",",$request->size),
                    'beverage'=> implode(",",$request->beverage),
                    'topping'=>implode(",",$request->topping),
                    'price'=>$request->price,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'updated_at' => Carbon::now(),
                  ]);
                }
                return response()->json(['success' => 'true', 'message' => 'Cart has been updated Successfully !!!', 'Cart' => $record]);
              }

              public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Cart::findOrfail($id)->forceDelete();
    return response(['success' => 'true', 'message' => 'Cart has been Deleted Succesfully !!!']);
  }
}

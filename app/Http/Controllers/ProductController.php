<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index(){
        $menu=Menu::all();
        $record=Product::all();
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
   
        $record=Product::insert([
        'menu_id' => $request->menu_id,
       'title'=>$request->name,
       'description'=>$request->description,
       'price'=>$request->price,
       'image'=>$image_name,
       'created_at' => Carbon::now(),
       ]);
    }
    else{
        $record=Product::insert([
        'menu_id' => $request->menu_id,
       'title'=>$request->name,
       'description'=>$request->description,
       'price'=>$request->price,
       'created_at' => Carbon::now(),
            ]);
        }
return response()->json(['success' => 'true', 'message' => 'Product Created Successfully !!!', 'Product' => $record]);
}
public function edit(Request $request)
        {
          $record = Product::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'Product' => $record]);
        }
        public function update(Request $request){
            if ($request->file('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid());
                $image_ext = strtolower($image->getClientOriginalExtension());
                $image_name = $name_gen . '.' . $image_ext;
                $up_location = 'Backend/images/';
                $last_img = $up_location . $image_name;
                $image->move($up_location, $image_name);
                $record=Product::where(['id' =>  $request->id])->update([
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
              return response()->json(['success' => 'true', 'message' => 'Product record updated Successfully !!!', 'Product' => $record]);
            }
            public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Product::findOrfail($id)->forceDelete();
    return response(['success' => 'true', 'message' => 'Product record has been Deleted Succesfully !!!']);
  }
}

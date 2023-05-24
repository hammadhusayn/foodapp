<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class VendorController extends Controller
{
        public function index(){
            $record=Vendor::all();
            return response()->json(['success' => $record]);
    }

    public function store(Request $request){
        $image=$request->file('logo');
        if($image){
            $name_gen= hexdec(uniqid());
            $image_ext=strtolower($image->getClientOriginalExtension());
            $image_name=$name_gen.'.'.$image_ext;
            $up_location='Backend/images/';
            $last_img=$up_location.$image_name;
            $image->move(public_path($up_location),$image_name);
       
            $record=Vendor::insert([
           'name'=>$request->name,
           'description'=>$request->description,
           'location'=>$request->location,
           'ratings'=>$request->ratings,
           'logo'=>$image_name,
           'created_at' => Carbon::now(),
           ]);
        }
        else{
            $record=Vendor::insert([
                'name'=>$request->name,
                'description'=>$request->description,
                'location'=>$request->location,
                'ratings'=>$request->ratings,
                'created_at' => Carbon::now(),
                ]);
        }
        return response()->json(['success' => 'true', 'message' => 'Vendor Created Successfully !!!', 'Vendor' => $record]);
        }
        public function edit(Request $request)
        {
          $record = Vendor::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'vendor' => $record]);
        }
        public function update(Request $request){
            if ($request->file('logo')) {
                $image = $request->file('logo');
                $name_gen = hexdec(uniqid());
                $image_ext = strtolower($image->getClientOriginalExtension());
                $image_name = $name_gen . '.' . $image_ext;
                $up_location = 'Backend/images/';
                $last_img = $up_location . $image_name;
                $image->move($up_location, $image_name);
                $record=Vendor::where(['id' =>  $request->id])->update([
                  'name' => $request->name,
                  'description' => $request->description,
                  'location' => $request->location,
                  'ratings' => $request->ratings,
                  'logo' => $image_name ,
                  'updated_at' => Carbon::now(),
                ]);
              } else {
                $record=Vendor::where(['id' => $request->id])->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'location' => $request->location,
                    'ratings' => $request->ratings,
                  'updated_at' => Carbon::now(),
                ]);
              }
              return response()->json(['success' => 'true', 'message' => 'Vendor record updated Successfully !!!', 'Vendor' => $record]);
            }
        public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Vendor::findOrfail($id)->forceDelete();
    return response(['success' => 'true', 'message' => 'Vendor record has been Deleted Succesfully !!!']);
  }
}

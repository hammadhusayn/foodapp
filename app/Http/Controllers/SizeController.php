<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Size;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class SizeController extends Controller
{
    public function index(){
        
        $record=Size::all();
        return response()->json(['success' => $record]);
}
public function store(Request $request){
       
    $image=$request->file('image');
    
        $record=Size::insert([
        'product_id' => $request->product_id,
       'title'=>$request->name,
       'price'=>$request->price,
       'created_at' => Carbon::now(),
            ]);
return response()->json(['success' => 'true', 'message' => 'Size record Created Successfully !!!', 'Size' => $record]);
    }
    public function edit(Request $request)
        {
          $record = Size::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'size' => $record]);
        }
        public function update(Request $request){
           
                $record=Size::where(['id' => $request->id])->update([
                    'product_id' => $request->product_id,
                    'title'=>$request->name,
                    'price'=>$request->price,
                  'updated_at' => Carbon::now(),
                ]);
              return response()->json(['success' => 'true', 'message' => 'Size record updated Successfully !!!', 'Size' => $record]);
            }
            public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Size::findOrfail($id)->forceDelete();
    return response(['success' => 'true', 'message' => 'Size record has been Deleted Succesfully !!!']);
  }

}

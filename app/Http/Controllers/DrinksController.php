<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drinks;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class DrinksController extends Controller
{
    public function index(){
        
        $record=Drinks::all();
        return response()->json(['success' => $record]);
}
public function store(Request $request){
       
    $image=$request->file('image');
    
        $record=Drinks::insert([
       'title'=>$request->name,
       'size'=>$request->size,
       'price'=>$request->price,
       'created_at' => Carbon::now(),
            ]);
return response()->json(['success' => 'true', 'message' => 'Vendor Created Successfully !!!', 'Vendor' => $record]);
    }
    public function edit(Request $request)
        {
          $record = Drinks::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'vendor' => $record]);
        }
        public function update(Request $request){
           
            $record=Drinks::where(['id' => $request->id])->update([
                'size' => $request->size,
                'title'=>$request->name,
                'price'=>$request->price,
              'updated_at' => Carbon::now(),
            ]);
          return response()->json(['success' => 'true', 'message' => 'Vendor record updated Successfully !!!', 'Vendor' => $record]);
        }
        public function destroy(Request $request)
{
$id = $request->id;
$record = Drinks::findOrfail($id)->forceDelete();
return response(['success' => 'true', 'message' => 'Vendor record has been Deleted Succesfully !!!']);
}
}

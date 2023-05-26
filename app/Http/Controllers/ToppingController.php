<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ToppingController extends Controller
{
    public function index(){
        
        $record=Topping::all();
        return response()->json(['success' => $record]);
}
public function store(Request $request){;
    
        $record=Topping::insert([
       'title'=>$request->name,
       'price'=>$request->price,
       'created_at' => Carbon::now(),
            ]);
return response()->json(['success' => 'true', 'message' => 'Topping Created Successfully !!!', 'Topping' => $record]);
    }
    public function edit(Request $request)
        {
          $record = Topping::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'Topping' => $record]);
        }
        public function update(Request $request){
           
            $record=Topping::where(['id' => $request->id])->update([
                'title'=>$request->name,
                'price'=>$request->price,
              'updated_at' => Carbon::now(),
            ]);
          return response()->json(['success' => 'true', 'message' => 'Topping record updated Successfully !!!', 'Topping' => $record]);
        }
        public function destroy(Request $request)
{
$id = $request->id;
$record = Topping::findOrfail($id)->forceDelete();
return response(['success' => 'true', 'message' => 'Topping record has been Deleted Succesfully !!!']);
}
}

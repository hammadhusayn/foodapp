<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class MenuController extends Controller
{
    public function index(){
            $record=Menu::all();
            return response()->json(['success' => $record]);
    }

    public function store(Request $request){
       
            $record=Menu::insert([
            'vendor_id' => $request->vendor_id,
           'title'=>$request->name,
           'created_at' => Carbon::now(),
                ]);
        
        return response()->json(['success' => 'true', 'message' => 'Menu Created Successfully !!!', 'Menu' => $record]);
        }

        public function edit(Request $request)
        {
          $record = Menu::findOrfail($request->id);
          
          return response()->json(['success' => 'true', 'Menu' => $record]);
        }

        public function update(Request $request){
            
                $record=Menu::where(['id' => $request->id])->update([
                    'vendor_id' => $request->vendor_id,
                    'title'=>$request->name,
                  'updated_at' => Carbon::now(),
                ]);
              
              return response()->json(['success' => 'true', 'message' => 'Menu record updated Successfully !!!', 'Vendor' => $record]);
            }
            public function destroy(Request $request)
  {
    $id = $request->id;
    $record = Menu::findOrfail($id)->forceDelete();
    return response(['success' => 'true', 'message' => 'Menu record has been Deleted Succesfully !!!']);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Product;
use App\Models\Menu;
use App\Models\ForgetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class SearchController extends Controller
{
    public function search(Request $request){
        $record =Product::where('title','like','%'.$request->search.'%')->get();
        return response()->json(['success' => 'true', 'Result' => $record]);
    }
}

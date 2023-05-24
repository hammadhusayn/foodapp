<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class registerController extends Controller
{
    public function Register(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'password' => 'required',
        'confirm_password' => 'required',
        'phone' => 'required',
      ]);
      if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], 401);
        }
        $data = User::create([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'gender' => $request->gender,
          'password' => Hash::make($request->password),
          'phone' => $request->phone,
          'created_at' => Carbon::now(),
          
        ]);
        $token = $data->createToken('foodapp')->accessToken;
        return response()->json(['token' => $token], 201);
        // return response()->json(['success' => 'True','message' => 'Register Successfully !!!',
        //                       'data' => $data, ], 200);
  }
}

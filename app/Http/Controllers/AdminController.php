<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function Register(Request $request)
    {
      
      
        $data = User::create([
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'business_name' => $request->business_name,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'business_type' => $request->business_type,
          'own_riders' => $request->own_riders,
          'location' => $request->location,
          'email' => $request->email,
          'type' => $request->type,
          'phone' => $request->phone,
          'password' => Hash::make($request->password),
          'status' => $request->status,
          'created_at' => Carbon::now(),
          'cuisine_types' => $request->cuisine_types,
          
          
        ]);
        $token = $data->createToken('foodapp')->accessToken;
        return response()->json(['token' => $token], 201);
        // return response()->json(['success' => 'True','message' => 'Register Successfully !!!',
        //                       'data' => $data, ], 200);
  }

  public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $token = $user->createToken('foodapp')->accessToken;
    
            
            return response()->json([
              'token' => $token,
              'user' => $user,
          ],200);
        } 
        else{
          return response()->json(['error' => 'Username not found'], 401);
        }
    }
}

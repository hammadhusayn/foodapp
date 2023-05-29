<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Menu;
use App\Models\ForgetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ForgetPasswordController extends Controller
{
    public function verify_email(Request $request){;
    $email=$request->email;
    $verifyEmail=User::where('email',$email)->first();
    if($verifyEmail){
        $otp = str_random(15);
        $record=ForgetPassword::insert([
            'email'=>$request->email,
            'otp'=>$otp,
            'created_at' => Carbon::now(),
                 ]);
                 return response()->json(['success' => 'true', 'message' => 'OTP generated Successfully !!!']);
    }
    else{
        return response()->json(['error' => 'true', 'message' => 'Email does not found !!!']);

    }
    }
    public function verify_otp(Request $request){
        $verifyOtp=ForgetPassword::where('email',$request->email)->where('otp',$request->otp)->first();
        if($verifyOtp){
            $record=Topping::where(['email' => $request->email])->update([
                'password'=>$request->password,
              'updated_at' => Carbon::now(),
            ]);
        }
          
          
          return response()->json(['success' => 'true', 'Password updated successfully' => $record]);
       
    }
}

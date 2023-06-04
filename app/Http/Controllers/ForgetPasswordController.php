<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Menu;
use App\Models\User;
use App\Models\ForgetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class ForgetPasswordController extends Controller
{
    public function verify_email(Request $request){;
    $email=$request->email;
    $verifyEmail=User::where('email',$email)->first();
    if($verifyEmail){
        $otp = rand(1000, 9999);
        $record=ForgetPassword::insert([
            'email'=>$request->email,
            'otp'=>$otp,
            'created_at' => Carbon::now(),
                 ]);
                 $data = ['email' => $request->email,'otp' => $otp];
                 Mail::send('forgetPassword', ["data1" => $data], function ($messages) use ($request) {
                    $messages->to($request->email);
                    $messages->subject('Reset Password');
                });
                $arr = compact('data');
                 return response()->json(['success' => 'true', 'message' => 'OTP generated Successfully !!!']);
    }
    else{
        return response()->json(['error' => 'true', 'message' => 'Email does not found !!!']);

    }
    }
    public function verify_otp(Request $request){
        $verifyOtp=ForgetPassword::where('email',$request->email)->where('otp',$request->otp)->first();
        if($verifyOtp){
            $record=User::where(['email' => $request->email])->update([
                'password'=>Hash::make($request->password),
              'updated_at' => Carbon::now(),
            ]);
            ForgetPassword::where('email',$request->email)->delete();
            return response()->json(['success' => 'true', 'Password updated successfully' => $record]);
        }
        else{

        }
          
          
          return response()->json(['error' => 'true', 'Incorrect OTP']);
       
    }
}

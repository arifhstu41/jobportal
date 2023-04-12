<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function validatePasswordRequest(Request $request)
    {
        $user = DB::table('users')->where('phone', '=', $request->phone)
            ->first();

        //Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['phone' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->phone,
            'token' => Str::random(60),
            'created_at' => now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->phone)->first();

        if ($this->sendResetMessage($request->phone, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your phone number.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetMessage($phone, $token)
    {
        //Retrieve the user from the database
        $user = DB::table('users')->where('phone', $phone)->select('id', 'name', 'phone')->first();

        //Generate, the password reset link. The token generated is embedded in the link
        $link = base_path() . 'password/reset/' . $token . '?phone=' . urlencode($user->phone);
        $link = "পাসওয়ার্ড রিসেট লিংক...";
        try {
            sendSMS($user->id, "password", null, $link);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function resetPassword(Request $request)
    {
        dd("dfsdfsdfds");
    }

    public function getPasswordResetOTP(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:11', "regex:/^(?:\+88|88)?(01[3-9]\d{8})$/"],
        ], [
            'phone.required' => 'Please enter your 11 digit mobile number',
            'phone.regex' => 'Please enter a valid 11 digit mobile number',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $user = User::where('phone', $request->phone)->first();
            
            if ($user) {
                $otp = $this->generateOTP();
                sendSMS($user->id, "otp", null, $otp);
                $user->otp = $otp;
                $user->otp_generated_time = now();
                $user->save();
                Session::put('user', $user);
                return redirect()->route('set.password.reset.otp')->with('status', trans('An OTP has been sent to your phone number.'));
            } else {
                $errors['phone'] = "No user found with this mobile number";
                return back()->withInput()->withErrors($errors);
            }
        }
    }

    function generateOTP($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sendOTPAgain(){
        $user_session= Session::get('user');
        $user= User::where('phone', $user_session->phone)->first();
        if($user->phone == $user_session->phone && $user->id == $user_session->id){
            $otp = $this->generateOTP();
            sendSMS($user->id, "otp", null, $otp);
            $user->otp = $otp;
            $user->otp_generated_time = now();
            $user->save();
            return redirect()->route('set.password.reset.otp')->with('status', trans('An OTP has been sent to your phone number.'));
            return redirect()->route('set.password.reset.otp')->with('status', trans('An OTP has been sent to your phone number.'));
        } else {
            $errors['phone'] = "No user found with this mobile number";
            return back()->withInput()->withErrors($errors);
        }
    }

    public function setPasswordResetOTP()
    {
        $user= Session::get('user');
        
        if($user && $user->otp != null ){
            $now = strtotime("now");
            $expire_time = strtotime("$user->otp_generated_time + 5 minute");
            if (($expire_time - $now) > 0) {
                return view('auth.passwords.otp');
            } else {
                Session::forget('user');
                $errors['otp'] = "OTP Expired";
                return redirect()->route('login')->withErrors($errors);
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function submitOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => ['required', 'max:6', 'min:6'],
        ], [
            'phone.required' => 'Please enter 6 digit OTP',
            'phone.max' => 'Please enter 6 digit OTP',
            'phone.min' => 'Please enter 6 digit OTP',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {

           
            $user = User::where('otp', $request->otp)->first();
            Session::put('user', $user);
            
            if ($user) {
                $now = strtotime("now");
                $expire_time = strtotime("$user->otp_generated_time + 5 minute");
                
                if (($expire_time - $now) > 0) {
                    return redirect()->route('set.new.password');
                } else {
                    $errors['otp'] = "OTP Expired";
                    return back()->withInput()->withErrors($errors);
                }
            } else {
                $errors['otp'] = "Invalid OTP!";
                return back()->withInput()->withErrors($errors);
            }
        }
    }

    public function setNewPassword()
    {
        $user = Session::get('user');
        if ($user) {
            $now = strtotime("now");
            $expire_time = strtotime("$user->otp_generated_time + 5 minute");
            
            if (($expire_time - $now) > 0) {
                return view('auth.passwords.new', compact('user'));
            } else {
                $errors['otp'] = "OTP Expired";
                return redirect()->route('login')->withErrors($errors);
            }
        } else {
            $errors['otp'] = "OTP Expired";
            return redirect()->route('login')->withErrors($errors);
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:11', "regex:/^(?:\+88|88)?(01[3-9]\d{8})$/"],
            'password' => 'required',
            'password_confirm' => 'reqired'
        ], [
            'phone.required' => 'Please enter your 11 digit mobile number',
            'phone.regex' => 'Please enter a valid 11 digit mobile number',
            'password.required' => 'Please enter a strong password',
            'password_confirm.required' => 'Password should be matched',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $user = User::where('phone', $request->phone)->first();
            $user_session = Session::get('user');
            if ($user && $user_session  && $user->phone == $user_session->phone && $request->password == $request->password_confirmation) {
                $user->password = bcrypt($request->password);
                $user->otp = null;
                $user->otp_generated_time = null;
                $user->save();
                sendSMS($user->id, "password_reset");
                Session::forget('user');
                return redirect()->route('login')->with('success', "Password updated successfully!");
            } else {
                return back()->with('error','Something went wrong!');
            }
        }
    }
}

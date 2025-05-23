<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Candidate;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\Admin\NewUserRegisteredNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', "regex:/^(?:\+88|88)?(01[3-9]\d{8})$/", 'unique:users'],
            'email' => ['string', 'nullable', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => config('captcha.active') ? 'required|captcha' : ''
        ], [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'phone' => 'Please enter a valid 11 digit mobile number'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $newUsername =generateUserName();
        $oldUserName = User::where('username', $newUsername)->first();

        if ($oldUserName) {
            $username = Str::slug($newUsername) . '_' . Str::random(5);
        } else {
            $username =generateUserName();
        }

        $user= new User();
        $user->role= $data['role'] == 'candidate' ? 'candidate' : 'company';
        $user->name= $data['name'];
        $user->phone= $data['phone'];
        $user->email= $data['email'];
        $user->username= $username;
        $user->password= Hash::make($data['password']);

        $user->save();
        
        // send register sms 
        // sendSMS($user->id, "register");

        // create contact info
        ContactInfo::where('user_id', $user->id)->update([
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            Notification::send($admin, new NewUserRegisteredNotification($admin, $user));
        }

        return $user;
    }

    function generateUserName($length = 12)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return "WFB".$randomString;
    }
}

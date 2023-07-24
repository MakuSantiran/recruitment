<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Applicant_Detail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'register',
            'login',
        ]);
    }

    public function dashboard()
    {
        return view('applicant.my');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'unique:users,username', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'error' => $validator->getMessageBag()->toArray()
            ];
        } else {
            $new_user = new User;
            $new_detail = new Applicant_Detail;
            
            $new_user->username = $request->username;
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            
            $new_user->save();

            $new_detail->user_id = $new_user->id;
            $new_detail->registration_no = date('y').'-'.sprintf("%06s", $new_user->id);
            $new_detail->surname = $request->surname;
            $new_detail->firstname = $request->firstname;
            $new_detail->middlename = $request->middlename;
            $new_detail->birthdate = $request->birthdate;
            $new_detail->sex = (int) $request->sex;
            $new_detail->civil_status = (int) $request->civil_status;
            $new_detail->citizenship = $request->citizenship;
            $new_detail->contact_no = $request->contact_no;

            $new_detail->save();
            
            event(new Registered($new_user));
            Auth::login($new_user);
            return ['success' => true];
        }
    }

    public function login(UserLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('my');
    }

    public function getApplicant()
    {
        
        $userApplicant= DB::table('users')
                        ->where("users.id", Auth::id())
                        ->join('applicant_details', 'users.id', '=', 'applicant_details.user_id')
                        ->first();

        // remove the exposed password 07/21/2023 (partial fix??)
        $userApplicant->password = "";

        return $userApplicant;
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        
        return json_encode(['status' => 200, 'message' => 'logout']);
        
    }
}

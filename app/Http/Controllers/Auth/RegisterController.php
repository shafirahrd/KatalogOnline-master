<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\UserValidation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/home';

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
            'username' => ['required', 'string', 'min:6', 'max:20'],
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'min:18'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'lokasi' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $nip = DB::table('user_validations')->where('nip','=',$data['nip'])->first();
        // UserValidation::find($data['nip'])->tosql();
        // dd($nip);
        if($nip){
            return User::create([
            'username' => $data['username'],
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_lokasi' => $data['lokasi']
            ]);
        }
        else{
            return back();
        }
    }
}

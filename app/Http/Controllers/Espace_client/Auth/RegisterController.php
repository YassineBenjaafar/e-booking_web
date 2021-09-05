<?php

namespace App\Http\Controllers\Espace_client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Employee;
use App\Client;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:client');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = Client::create([
            'fullName' => $data['fullName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return $user;
    }

    public function showRegistrationForm()
    {
        return view('espace_client.auth.register');
    }
    public function register(Request $request) 
    {
         // for Employee
         $this->validator($request->all())->validate();
         $employeeFound = Employee::firstWhere('ecode',$request->ecode);
         if($employeeFound){
            if(!$employeeFound->client_id){
                $request['fullName'] = $employeeFound->first_name . " " . $employeeFound->last_name;
                event(new Registered($user = $this->create($request->all())));
                $this->guard("client")->login($user);
                $employeeFound->client()->associate($user);
                $employeeFound->points = $employeeFound->getPoints();
                $employeeFound->update();
                return redirect('/');
           }else
           {
                return redirect('register')->with('fail','Employee Code is already associated to an account!');
           }
        }
            return redirect('register')->with('fail','eCode doesnt match any employee!');
         

    }
}

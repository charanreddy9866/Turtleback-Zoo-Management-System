<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=>['required', 'string', 'max:13', 'min:10'],
            'access' => ['required', 'string','in:retailer,wholesaler'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])/']
            
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number'=>$data['phone_number'],
            'access'=>$data['access'],
            'street'=>$data['street'],
            'city'=>$data['city'],
            'state'=>$data['state'],
            'zip'=>$data['zip'],
            'password' => Hash::make($data['password']),

        ]);
    }
 
  /*   protected function registered(Request $request, $user)
    {
        if ($user->access === 'retailer') {
            return redirect()->route('home'); 
        } elseif ($user->access === 'wholesaler') {
            return redirect()->route('login'); 
        }

        return redirect($this->redirectPath());
    } */
}

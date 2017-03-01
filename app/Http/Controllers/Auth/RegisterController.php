<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
           'nombre' => 'required|max:255',
           'apellido' => 'required|max:255',
           'cedula' => 'required|max:8|unique:users',
           'fecha_de_nacimiento' => 'max:255',
           'edad' => 'max:255',
           'sexo' => 'max:255',
           'telefono' => 'max:255',
           'celular' => 'max:255',
           'direccion' => 'max:255',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
               'nombre' => $data['nombre'],
               'apellido' => $data['apellido'],
               'cedula' => $data['cedula'],
               'fecha_de_nacimiento' => $data['fecha_de_nacimiento'],
               'edad' => $data['edad'],
               'sexo' => $data['sexo'],
               'telefono' => $data['telefono'],
               'celular' => $data['celular'],
               'direccion' => $data['direccion'],
               'email' => $data['email'],
               'password' => bcrypt($data['password']),
        ]);
        
        $user->assignRole('Paciente');
        return $user;
    }
}

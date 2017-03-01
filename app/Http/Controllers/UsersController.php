<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;


class UsersController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
            return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if(!Auth::user()->can('CrearUsuario'))
        //abort(403,'Acceso Prohibido');

        $roles = Role::all();
            return view('users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $v = Validator::make($request->all(), [
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
           //'role' => 'required',

       ]);

       if ($v->fails()) {
           return redirect()->back()->withErrors($v)->withInput();
       }
       try {
            \DB::beginTransaction();

           $user = User::create([
               'nombre' => $request->input('nombre'),
               'apellido' => $request->input('apellido'),
               'cedula' => $request->input('cedula'),
               'fecha_de_nacimiento' => $request->input('fecha_de_nacimiento'),
               'edad' => $request->input('edad'),
               'sexo' => $request->input('sexo'),
               'telefono' => $request->input('telefono'),
               'celular' => $request->input('celular'),
               'direccion' => $request->input('direccion'),
               'email' => $request->input('email'),
               'password' => bcrypt($request->input('password')),
           ]);
           
           //dd($user); con este pequeño codigo puedo probar los campos que me estan llegando a mi vista

           //$user->assignRole($request->input('role'));

       } catch (\Exception $e) {
            \DB::rollback();
       } finally {
            \DB::commit();
       }
            return redirect('/usuarios')->with('mensaje', 'Usuario creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if(!Auth::user()->can('EditarUsuario'))
            //abort(403,'Acceso Prohibido');

        $roles = Role::all();
        $user = User::findOrFail($id);
            return view('users.edit', ['user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:8|unique:users,cedula,'.$id.',id',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id.',id',
            'role' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try{

            \DB::beginTransaction();

        $user = User::findOrFail($id);

        $user->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'cedula' => $request->input('cedula'),
            'telefono' => $request->input('telefono'),
            'celular' => $request->input('celular'),
            'email' => $request->input('email'),
        ]);

        if($request->input('password')){
            $v = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
            ]);

            if ($v->fails())
                {
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $user->update([
                    'password' => bcrypt($request->input('password')),
            ]);
        }

          // $user->removeRole(Role::all());
           // $user->assignRole($request->input('role'));

            $user->syncRoles($request->input('role'));

        }catch (\Exception $e){
            echo $e->getMessage();
            \DB::rollback();
        }finally{
            \DB::commit();
        }
            return redirect('/usuarios')->with('mensaje', 'Usuario actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

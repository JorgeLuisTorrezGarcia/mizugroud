<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $bitacora;
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit','update');
        $this->bitacora = new Bitacora();

    }
    public function index()
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');

    }
    public function show($id)
    {
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Editar Rol-permisos',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('users.edit',$user)->with('info','Se asigno los roles correctamente');
    }


    public function destroy($id)
    {
        //
    }
}

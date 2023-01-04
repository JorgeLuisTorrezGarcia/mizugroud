<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $bitacora;
    public function __construct()
    {
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create','store');
        $this->middleware('can:roles.edit')->only('edit','update');
        $this->middleware('can:roles.destroy')->only('destroy');
        $this->bitacora = new Bitacora();
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Agrego un Rol',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('roles.index',$role)->with('info','El rol se creo con exito');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(['name'=>'required']);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.edit',$role)->with('info','El rol se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('info','El rol se elimino con exito');
    }
}

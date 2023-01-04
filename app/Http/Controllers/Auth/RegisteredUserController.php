<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Bitacora;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    protected $bitacora;
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('Cliente');


        event(new Registered($user));

        Auth::login($user);

        $this->bitacora = new Bitacora();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Registro de Usuario',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);

        $this->bitacora = new Bitacora();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Inicio de Session',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}

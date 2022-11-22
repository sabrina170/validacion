<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        // $users  = User::orderByDesc('id')->get();

        $users = User::orderByDesc('id')->get();

        $alumnos  = Alumno::orderByDesc('id')->get();

        return view('usuarios.index', compact('users', 'alumnos'));
    }

    public function register(Request $request)
    {
        //falta valiaar datos que sean verdaderos
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_confirm = $request->password;
        $user->id_estudiante = 0;
        $user->mod_user = $request->mod_user;
        $user->tipo_mod = $request->tipo_mod;

        if ($request->tipo == 1) {
            $user->assignRole('admin');
        } elseif ($request->tipo == 3) {
            $user->assignRole('trabajador');
        }

        $user->save();
        // Auth::login($user);

        return redirect(route('usuarios.index'));

        // dd($request);
    }

    public function login(Request $request)
    {
        //validacion

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            // "active" =>true
        ];

        $remember = ($request->has('remenber') ? true : false);
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('alumnos');
            }
            if (Auth::user()->hasRole('trabajador')) {
                return redirect()->intended('alumnos');
            } else {
                return redirect()->intended('estudiante');
            }
        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //cerrar session o limpiar session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('index'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        $nombre = $user->nombres;
        return redirect()->route('usuarios.index');
    }

    public function editaruser(Request $request)
    {
        $id_user = $request->id;
        $email = $request->email;
        $password_confirm = $request->password_confirm;
        $password = Hash::make($request->password_confirm);
        $mod_user = $request->mod_user;
        $tipo_mod = $request->tipo_mod;

        DB::table('users')->where('id', $id_user)->limit(1)->update([
            'email' => $email,
            'password' => $password,
            'password_confirm' => $password_confirm,
            'tipo_mod' => $tipo_mod,
            'mod_user' => $mod_user
        ]);

        return redirect()->route('usuarios.index')->with('message' . 'alumnos actualizado exitosamente');
    }
}

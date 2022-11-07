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


class UserController extends Controller
{

    public function index()
    {
        // $users  = User::orderByDesc('id')->get();

        $users = User::join("alumnos", "alumnos.id", "=", "users.id_estudiante")
            ->select("users.id", "name", "email", "password", "password_confirm", "nombres", "apellidos", "users.mod_user", "users.tipo_mod")
            ->get();

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
        $user->id_estudiante = $request->id_estudiante;
        $user->mod_user = $request->mod_user;
        $user->tipo_mod = $request->tipo_mod;

        $user->assignRole('estudiante');
        $user->save();
        Auth::login($user);

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
        return redirect(route('login'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        $nombre = $user->nombres;
        return redirect()->route('usuarios.index');
    }
}

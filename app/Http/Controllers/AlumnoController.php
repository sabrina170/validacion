<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos  = Alumno::orderByDesc('id')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 'nombres',
        // 'apellidos',
        // 'dni',
        // 'codigo_cer',
        // 'inicio',
        // 'final',
        // 'image',
        // 'codigo_cur'
        // $request->validate([
        //     'nombres' => 'required',
        //     'apellidos' => 'required',
        //     'dni' =>  'required',
        //     'codigo_cer' => 'required',
        //     'inicio' => 'required',
        //     'final' => 'required',
        //     'codigo_cur' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg'
        // ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinatarioPath = 'images-cer/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // dd($request);
        Alumno::create($input);

        return redirect()->route('alumnos.index')->with('succes' . 'alumnos creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $nombre = $alumno->nombres;
        return redirect()->route('alumnos.index');
    }

    public function buscar(Request $request)
    {
        // $alumno->delete();
        // $nombre = $alumno->nombres;
        // return redirect()->route('alumnos.index');
        // dd($request);
        // $dni = $request->dni;
        // $certificado = DB::table('alumnos')
        //     ->select('id', 'nombres', 'image')
        //     ->where('id', $dni);

        $dni = $request->dni;
        $cod = $request->cod;

        $mshow= 'show';
       if(isset($dni) && isset($cod)){
        // $dni = $request->dni;
        // $cod = $request->codigo_cer;
        $filterResult = Alumno::where('dni', $dni)->orWhere('codigo_cer',  $cod )->get();
        return view('validacion', compact('dni', 'filterResult','mshow'));
       }
       else{
        return view('validacion');
       }

        // return response()->json($filterResult);

        // dd($certificado);
        // return redirect()->route('validacion', compact('dni'));

        // $nombres = $certificado->nombres;
        // $certificados  = Alumno::orderByDesc('id')->get();

        // return redirect()->route('validacion');
    }
}

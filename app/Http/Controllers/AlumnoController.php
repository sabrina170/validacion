<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Models\Alumno;
use App\Models\AlumnoImage;
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
    public function store(AlumnoRequest $request)
    {
        $input = $request->validated();

        // Foto Perfil
        if ($image = $request->file('image')) {
            $destinatarioPath = 'images-cer/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // dd($request);
        $alumno = Alumno::create($input);

        // return $alumno->id;
        // GALERIA DE IMAGENES    
        if ($request->hasfile('images')) {
            $uploadPath = 'images-cer/';

            $i = 1;
            foreach ($request->file('images') as $imagefile) {
                $exten = $imagefile->getClientOriginalExtension();
                $filename = time() . $i++ . "." . $exten;
                $imagefile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                // $input['image'] = "$profileImage";

                $alumno->alumnoImages()->create([
                    'product_id' => $alumno->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect()->route('alumnos.index')->with('message' . 'alumnos creado exitosamente');
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
    public function edit(Alumno $alumno, $alum)
    {
        $alumnos  = Alumno::orderByDesc('id')->where('id', $alum)->get();

        return view('alumnos.edit', compact('alumnos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, Alumno $alumno)
    {
        $alu = $request->validated();

        // $alumno->update([
        //     'nombres' => $validar['nombres'],
        //     'apellidos' => $validar['apellidos'],
        //     'dni' => $validar['dni'],
        //     'codigo_cer' => $validar['codigo_cer'],
        //     'inicio' => $validar['inicio'],
        //     'final' => $validar['final'],
        //     'codigo_cur' => $validar['codigo_cur'],
        //     'mod_user' => $validar['mod_user'],
        //     'tipo_mod' => $validar['tipo_mod']
        // ]);
        // Foto Perfil
        if ($image = $request->file('image')) {
            $destinatarioPath = 'images-cer/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinatarioPath, $profileImage);
            $alu['image'] = "$profileImage";
        }
        $alu['tipo_mod'] = 2;
        $alumno->update($alu);
        // GALERIA DE IMAGENES    
        if ($request->hasfile('images')) {
            $uploadPath = 'images-cer/';

            $i = 1;
            foreach ($request->file('images') as $imagefile) {
                $exten = $imagefile->getClientOriginalExtension();
                $filename = time() . $i++ . "." . $exten;
                $imagefile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                // $input['image'] = "$profileImage";

                $alumno->alumnoImages()->create([
                    'product_id' => $alumno->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->route('alumnos.index')->with('message' . 'alumnos actualizado exitosamente');
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
        $dni = $request->dni;
        $cod = $request->cod;
        if (isset($dni) && isset($cod)) {
            $show = 'show';
            // $filterResult = Alumno::where('dni', '=', $dni)->get();

            $filterResult = Alumno::where('dni', '=', $dni)
                ->where('codigo_cer', '=', $cod)
                ->get();

            if (count($filterResult) <= 0) {
                $message = 'No hay resultado';
                return view('validacion', compact('message'));
            } else {

                return view('validacion', compact('dni', 'filterResult', 'show'));
            }
            // dd($filterResult);

        } else if (isset($dni)) {
            $message = 'Ingresa el Codigo del Certificado';
            return view('validacion', compact('message'));
        } else if (isset($cod)) {
            $message = 'Ingresa el DNI';
            return view('validacion', compact('message'));
        } else {
            $message = 'Ingresa un DNI y Codigo del Certificad';
            return view('validacion', compact('message'));
        }

        // return response()->json($filterResult);

        // dd($certificado);
        // return redirect()->route('validacion', compact('dni'));

        // $nombres = $certificado->nombres;
        // $certificados  = Alumno::orderByDesc('id')->get();

        // return redirect()->route('validacion');
    }

    public function detalles(Request $request, $alum)
    {
        $alumnos  = Alumno::orderByDesc('id')->where('id', $alum)->get();
        $certificados  = AlumnoImage::orderByDesc('id')->where('alumno_id', $alum)->get();

        return view('alumnos.detalles', compact('alumnos', 'certificados'));
        // DB::table('users')->where('ku', $ku)
    }
}

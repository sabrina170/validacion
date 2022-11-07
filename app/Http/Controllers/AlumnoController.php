<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\CertificadoRequest;
use App\Models\Alumno;
use App\Models\AlumnoImage;
use App\Models\Certificado;
use App\Models\CertificadoImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function store(Request $request, AlumnoRequest $alumnosrequest)
    {
        $input = $alumnosrequest->validated();

        // dd($request);
        $alumno = Alumno::create($input);
        // credenciales
        $user = new User();

        $user->name = $request->nombres;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_confirm = $request->password;
        $user->id_estudiante = $alumno->id;
        $user->mod_user = $request->mod_user;
        $user->tipo_mod = $request->tipo_mod;

        $user->assignRole('estudiante');
        $user->save();
        // Auth::login($user);
        // return $alumno->id;

        return redirect()->route('alumnos.index')->with('message' . 'alumnos creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function crear_certificado(Request $request, Certificado $certi)
    {
        // $input = $request->validated();
        // $data = $request->all();
        // $data['user_id'] = $request->alumno_id;
        // $data['alumno_id '] = '2';
        // $data['alumno_id'] = Alumno::select('id')->where('id', $request->alumno_id);


        $certi = Certificado::create([
            'alumno_id' => $request->alumno_id,
            'inicio' => $request->inicio,
            'codigo_cer' => $request->codigo_cer,
            'final' => $request->final,
            'codigo_cur' => $request->codigo_cur,
        ]);

        // return $certi->id;
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

                $certi->certificadoImages()->create([
                    'cer_id' => $certi->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->route('alumnos.index')->with('message' . 'Certificado creado exitosamente');
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
        $certificados  = Certificado::orderByDesc('id')->where('alumno_id', $alum)->get();

        $certificados_imagenes  = CertificadoImage::orderByDesc('id')->get();
        return view('alumnos.edit', compact('alumnos', 'certificados', 'certificados_imagenes'));
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

        $alu['tipo_mod'] = 2;
        $alumno->update($alu);
        // GALERIA DE IMAGENES
        // if ($request->hasfile('images')) {
        //     $uploadPath = 'images-cer/';

        //     $i = 1;
        //     foreach ($request->file('images') as $imagefile) {
        //         $exten = $imagefile->getClientOriginalExtension();
        //         $filename = time() . $i++ . "." . $exten;
        //         $imagefile->move($uploadPath, $filename);
        //         $finalImagePathName = $uploadPath . $filename;
        //         // $input['image'] = "$profileImage";

        //         $alumno->alumnoImages()->create([
        //             'product_id' => $alumno->id,
        //             'image' => $finalImagePathName,
        //         ]);
        //     }
        // }

        return redirect()->route('alumnos.index')->with('message' . 'alumnos actualizado exitosamente');
    }
    public function actualizar_certificado(Request $request, Certificado $certi)
    {
        // dd($request->id_cer);
        $id_cer = $request->id_cer;
        // $cc = $request->validate();
        // $alu['tipo_mod'] = 3;
        $certi->update([
            'codigo_cer' => $request->codigo_cer,
            'inicio' => $request->inicio,
            'final' => $request->final,
            'codigo_cur' => $request->codigo_cur,
        ]);
        $alumno_id = $request->alumno_id;
        // $cert_id = $cer->id;

        DB::table('alumnos')->where('id', $alumno_id)->limit(1)->update(['tipo_mod' => '3']);
        // $cer->update($request);

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

                $certi->certificadoImages()->create([
                    'cer_id' => $request->id_cer,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->route('alumnos.edit', $alumno_id)->with('message' . 'alumnos actualizado exitosamente');
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
            $data_alum = Alumno::where('dni', '=', $dni)->limit(1)->get();
            // $id_alum = $data_alum->id;

            foreach ($data_alum as $key) {
                $id_alum = $key->id;
                // dd($id_alum);
            }

            if (isset($id_alum)) {
                $filterResult = Certificado::where('alumno_id', '=', $id_alum)
                    ->where('codigo_cer', '=', $cod)
                    ->get();

                // dd($filterResult);
                if (count($filterResult) <= 0) {
                    $message = 'No hay certificado para ese DNI';
                    return view('validacion', compact('message'));
                } else {

                    return view('validacion', compact('dni', 'filterResult', 'show'));
                }
            } else {
                $message = 'No se encuntra al alumno con ese DNI.';
                return view('validacion', compact('message'));
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
        $certificados  = Certificado::orderByDesc('id')->where('alumno_id', $alum)->get();

        $certificados_imagenes  = CertificadoImage::orderByDesc('id')->get();

        return view('alumnos.detalles', compact('alumnos', 'certificados', 'certificados_imagenes'));
        // DB::table('users')->where('ku', $ku)
    }
}

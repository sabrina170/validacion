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

    public function datosestudiantes()
    {
        $alum = Auth::user()->id_estudiante;
        $alumnos  = Alumno::orderByDesc('id')->where('id', $alum)->get();
        $certificados  = Certificado::orderByDesc('id')->where('alumno_id', $alum)->get();

        $certificados_imagenes  = CertificadoImage::orderByDesc('id')->get();

        return view('estudiante', compact('alumnos', 'certificados', 'certificados_imagenes'));
        // dd($alumnos);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $alumnosrequest->validated();
        //CREAR AL ALUMNO
        $alumno = Alumno::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'mod_user' => $request->mod_user,
            'tipo_mod' => $request->tipo_mod,
        ]);
        // dd($alumno->id);
        // CREAR EL USUARIO
        $user = new User();
        $user->name = $request->nombres;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_confirm = $request->password;
        $user->id_estudiante = $alumno->id;
        $user->mod_user = $request->mod_user;
        $user->tipo_mod = $request->tipo_mod;
        // ASIGNANDO EL ROL
        $user->assignRole('estudiante');
        $user->save();
        // Auth::login($user);
        // return $alumno->id;

        // CREAR EL CERTIFICADO 
        $certi = Certificado::create([
            'alumno_id' => $alumno->id,
            'inicio' => $request->inicio,
            'codigo_cer' => $request->codigo_cer,
            'final' => $request->final,
            'codigo_cur' => $request->codigo_cur,
        ]);
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
        $usuarios  = User::orderByDesc('id')->where('id_estudiante', $alum)->get();
        $certificados_imagenes  = CertificadoImage::orderByDesc('id')->get();
        return view('alumnos.edit', compact('alumnos', 'certificados', 'certificados_imagenes', 'usuarios'));
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

        $alumno_id = $alumno->id;
        $email = $request->email;
        $password_confirm = $request->password_confirm;
        $password = Hash::make($request->password_confirm);


        DB::table('users')->where('id', $alumno_id)->limit(1)->update(['email' => $email, 'password' => $password, 'password_confirm' => $password_confirm,]);

        return redirect()->route('alumnos.index')->with('message' . 'alumnos actualizado exitosamente');
    }
    public function actualizar_certificado(Request $request)
    {
        // dd($request);
        $certi = Certificado::find($request->cer_id);
        $certi->codigo_cer = $request->codigo_cer;
        $certi->inicio = $request->inicio;
        $certi->final = $request->final;
        $certi->codigo_cur = $request->codigo_cur;
        $certi->alumno_id = $request->alumno_id;

        $certi->save();
        $alumno_id = $request->alumno_id;

        DB::table('alumnos')->where('id', $alumno_id)->limit(1)->update(['tipo_mod' => '3']);
        // $cer->update($request);

        // GALERIA DE IMAGENES
        if ($request->hasfile('images')) {

            // dd($request->certis);
            foreach ($request->certis as $key) {
                DB::table('certificado_images')->where('id', $key)->delete();
            }
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



    public function buscaralumno3(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('buscar');
            if ($query != '') {
                $data = DB::table('alumnos')
                    ->where('dni', 'like', '%' . $query . '%')
                    ->get();
            } else {
                $data = DB::table('alumnos')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $alum) {

                    $output .= '
            <tr class="intro-x">
                    <td>' . $alum->id . '</td>
                    
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">' . $alum->nombres . '</a> 
                    </td>
                    <td class="text-center">' . $alum->apellidos . '</td>
                    <td class="text-center">' . $alum->dni . '</td>
                <td>
                ';
                    if ($alum->tipo_mod == 1) {
                        $output .= '
                    <div class="bg-success/20 text-success rounded px-2 mt-1.5">
                     <strong>Registrado</strong> por <strong>' . $alum->mod_user . '</strong>
                    </div>';
                    } elseif ($alum->tipo_mod == 2) {
                        $output .= '
                    <div class="bg-warning/20 text-warning rounded px-2 mt-1.5">
                       <strong>Actualizado</strong> por <strong>' . $alum->mod_user . '</strong>
                    </div>
                    ';
                    } elseif ($alum->tipo_mod == 3) {
                        $output .= ' <div class="bg-warning/20 text-warning rounded px-2 mt-1.5">
                       <strong>Actualizo certificados</strong> ' . $alum->mod_user . '</strong>
                    </div>';
                    }
                    $output .= '</td>
                    <td class="text-center">
                        <a  class="btn btn-rounded btn-primary-soft w-24 mr-1 mb-2" data-tw-toggle="modal"
                             data-tw-target="#modalcrearcertificado' . $alum->id . '"> Crear Certificado</a>
                    </td>
                    <td class="text-center">' . date($alum->created_at) . '</td>
                    <td class="table-report__action w-56">
                        <div class="flex items-center ">
                            <a class="flex items-center text-success mr-3"
                             href="' . route('alumnos.detalles', $alum->id) . '">
                             <i data-lucide="eyes-2" class="w-4 h-4 mr-1"></i> Detalles </a>

                            <a class="flex items-center mr-3" 
                            href="' . route('alumnos.edit', $alum->id) . '">
                                 <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>

                            <a class="flex items-center text-danger" data-tw-toggle="modal"
                             data-tw-target="#delete-confirmation-modal' . $alum->id . '">
                              <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                        ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="8">Ningun resultado</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    public function buscardni(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('buscar');
            if ($query != '') {
                $data = DB::table('alumnos')
                    ->where('dni', $query)
                    ->get();
            } else {
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                $resu = '<div class="text-danger mt-2">Ya existe un alumno con ese DNI</div>';
            } else {
                $resu = '<div class="text-success mt-2">Correcto</div';
            }
            $data = array(
                // 'table_data'  => $output,
                'total_dni'  => $resu
            );
            echo json_encode($data);
        }
    }
}

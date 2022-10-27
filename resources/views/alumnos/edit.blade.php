@extends('layouts.menu')
@section('content')
@include('alumnos.modal')
<div class="intro-y flex items-center mt-3">
    <a href="{{route('alumnos.index')}}" class="btn btn-primary-soft w-24 mr-1 mb-2">Atras</a>
    
</div>
<div class="intro-y flex items-center mt-3 mb-4">
    <h2 class="text-lg font-medium mr-auto">
        Editar de Alumno
    </h2>
</div>
@foreach($alumnos as $alum)

<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form action="{{route('editaralumno',$alum->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="modal-body grid grid-cols-12 gap-4">
               <div class="col-span-12 sm:col-span-4 input-form">
                    <label for="modal-form-1" class="form-label">Nombres</label>
                    <input id="validation-form-2" type="text" class="form-control form-control-rounded"
                    placeholder="Nombres" name="nombres" value="{{$alum->nombres}}">
                </div>
                <div class="col-span-12 sm:col-span-4 input-form">
                    <label for="modal-form-2" class="form-label">Apellidos</label>
                    <input id="modal-form-2" type="text" class="form-control form-control-rounded"
                     placeholder="Apellidos" name="apellidos" value="{{$alum->apellidos}}">
                </div>
                <div class="col-span-12 sm:col-span-4 input-form">
                    <label for="modal-form-1" class="form-label">DNI</label>
                    <input id="modal-form-1" type="number" class="form-control form-control-rounded"
                    placeholder="76232421" name="dni" value="{{$alum->dni}}">
                 </div>
                <div class="col-span-12 sm:col-span-3 input-form">
                    <label for="modal-form-2" class="form-label">Codigo de Certificado</label>
                    <input id="modal-form-2" type="text" class="form-control form-control-rounded"
                     placeholder="codigo_cer" name="codigo_cer" value="{{$alum->codigo_cer}}">
                </div>
                <div class="col-span-12 sm:col-span-3 input-form">
                    <label for="modal-form-1" class="form-label">Inicio de Clases</label>
                    <input id="modal-form-1" type="date" class="form-control form-control-rounded"
                   name="inicio" value="{{$alum->inicio}}">
                 </div>
                <div class="col-span-12 sm:col-span-3 input-form">
                    <label for="modal-form-2" class="form-label">Fin de Clases</label>
                    <input id="modal-form-2" type="date" class="form-control form-control-rounded"
                      name="final" value="{{$alum->final}}">
                </div>

                <div class="col-span-12 sm:col-span-3 input-form">
                    <label for="modal-form-1" class="form-label">Codigo de Curso</label>
                    <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                   name="codigo_cur" value="{{$alum->codigo_cur}}">
                 </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-2" class="form-label">Foto Perfil</label>
                    <input id="modal-form-2" type="file" class="form-control form-control-rounded"
                      name="image" accept="image/*" value="{{$alum->nombres}}">

                      <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <img  class="rounded-full" src="/images-cer/{{$alum->image}}" />
                        <div class="absolute mb-1 mr-1 flex items-center
                         justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                           </div>
                    </div>
                </div>
                {{-- Galeria --}}
               
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-2" class="form-label">Foto certificados</label>
                    <input id="modal-form-2" type="file" class="form-control form-control-rounded"
                      name="images[]" multiple accept="image/*">
                     
                <div class="mx-6 pb-8 mt-3">
                <div class="responsive-mode">
                    @if ($alum->alumnoImages)
                        
                    @foreach ($alum->alumnoImages as $img)
                    <div class="h-32 px-2">
                        <div class="h-full bg-slate-100 dark:bg-darkmode-400 rounded-md">
                            <img src="/{{$img->image}}" />
                            {{-- <a href="{{}}">Eliminar</a> --}}
                        </div>
                    </div>
                    @endforeach
                    @else
                    @endif
                </div>
                </div>
                </div>
            </div>
               {{-- fin galeria --}}
                <div class="col-span-12 sm:col-span-6">
                <input id="modal-form-2" type="hidden" value="{{Auth::user()->name}}" name="mod_user">
                <input id="modal-form-2" type="hidden" value="1" name="tipo_mod">

            </div>
             <!-- END: Modal Body -->

           

            <div class="modal-footer">
                {{-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                 w-20 mr-1">Cancel</button> --}}
                 <button type="submit" class="btn btn-primary w-20">Actualizar</button>
               </div> <!-- END: Modal Footer -->

            </form>
    </div>
</div>
@endforeach
<!-- END: Profile Info -->
@endsection
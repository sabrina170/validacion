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
                
            </div>
               {{-- fin galeria --}}
                <div class="col-span-12 sm:col-span-6">
                <input id="modal-form-2" type="hidden" value="{{Auth::user()->name}}" name="mod_user">
                <input id="modal-form-2" type="hidden" value="1" name="tipo_mod">
                
            </div>
            
          

            <div class="modal-footer">
                {{-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                 w-20 mr-1">Cancel</button> --}}
                 <button type="submit" class="btn btn-primary w-20">Actualizar</button>
               </div> <!-- END: Modal Footer -->

            </form>
             {{-- certificados --}}
           <div class="text-center">
           @foreach($certificados as $cer)  
                         <a href="javascript:;" data-tw-toggle="modal"
                          data-tw-target="#editar-certi{{$cer->id}}" class="btn btn-primary">Certificado - <strong>{{ $cer->codigo_cer}}</strong></a>
           @include("alumnos.modal-edit-certi")
           @endforeach
            </div> 
            {{-- fin de los certificados --}}
    </div>
</div>
@endforeach
<!-- END: Profile Info -->
@endsection
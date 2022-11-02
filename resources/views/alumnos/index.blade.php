@extends('layouts.menu')
@section('content')
@include('alumnos.modal')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Alumnos
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" 
        data-tw-target="#large-modal-size-preview">Crear nuevo Alumno</a>
     
    </div>

    @if (Session::has('message'))
    <div class="alert alert-success-soft show flex items-center mb-2" role="alert">
         <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::has('message')}} </div>
    @endif
    
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <div class="overflow-x-auto">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    {{-- <th class="whitespace-nowrap">ID</th> --}}
                    <th class="text-center whitespace-nowrap">Foto Perfil</th>
                    <th class="whitespace-nowrap">Nombres</th>
                    <th class="text-center whitespace-nowrap">Apellidos</th>
                    <th class="text-center whitespace-nowrap">DNI</th>
                    <th class="text-center whitespace-nowrap">Cod. Certificado</th>
                    <th class="text-center whitespace-nowrap">Inicio Clases</th>
                    <th class="text-center whitespace-nowrap">Fin Clases</th>
                    <th class="text-center whitespace-nowrap">Modificado</th>
                    <th class="text-center whitespace-nowrap">Cod. Curso</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alum)
                <tr class="intro-x">
                    {{-- <td>{{$alum->id}}</td> --}}
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                {{-- src="{{asset('images-cer/'.$alum->image.'')}} --}}
                                <img class="tooltip rounded-full" src="/images-cer/{{$alum->image}}" title="Certificado">
                            </div> 
                        </div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $alum->nombres}}</a> 
                    </td>
                    <td class="text-center">{{ $alum->apellidos}}</td>
                    <td class="text-center">{{ $alum->dni}}</td>
                    <td class="text-center">{{ $alum->codigo_cer}}</td>
                    <td class="text-center">{{ $alum->inicio}}</td>
                    <td class="text-center">{{ $alum->final}}</td>
                <td>
                    @if ($alum->tipo_mod==1)
                   
                    <div class="bg-success/20 text-success rounded px-2 mt-1.5">
                     <strong>Registrado</strong> por <strong>{{$alum->mod_user}}</strong>
                    </div>
                    @elseif ($alum->tipo_mod==2)
                    <div class="bg-warning/20 text-warning rounded px-2 mt-1.5">
                       <strong>Actualizado</strong> por <strong>{{$alum->mod_user}}</strong>
                    </div>
                    @endif</td>
                    <td class="text-center">{{ $alum->codigo_cur}}</td>
                    <td class="table-report__action w-56">
                        <div class="flex items-center ">
                            <a class="flex items-center text-success mr-3"
                             href="{{route('alumnos.detalles',$alum->id)}}">
                             <i data-lucide="eyes-2" class="w-4 h-4 mr-1"></i> Detalles </a>

                            <a class="flex items-center mr-3" 
                            href="{{route('alumnos.edit',$alum->id)}}">
                                 <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>

                            <a class="flex items-center text-danger" data-tw-toggle="modal"
                             data-tw-target="#delete-confirmation-modal{{$alum->id}}">
                              <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                @include("alumnos.modal-eli")

                @endforeach
                
            </tbody>
        </table>
        </div>
    </div>
    <!-- END: Data List -->
</div>

<!-- END: Profile Info -->
@endsection
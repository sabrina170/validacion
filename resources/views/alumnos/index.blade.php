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
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">Nombres</th>
                    <th class="text-center whitespace-nowrap">Apellidos</th>
                    <th class="text-center whitespace-nowrap">DNI</th>
                    <th class="text-center whitespace-nowrap">Cod. Certificado</th>
                    <th class="text-center whitespace-nowrap">Inicio Clases</th>
                    <th class="text-center whitespace-nowrap">Fin Clases</th>
                    <th class="text-center whitespace-nowrap">Foto Certificado</th>
                    <th class="text-center whitespace-nowrap">Cod. Curso</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alum)
                <tr class="intro-x">
                    <td>{{$alum->id}}</td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $alum->nombres}}</a> 
                    </td>
                    <td class="text-center">{{ $alum->apellidos}}</td>
                    <td class="text-center">{{ $alum->dni}}</td>
                    <td class="text-center">{{ $alum->codigo_cer}}</td>
                    <td class="text-center">{{ $alum->inicio}}</td>
                    <td class="text-center">{{ $alum->final}}</td>
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                {{-- src="{{asset('images-cer/'.$alum->image.'')}} --}}
                                <img class="tooltip rounded-full" src="/images-cer/{{$alum->image}}" title="Certificado">
                            </div> 
                        </div>
                    </td>
                    <td class="text-center">{{ $alum->codigo_cur}}</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
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
    <!-- END: Data List -->
</div>

<!-- END: Profile Info -->
@endsection
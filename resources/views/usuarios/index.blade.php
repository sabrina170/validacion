@extends('layouts.menu')
@section('content')
@include('usuarios.modal')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Usuarios
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
        data-tw-target="#large-modal-size-preview">Crear nuevo usuario</a>


    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <div class="overflow-x-auto">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">Usuario</th>
                    {{-- <th class="text-center whitespace-nowrap">Contraseña</th> --}}
                    <th class="text-center whitespace-nowrap">Contraseña</th>
                    <th class="text-center whitespace-nowrap">Tipo</th>

                    <th class="text-center whitespace-nowrap">Fecha</th>
                    <th class="text-center whitespace-nowrap">Modificado</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="intro-x">
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $user->email}}</a>
                    </td>
                    {{-- <td class="text-center">{{ $user->password}}</td> --}}
                    <td class="text-center">{{ $user->password_confirm}}</td>

                    <td class="text-center">{{ $user->created_at}}</td>
                    <td class="text-center">
                        @if ($user->hasRole('admin'))
                         <strong>Administrador</strong>
                        @elseif ($user->hasRole('estudiante'))
                           <strong>Estudiante</strong>
                        @elseif ($user->hasRole('trabajador'))
                           <strong>Trabajador</strong>
                        @endif
                    </td>
                    <td class="text-center">

                        @if ($user->tipo_mod==1)

                        <div class="bg-success/20 text-success rounded px-2 mt-1.5">
                         <strong>Registrado</strong> por <strong>{{$user->mod_user}}</strong>
                        </div>
                        @elseif ($user->tipo_mod==2)
                        <div class="bg-warning/20 text-warning rounded px-2 mt-1.5">
                           <strong>Actualizado</strong> por <strong>{{$user->mod_user}}</strong>
                        </div>
                        @endif
                    </td>

                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary" data-tw-toggle="modal"
                            data-tw-target="#edit-confirmation-modal{{$user->id}}">
                             <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-danger" data-tw-toggle="modal"
                             data-tw-target="#delete-confirmation-modal{{$user->id}}">
                              <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                @include("usuarios.modal-eli")
                @include("usuarios.modal-edi")
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    <!-- END: Data List -->
</div>

<!-- END: Profile Info -->
@endsection

@section('js')

@endsection

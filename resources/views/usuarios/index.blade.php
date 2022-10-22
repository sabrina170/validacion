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
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">Usuario</th>
                    <th class="text-center whitespace-nowrap">Contraseña</th>
                    <th class="text-center whitespace-nowrap">Id estudiante</th>
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
                    <td class="text-center">{{  $user->password}}</td>
                    <td class="text-center"></td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-danger" data-tw-toggle="modal"
                             data-tw-target="#delete-confirmation-modal{{$user->id}}">
                              <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                @include("usuarios.modal-eli")
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>

<!-- END: Profile Info -->
@endsection

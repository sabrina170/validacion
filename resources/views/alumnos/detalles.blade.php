@extends('layouts.menu')
@section('content')

<div class="intro-y flex items-center mt-8">
    <a href="{{route('alumnos.index')}}" class="btn btn-elevated-rounded-primary w-24 mr-1 mb-2">Atras</a>
    
</div>
<h2 class="text-lg font-medium text-center">
    Detalle del Alumno 
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach($alumnos as $alum)
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-12 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5 lg:mt-0">
            <div class="relative flex items-center p-5">
            
                <div class="ml-4 mr-auto">
                    <h2 class="font-medium text-base mr-auto"> Información Personal</h2> 
                    <div class="text-slate-500">Nombres: <strong>{{$alum->nombres}}</strong> </div>
                    <div class="text-slate-500">Apellidos: <strong>{{$alum->apellidos}}</strong></div>
                    <div class="text-slate-500">DNI:  <strong>{{$alum->dni}}</strong></div>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
    <!-- END: Profile Menu -->
    @foreach($certificados as $cer)  
    <div class="col-span-6 lg:col-span-6 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <div class="intro-y box col-span-12 2xl:col-span-8">
                <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Certificado: <strong>{{$cer->codigo_cer}}</strong><br>
                        Codigo Curso: <strong>{{$cer->codigo_cur}}</strong><br>
                        Fecha: Inicio: <strong>{{$cer->inicio}}</strong> / Final:<strong>{{$cer->final}}</strong><br>
                    </h2>
                </div>
                <div class="mx-6 pb-8">
                    <div class="fade-mode"> 
                        @foreach($certificados_imagenes as $cerima)  
                        @if ($cer->id==$cerima->cer_id)
                        <div class="h-64 px-2">
                            <div class="h-full image-fit rounded-md overflow-hidden"> 
                               <img src="/{{$cerima->image}}" />
                            </div> 
                           </div>
                        @else
                            
                        @endif
                            
                        @endforeach
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
    @endforeach
    
</div>


<!-- END: Profile Info -->
@endsection
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
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5 lg:mt-0">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="/images-cer/{{$alum->image}}">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{$alum->nombres}}</div>
                    <div class="text-slate-500">{{$alum->apellidos}}</div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box col-span-12 2xl:col-span-4">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                       Información Personal
                    </h2>
                      </div>
                <div class="p-5">
                    <div class="relative flex items-center">
                        
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Dni :</a> 
                            <div class="text-slate-500 mr-5 sm:mr-5">{{$alum->dni}}</div>
                        </div>
                        
                    </div>
                    <div class="relative flex items-center mt-5">
                        
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Codigo Certificado</a> 
                            <div class="text-slate-500 mr-5 sm:mr-5">{{$alum->codigo_cer}}</div>
                        </div>
                        
                    </div>
                    <div class="relative flex items-center mt-5">
                        
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Fechas Inicio Clases</a> 
                            <div class="text-slate-500 mr-5 sm:mr-5">{{$alum->inicio}}</div>
                        </div>
                        
                    </div>
                    <div class="relative flex items-center mt-5">
                        
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Fechas Fin Clases</a> 
                            <div class="text-slate-500 mr-5 sm:mr-5">{{$alum->final}}</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
            <!-- END: Daily Sales -->
            <!-- BEGIN: Announcement -->
            <div class="intro-y box col-span-12 2xl:col-span-8">
                <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Certificados
                    </h2>
                  </div>
                  <div class="mx-6 pb-8">
                     <div class="fade-mode"> 
                        @foreach($certificados as $cer)  
                            <div class="h-64 px-2">
                             <div class="h-full image-fit rounded-md overflow-hidden"> 
                                <img src="/{{$cer->image}}" />
                             </div> 
                            </div>
                        @endforeach
                                 </div> 
                            </div> 

        </div>
            <!-- END: Announcement -->
         
        </div>
    </div>
    
</div>


<!-- END: Profile Info -->
@endsection
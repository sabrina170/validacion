<div id="editar-certi{{$cer->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-gl">
        <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Editar de Certificado</h2>
            </div> <!-- END: Modal Header -->
          
            <form action="{{route('actualizarcertificado',$cer->id)}}" method="post" enctype="multipart/form-data" >
                @method('put')
                @csrf
                
                <div class="modal-body grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-1" class="form-label">Codigo de Curso</label>
                        <input id="nombre1" type="text" class="form-control form-control-rounded"
                       name="codigo_cur" value="{{$cer->codigo_cur}}" required>
                     </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-2" class="form-label">Codigo de Certificado</label>
                        <input id="nombre2" type="text" class="form-control form-control-rounded"
                         placeholder="codigo_cer" name="codigo_cer" value="{{$cer->codigo_cer}}" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-1" class="form-label">Inicio de Clases</label>
                        <input id="modal-form-1" type="date" class="form-control form-control-rounded"
                       name="inicio" value="{{$cer->inicio}}" required>
                     </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-2" class="form-label">Fin de Clases</label>
                        <input id="modal-form-2" type="date" class="form-control form-control-rounded"
                          name="final" value="{{$cer->final}}" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Foto certificados</label>
                        <input id="modal-form-2" type="file" class="form-control form-control-rounded"
                          name="images[]" multiple accept="image/*">
                    </div>
                    
                </div>
                   {{-- fin galeria --}}
                    <div class="col-span-12 sm:col-span-6">
                    <input id="modal-form-2" type="hidden" value="{{$alum->id}}" name="alumno_id">
                    <input id="modal-form-2" type="hidden" value="{{$cer->id}}" name="cer_id">
                </div>
                 <!-- END: Modal Body -->
                 <div class="mx-6 pb-8">
                    <div class="fade-mode"> 
                        @foreach($certificados_imagenes as $cerima)  
                        @if ($cer->id==$cerima->cer_id)
                       
                        <div class="h-24 px-2">
                            <div class="h-full image-fit rounded-md overflow-hidden"> 
                                <input type="hidden" value="{{$cerima->id}}"  name="certis[]">
                               <img src="/{{$cerima->image}}" />
                            </div> 
                        </div>
                        @else
                            
                        @endif
                            
                        @endforeach
                    </div> 
                </div> 
              
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                     w-20 mr-1">Cancel</button>
                     <button type="submit" class="btn btn-primary w-20">Actualizar</button>
                   </div> <!-- END: Modal Footer -->

                </form>
        </div>
    </div>
</div>

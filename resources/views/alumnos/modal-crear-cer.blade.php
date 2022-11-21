<div id="modalcrearcertificado{{$alum->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-gl">
        <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Registro de Certificado</h2>
            </div> <!-- END: Modal Header -->
          
            <form action="{{route('crearcertificado')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-1" class="form-label">Codigo de Curso</label>
                        <input id="nombre1" type="text" class="form-control form-control-rounded"
                       name="codigo_cur" required>
                     </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-2" class="form-label">Codigo de Certificado</label>
                        <input id="nombre2" type="text" class="form-control form-control-rounded"
                         placeholder="codigo_cer" name="codigo_cer" value="-{{$alum->dni}}" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-1" class="form-label">Inicio de Clases</label>
                        <input id="modal-form-1" type="date" class="form-control form-control-rounded"
                       name="inicio" required>
                     </div>
                    <div class="col-span-12 sm:col-span-6 input-form">
                        <label for="modal-form-2" class="form-label">Fin de Clases</label>
                        <input id="modal-form-2" type="date" class="form-control form-control-rounded"
                          name="final" required>
                    </div>
                    {{-- Galeria --}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Foto certificados</label>
                        <input id="modal-form-2" type="file" class="form-control form-control-rounded"
                          name="images[]" multiple accept="image/*" required>
                    </div>
                </div>
                   {{-- fin galeria --}}
                    <div class="col-span-12 sm:col-span-6">
                    <input id="modal-form-2" type="hidden" value="{{$alum->id}}" name="alumno_id">
                    {{-- <input id="modal-form-2" type="hidden" value="1" name="tipo_mod"> --}}
                </div>
                 <!-- END: Modal Body -->

                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                     w-20 mr-1">Cancel</button>
                     <button type="submit" class="btn btn-primary w-20">Crear</button>
                   </div> <!-- END: Modal Footer -->

                </form>
        </div>
    </div>
</div>

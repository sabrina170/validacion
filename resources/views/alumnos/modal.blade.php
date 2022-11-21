<div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Registro de Alumnos</h2>
            </div> <!-- END: Modal Header -->
            <ul class="nav nav-tabs" role="tablist">
                <li id="example-1-tab" class="nav-item flex-1" role="presentation">
                     <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-1" type="button" role="tab" aria-controls="example-tab-1" aria-selected="true"> Datos</button> </li>
                <li id="example-2-tab" class="nav-item flex-1" role="presentation">
                     <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-2" type="button" role="tab" aria-controls="example-tab-2" aria-selected="false"> Certificado</button> </li>
            </ul>
           
            <form action="{{route('crearalumno')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content border-l border-r border-b">
                    <div id="example-tab-1" class="tab-pane leading-relaxed p-2 active" role="tabpanel"
                     aria-labelledby="example-1-tab">
                     <div class="modal-body grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 input-form">
                             <label for="modal-form-1" class="form-label">Nombres</label>
                             <input id="validation-form-2" type="text" class="form-control form-control-rounded"
                             placeholder="Nombres" name="nombres" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12 input-form">
                             <label for="modal-form-2" class="form-label">Apellidos</label>
                             <input id="modal-form-2" type="text" class="form-control form-control-rounded"
                              placeholder="Apellidos" name="apellidos" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12 input-form">
                             <label for="modal-form-1" class="form-label">DNI</label>
                             <input id="modal-form-1" type="number" class="form-control form-control-rounded"
                             placeholder="76232421" name="dni" required>
                          </div>
                         
                         <div class="col-span-12 sm:col-span-12">
                             <h2><strong>Credenciales del alumno</strong></h2>
                             <label for="modal-form-2" class="form-label">Email (Usuario)</label>
                             <input id="modal-form-2" type="email" class="form-control form-control-rounded"
                             placeholder="email@gmail.com" name="email" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12">
                             <label for="modal-form-1" class="form-label">Contraseña</label>
                             <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                             placeholder="**********" name="password" required>
                         </div>
                        {{-- fin galeria --}}
                         <div class="col-span-12 sm:col-span-6">
                         <input id="modal-form-2" type="hidden" value="{{Auth::user()->name}}" name="mod_user">
                         <input id="modal-form-2" type="hidden" value="1" name="tipo_mod">
                     </div>
                     </div>
                    </div>
                    <div id="example-tab-2" class="tab-pane leading-relaxed p-5" role="tabpanel" 
                    aria-labelledby="example-2-tab"> 
                    <div class="modal-body grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6 input-form">
                            <label for="modal-form-1" class="form-label">Codigo de Curso</label>
                            <input id="nombre1" type="text" class="form-control form-control-rounded"
                           name="codigo_cur" required>
                         </div>
                        <div class="col-span-12 sm:col-span-6 input-form">
                            <label for="modal-form-2" class="form-label">Codigo de Certificado</label>
                            <input id="nombre2" type="text" class="form-control form-control-rounded"
                             placeholder="codigo_cer" name="codigo_cer" required>
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
                    </div>
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                     w-20 mr-1">Cancel</button>
                     <button type="submit" class="btn btn-primary w-20">Crear</button>
                   </div> <!-- END: Modal Footer -->

                </form>
        </div>
    </div>
</div>

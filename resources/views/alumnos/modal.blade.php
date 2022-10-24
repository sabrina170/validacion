<div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Registro de Alumnos</h2>
            </div> <!-- END: Modal Header -->
          @if($errors->any())

              @foreach($errors->all() as $error)
              <div class="alert alert-outline-danger alert-dismissible
             show flex items-center mb-2" role="alert">
              <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i>
              {{$error}}
              <button type="button" class="btn-close" data-tw-dismiss="alert"
                aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
              @endforeach


@endif
            <form action="{{route('crearalumno')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Nombres</label>
                        <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                        placeholder="Nombres" name="nombres">
                     </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Apellidos</label>
                        <input id="modal-form-2" type="text" class="form-control form-control-rounded"
                         placeholder="Apellidos" name="apellidos">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">DNI</label>
                        <input id="modal-form-1" type="number" class="form-control form-control-rounded"
                        placeholder="76232421" name="dni">
                     </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Codigo de Certificado</label>
                        <input id="modal-form-2" type="text" class="form-control form-control-rounded"
                         placeholder="codigo_cer" name="codigo_cer">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Inicio de Clases</label>
                        <input id="modal-form-1" type="date" class="form-control form-control-rounded"
                       name="inicio">
                     </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Fin de Clases</label>
                        <input id="modal-form-2" type="date" class="form-control form-control-rounded"
                          name="final">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Codigo de Curso</label>
                        <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                       name="codigo_cur">
                     </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Imagen Certificado</label>
                        <input id="modal-form-2" type="file" class="form-control form-control-rounded"
                          name="image">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                    <input id="modal-form-2" type="hidden" value="{{Auth::user()->name}}" name="mod_user">
                    <input id="modal-form-2" type="hidden" value="1" name="tipo_mod">
                </div>

                </div> <!-- END: Modal Body -->

                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                     w-20 mr-1">Cancel</button>
                     <button type="submit" class="btn btn-primary w-20">Crear</button>
                   </div> <!-- END: Modal Footer -->

                </form>
        </div>
    </div>
</div>

<div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Registro de Usuarios</h2>
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
        <form  method="POST" action="{{route('validar-registro')}}">
            @csrf
                <div class="modal-body grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Nombres</label>
                        <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                        placeholder="Nombres" name="name">
                     </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Email (Usuario)</label>
                        <input id="modal-form-2" type="email" class="form-control form-control-rounded"
                         placeholder="email@gmail.com" name="email">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Contraseña</label>
                        <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                        placeholder="**********" name="Password">
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

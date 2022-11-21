<!-- BEGIN: Delete Confirmation Modal -->
<div id="edit-confirmation-modal{{$user->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <form action="{{route('editaruser')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="modal-body grid grid-cols-12 gap-4">
                       
                         <div class="col-span-12 sm:col-span-12">
                            <h2><strong>Credenciales del Usuario</strong></h2>
                            <label for="modal-form-2" class="form-label">Email (Usuario)</label>
                            <input id="modal-form-2" type="email" class="form-control form-control-rounded"
                            value="{{$user->email}}" name="email" required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Contraseña</label>
                            <input id="modal-form-1" type="text" class="form-control form-control-rounded"
                            value="{{$user->password_confirm}}" name="password_confirm" required>
                        </div>
                    </div>
                       {{-- fin galeria --}}
                        <div class="col-span-12 sm:col-span-6">
                        <input id="modal-form-2" type="hidden" value="{{Auth::user()->name}}" name="mod_user">
                        <input id="modal-form-2" type="hidden" value="2" name="tipo_mod">
                        <input id="modal-form-2" type="hidden" value="{{$user->id}}" name="id">

                        
                    </div>
                    
                     {{-- certificados --}}
                   <div class="text-center">
                  
                   <div class="modal-footer">
                    {{-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary
                     w-20 mr-1">Cancel</button> --}}
                     <button type="submit" class="btn btn-primary w-20">Actualizar</button>
                   </div> <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

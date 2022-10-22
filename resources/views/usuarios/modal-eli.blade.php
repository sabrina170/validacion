<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal{{$user->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Estas seguro?</div>
                    <div class="text-slate-500 mt-2">¿Realmente desea eliminar este registro?
                        <br>Este proceso no se puede deshacer.</div>
                    </div>
                </div>
                <form action="{{route('usuario.delete',$user->id)}}" method="post">
                    @method('delete')
                    @csrf
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-danger w-24">Eliminar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

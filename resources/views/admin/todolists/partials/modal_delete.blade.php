<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal{{ $todolist->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header bg-color-yellow border-0">
          <h3 class="modal-title  font-archivo color-grey shadow-purple" id="exampleModalLabel">Conferma eliminazione </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-color-yellow border-0">
            <h3 id="costum-message" class="font-archivo color-purple shadow-purple">Sei sicuro di voler eliminare la to-do list "{{$todolist->title}}"?</h3>   
        </div>
        
        <div class="modal-footer bg-color-yellow border-0">
            <button type="button" class="btn btn-chiudi font-archivo" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{route('admin.todolists.destroy', ['todolist'=> $todolist->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-modal-elimina delete-modale font-archivo btn-elimina">Elimina</button>
            </form>
        </div>
      </div>
    </div>
  </div>
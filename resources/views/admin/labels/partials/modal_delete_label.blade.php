<!-- Modal -->
<div class="modal fade mt-5" id="modalDeleteLabel{{ $label->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header bg-color-yellow border-0">
            <h3 class="modal-title  font-archivo color-grey shadow-dark" id="exampleModalLabel">Eliminazione etichetta</h3>
          <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-color-yellow border-0">
            <h3 id="costum-message" class="font-archivo color-purple shadow-purple">Confermi di voler eliminare l'etichetta "{{$label->label_name}}"?</h3>   
        </div>
        
        <div class="modal-footer bg-color-yellow border-0">
            <button type="button" class="btn btn-chiudi-label font-archivo me-1" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{route('admin.labels.destroy', ['label'=> $label->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="ms-1 btn btn-elimina-label font-archivo">Elimina</button>
            </form>
        </div>
      </div>
    </div>
  </div>
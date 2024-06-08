<!-- Modal -->
<div class="modal fade " id="exampleModal{{ $training->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content bg-modal">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h3 id="costum-message">Confermi di voler eliminare il progetto {{$training->title}}?</h3>
            
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn aggiungi-button" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{route('admin.trainings.destroy', ['training'=> $training->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-modal-elimina delete-modale">Elimina</button>
            </form>
        </div>
      </div>
    </div>
  </div>
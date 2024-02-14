

<!-- Large Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Modifier les détails de la demande</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5 m-5">
        <!-- Form inside the modal -->
        <form>
          <div class="form-group">
            <label for="startDate">Date de début:</label>
            <input type="date" class="form-control" id="startDate" readonly>
          </div>
          <div class="form-group">
            <label for="endDate">Date de fin:</label>
            <input type="date" class="form-control" id="endDate" readonly>
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" readonly>
          </div>
          <div class="form-group">
            <label for="commentaire">Commentaire:</label>
            <textarea class="form-control" id="commentaire" rows="3" readonly></textarea>
          </div>
          <button type="button" class="btn btn-primary mt-3" id="SaveBtn" disabled>Enregistrer</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- Buttons in the modal footer -->
      
       
        <button type="button" class="btn btn-warning" id="UpdateBtn">Modifier</button>
        <button type="button" class="btn btn-success" id="contacterFournisseurBtn">Contacter Fournisseur</button>
        <button type="button" class="btn btn-info" id="contacterAdminBtn">Contacter Administrateur</button>
        <button type="button" class="btn btn-warning" id="ReviewBtn">Ajouter avis</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer la demande</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraimment supprimer cette demande de service ?
      </div>
      <div class="modal-footer">
       
        <button type="button" id="delete-request-btn" class="btn btn-primary">Confirmer</button>
      </div>
    </div>
  </div>
</div>
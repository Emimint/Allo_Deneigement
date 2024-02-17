

<!-- Large Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">User Details Form</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <?php foreach ($user_list as $item): ?>
            <div class="form-group">
              <label for="userId<?= $item->getIdUtilisateur(); ?>">User ID</label>
              <input type="text" class="form-control" id="userId<?= $item->getIdUtilisateur(); ?>" value="<?= $item->getIdUtilisateur(); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="userEmail<?= $item->getIdUtilisateur(); ?>">Email</label>
              <input type="text" class="form-control" id="userEmail<?= $item->getIdUtilisateur(); ?>" value="<?= $item->getEmail(); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="userName<?= $item->getIdUtilisateur(); ?>">Name</label>
              <input type="text" class="form-control" id="userName<?= $item->getIdUtilisateur(); ?>" value="<?= $item->getNom(); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="userSurname<?= $item->getIdUtilisateur(); ?>">Surname</label>
              <input type="text" class="form-control" id="userSurname<?= $item->getIdUtilisateur(); ?>" value="<?= $item->getPrenom(); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="userPhone<?= $item->getIdUtilisateur(); ?>">Telephone</label>
              <input type="text" class="form-control" id="userPhone<?= $item->getIdUtilisateur(); ?>" value="<?= $item->getTelephone(); ?>" readonly>
            </div>
          
           
          <?php endforeach; ?>
        </form>
      </div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-success" data-dismiss="modal" id="acceptBtn">Accepter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="declineBtn">Refuser</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" name="updateStatus" id="completeBtn">Completer</button>
      </div>
    </div>
  </div>
</div>




<div class="my-5">
    <table id="showData1" class="table table-striped nowrap table-hover">
        <thead>
        <tr class="sticky">
            <th>Id</th>
            <th>Service</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>Status</th>
           <th>Commentaire</th>
            <th>Details</th>
            
        </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>
</div>
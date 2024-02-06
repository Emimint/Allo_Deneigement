<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>





<style>
    #example_wrapper{ 
        padding: 2em 0em;
        font-size: 0.7em;
    }

    #reg-modal{
        font-size: 0.7em;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--form-->

        <!--form-ends-->
      </div>
        <div id="">

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateBtn">Modifier</button>
        <button type="button" class="btn btn-primary" id="deleteBtn">Supprimer</button>
        <button type="button" class="btn btn-primary" id="CancelBtn">Annuler</button>
        
      </div>
    </div>
  </div>
</div>

<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Service</th>
                <th>Date de fin</th>
                <th>Date de debut </th>
                <th>Status</th>
                <th>Adresse</th>
                <th>Fournisseur</th>
                <th>Action</th>
                
                
            </tr>
        </thead>
        <tbody id="tableBody">
           
        </tbody>
        <tfoot>
            <tr>
            <th>Offre de service</th>
                <th>Date de fin</th>
                <th>Date de debut </th>
                <th>Status</th>
                <th>Adresse</th>
                <th>Fournisseur</th>
               
            </tr>
        </tfoot>
    </table>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL;?>/static/scripts/load-table.js"></script> 







<script src="<?php echo BASE_URL;?>/static/scripts/service-request-details.js"></script> 

</body>
</html>


<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>

<!--review Modal-->
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
              <form action="" method="POST">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>

                    <!-- Hidden input to store the rating value -->
                     <input type="hidden" name="score" id="score" value="0">
	        	
                <div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="review-comment" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="submit" name="AddReview" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
                </form>
	      	</div>
    	</div>
  	</div>
</div>

    <!-- Warning Modal -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="warningModalLabel">Warning!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer la demande?</p>
                </div>
                <div class="modal-footer">
                   <form method="POST">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="deleteRequest" class="btn btn-warning">Supprimer</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
<!--end review Modal-->
<div class="step step-4 m-2">
    <form action="" method="POST">

   

<div class="mb-3 recapitulatif m-5">
            <label class="h2 fw-bold" for="field4" class="form-label">Recapitulatif de votre commande</label>
           
            <div class="container mt-3 p-6">
                <h2>Votre service</h2>
                <ul class="list-group">
                <?php $offre = $controleur->getOffreAssocies()?>
                    <input class="list-group-item" disabled value="<?php echo $offre->getDescription()?>"></input>
                </ul>
                <?php  
    if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] == "utilisateur") {
        echo '<h2>Votre fournisseur</h2>
              <ul class="list-group">
                  <input disabled class="list-group-item"  value="'.$controleur->getFournisseursAssocies().'">
              </ul>';
    }
?>
               
                <h2>Adresse de livraison</h2>
                <ul class="list-group">
                <?php
        
        $addresses = $controleur->getlisteAddresseUtilisateur();

        foreach ($addresses as $adresse) {
            echo '<li class="list-group-item">';
            echo '' . $adresse->getIdAdresse() . ',';
            echo ' ' . $adresse->getNomRue().',';
            echo ' ' . $adresse->getVille() . ',';
           
            echo ' ' . $adresse->getPays() . ',';
            echo '' . $adresse->getCodePostal();
            echo '</li>';
        }
    ?>
</ul>

                </ul>
                  <!--info utilisateur-->
                <?php  if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte'] == "fournisseur"){
                     echo ' <h2>Info Demandeur</h2>
                     <div>
                     <ul class="list-group mt-3 mb-3">';
                         
           
                     $user = $controleur->getUtilisateurAssocie();
     
           
                 echo '<li class="list-group-item">';
                 echo '<strong>Nom:</strong> ' . $user->getNom() . '<br>';
                 echo '<strong>Prenom:</strong> ' . $user->getPrenom(). '<br>';
                 echo '<strong>courriel:</strong> ' . $user->getEmail() . '<br>';
                 echo '<strong>telephone:</strong> ' . $user->getTelephone() . '<br>';
                 echo '</li>
       
                                 </ul>
                     </div>';
                }
               
            ?>
              
                
                <h2>Facturation</h2>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Service</th>
                                <th scope="col">[Litrage/Tonnage/ect...]</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              
                                <th scope="row"><?php echo $offre->getDescription()?></th>
                                <td>[moins dune tonne]</td>
                                <td><?php echo $offre->getPrixUnitaire()?></td>
                                <td><?php echo $offre->getPrixUnitaire()?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3">
           
    <div class="mb-3">
       
        <label for="commentaire-soumission" class="form-label">Commentaires</label>
        <textarea name="commentaire" class="form-control" id="commentaire-soumission" rows="3"><?php echo $controleur->getCommentaire()?></textarea>
    </div>


               
            </div>

            <?php
            $status = $controleur->getStatus();
            $user =  $_SESSION['utilisateurConnecte'];


            
            if($user=="utilisateur"){ 
            switch ($status) {
                case 'En attente':
                    // Handle pending status
                    echo '<button type="submit" id="UpdateBtn" name="updateComment" class="btn btn-danger m-2 prev-step">modifer</button>';
                    echo '<button type="button" id="DeleteBtn" name="deleteRequest" data-bs-toggle="modal" data-bs-target="#warningModal"  class="btn btn-danger m-2 prev-step">Supprimer</button>';
                    break;
            
                case 'Acceptée':
                    // Handle accepted status
                    echo '   <button type="button" class="btn btn-danger m-2 prev-step">Contacter fournisseur</button>
                    <button type="submit" class="btn btn-danger m-2">Contacter administreur</button>';
                    break;
           
                 case 'Complétée':
                        // Handle completed status
                    echo ' <button type="button" id="add-review-btn"  data-bs-toggle="modal" data-bs-target="#review_modal"  class="btn btn-danger m-2 prev-step" >ajouter un avis</button>';
                    break;
                case 'Refusée':
                    echo '<button type="button" id="DeleteBtn" name="deleteRequest" data-bs-toggle="modal" data-bs-target="#warningModal"  class="btn btn-danger m-2 prev-step">Supprimer</button>';
                default:
                   
                    echo '';
                    break;
            }}else{

                switch ($status) {
                    case 'En attente':
                        echo '<button type="submit" name="acceptRequest" class="btn btn-success m-2">Accepter</button>';
                        echo '<button type="submit" name="cancelRequest" class="btn btn-danger m-2">Refuser</button>';
                       
                        break;
                     
                    case 'Acceptée':
                        echo '<button type="submit" name="completeRequest" class="btn btn-success m-2">Completer</button>';
                        break;

                    case 'Refusée':
                        echo '<button type="button" id="DeleteBtn" name="deleteRequest" data-bs-toggle="modal" data-bs-target="#warningModal"  class="btn btn-danger m-2 prev-step">Supprimer</button>';
                        break;
   
                    default:
                       
                      
                        break;
                }
            }
           
            
            ?>
           
         
        
        </div>
    </form>
</div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
    <script src="<?php echo DOSSIER_VIEWS; ?>\static\scripts\review-system-script.js"></script>
    <script>
document.getElementById('updateBtn').addEventListener('click', function() {
    // Get the comment value
    var newComment = document.getElementById('commentaire').value;

    // Make an AJAX request
    fetch('details-demande.class.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'updateComment=true&commentaire=' + encodeURIComponent(newComment),
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data
        console.log(data.result);
        // You can update the UI or perform other actions based on the response
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle errors
    });
});
</script>
    </body>

    </html>
    
   



  
   




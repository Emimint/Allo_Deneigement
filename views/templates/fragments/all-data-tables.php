
<?php
function getFournisseurData($arrayOfFournisseurs){
?>

<form action="?action=afficherDashboardAdmin" method="POST">
<table class="table">
    <thead>
        <tr>
            <th scope="col">id_fournisseur</th>
            <th scope="col">email</th>
            <th scope="col">nom_de_la_compagnie</th>
            <th scope="col">nom_contact</th>
            <th scope="col">prenom_contact</th>
            <th scope="col">description</th>
            <th scope="col">telephone</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">url_photo</th>
            <th scope="col">note_globale</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $arrayOfFournisseurs contains objects with these properties

        foreach ($arrayOfFournisseurs as $fournisseur) {
            echo '<tr>';
            echo '<td><input type="text" name="id_fournisseur[]" value="' . $fournisseur->getIdFournisseur() . '" disabled /></td>';
            echo '<td><input type="text" name="email[]" value="' . $fournisseur->getEmail() . '" disabled /></td>';
            echo '<td><input type="text" name="nom_compagnie[]" value="' . $fournisseur->getNomDeLaCompagnie() . '" disabled /></td>';
            echo '<td><input type="text" name="nom_contact[]" value="' . $fournisseur->getNomContact() . '" disabled /></td>';
            echo '<td><input type="text" name="prenom_contact[]" value="' . $fournisseur->getPrenomContact() . '" disabled /></td>';
            echo '<td><input type="text" name="description[]" value="' . $fournisseur->getDescription() . '" disabled /></td>';
            echo '<td><input type="text" name="telephone[]" value="' . $fournisseur->getTelephone() . '" disabled /></td>';
            echo '<td><input type="text" name="username[]" value="' . $fournisseur->getUsername() . '" disabled /></td>';
            echo '<td><input type="text" name="password[]" value="' . $fournisseur->getPassword() . '" disabled /></td>';
            echo '<td><input type="text" name="url_photo[]" value="' . $fournisseur->getUrlPhoto() . '" disabled /></td>';
            echo '<td><input type="text" name="note_globale[]" value="' . $fournisseur->getNoteGlobale() . '" disabled /></td>';
            
         
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<!-- <button type="submit" name="submit">Submit</button> -->
</form>
<?php
}
?>

<?php
function getOffresdata($arrayOfServices){

    ?>
    
<form method="POST">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">id_service</th>
            <th scope="col">id_fournisseur</th>
            <th scope="col">prix_unitaire</th>
            <th scope="col">description</th>
            <th scope="col">type_clientele</th>
            <th scope="col">categorie</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $arrayOfServices contains objects with these properties

        foreach ($arrayOfServices as $service) {
            echo '<tr>';
            echo '<td><input type="text" value="' . $service->getIdOffre() . '" disabled></td>';
            echo '<td><input type="text" value="' . $service->getIdFournisseur() . '" disabled></td>';
            echo '<td><input type="text" value="' . $service->getPrixUnitaire() . '" disabled></td>';
            echo '<td><input type="text" value="' . $service->getDescription() . '" disabled></td>';
            echo '<td><input type="text" value="' . $service->getTypeClientele() . '" disabled></td>';
            echo '<td><input type="text" value="' . $service->getCategorie() . '" disabled></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<!-- <button type="submit" name="submit">Submit</button> -->
    </form>

<?php
}

function getReviewdata($arrayOfReviews){

?>
<form method="POST">
<table class="table">
    <thead>
        <tr>
            <th scope="col">id_review</th>
            <th scope="col">score</th>
            <th scope="col">commentaire</th>
            <th scope="col">id_utilisateur Ascending 1</th>
            <th scope="col">id_service</th>
            <th scope="col">date_commentaire</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $arrayOfReviews contains objects with these properties

        foreach ($arrayOfReviews as $review) {
            echo '<tr>';
            echo '<td><input type="text" value="' . $review->getIdReview() . '" disabled></td>';
            echo '<td><input type="text" value="' . $review->getScore() . '" disabled></td>';
            echo '<td><input type="text" value="' . $review->getCommentaire() . '" disabled></td>';
            echo '<td><input type="text" value="' . $review->getIdUtilisateur() . '" disabled></td>';
            echo '<td><input type="text" value="' . $review->getIdService() . '" disabled></td>';
            echo '<td><input type="text" value="' . $review->getDateCommentaire() . '" disabled></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<!-- <button type="submit" name="submit">Submit</button> -->
    </form>
<?php
}
function getBilletdata($arrayOfBillets ){

    ?>
    <form method="POST">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">id_billet</th>
            <th scope="col">motif</th>
            <th scope="col">texte</th>
            <th scope="col">date_billet</th>
            <th scope="col">email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $arrayOfBillets contains objects with these properties

        foreach ($arrayOfBillets as $billet) {
            echo '<tr>';
            echo '<td><input type="text" value="' . $billet->getIdBillet() . '" disabled></td>';
echo '<td><input type="text" value="' . $billet->getMotif() . '" disabled></td>';
echo '<td><input type="text" value="' . $billet->getTexte() . '" disabled></td>';
echo '<td><input type="text" value="' . $billet->getDateBillet() . '" disabled></td>';
echo '<td><input type="text" value="' . $billet->getEmail() . '" disabled></td>';

            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<!-- <button type="submit" name="submit">Submit</button> -->
    </form>
<?php
}
?>


<?php
function getUserdata($arrayOfUsers){
?>
<form method="post">
<table class="table">
    <thead>
        <tr>
            <th scope="col">id_utilisateur</th>
            <th scope="col">email</th>
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">telephone</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">url_photo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $arrayOfUsers contains objects with these properties

        foreach ($arrayOfUsers as $user) {
            echo '<tr>';
            echo '<td><input type="text" value="' . $user->getIdUtilisateur() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getEmail() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getNom() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getPrenom() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getTelephone() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getUsername() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getPassword() . '" disabled></td>';
            echo '<td><input type="text" value="' . $user->getUrlPhoto() . '" disabled></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<button type="submit" name="submit">Submit</button>
    </FORM>
    
<?php
};



function getRequestdata($arrayOfObjects){
?>

<FORM method="POST">
<table class="table">
    <thead>
        <tr>
            <th scope="col">idDemande</th>
            <th scope="col">dateDebut</th>
            <th scope="col">dateFin</th>
            <th scope="col">status</th>
            <th scope="col">commentaire</th>
            <th scope="col">idUtilisateur</th>
            <th scope="col">idFournisseur</th>
            <th scope="col">idReview</th>
            <th scope="col">idOffre</th>
            <th scope="col">idAdresse</th>
            <th scope="col">Submit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayOfObjects as $object) {
            echo '<tr>';

            echo '<td><input type="text" value="' . $object->getIdDemande() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getDateDebut() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getDateFin() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getStatus() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getCommentaire() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getIdUtilisateur() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getIdFournisseur() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getIdReview() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getIdOffre() . '" readonly></td>';
            echo '<td><input type="text" value="' . $object->getIdAdresse() . '" readonly></td>';
            

            // Add a submit button in the last column
            echo '<td><button type="submit" name="submit" id="submit">Submit</button></td>';

            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<!-- <button type="submit" name="submit">Submit</button> -->
    </FORM>

<?php
}

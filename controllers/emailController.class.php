<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/FournisseurDAO.class.php");

class EmailController extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnEnvoyer'])) {
           // The message
// $message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
// $message = wordwrap($message, 70, "\r\n");

// Send
              if(mail($_POST['email'], 'My Subject', $_POST['message'])){
                  flash('Succès', 'L\'e-mail a été envoyé avec succès.', FLASH_SUCCESS);
              }
           
            // $success = mail($to, $subject, $message, $headers);
            return "fournisseur";
            
            // if ($success) {
            //     flash('Succès', 'L\'e-mail a été envoyé avec succès.', FLASH_SUCCESS);
            // } else {
            //     flash('Erreur', 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.', FLASH_ERROR);
            // }
        }
        return "landing-page"; 
    }

}
?>

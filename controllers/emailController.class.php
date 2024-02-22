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
            $to = $_POST['email'];
            $subject = "Sujet de l'e-mail";
            $message = $_POST['testArea'];

            $headers = "From: votre@email.com\r\n";
            $headers .= "Reply-To: votre@email.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

           
            $success = mail($to, $subject, $message, $headers);

            
            if ($success) {
                flash('Succès', 'L\'e-mail a été envoyé avec succès.', FLASH_SUCCESS);
            } else {
                flash('Erreur', 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.', FLASH_ERROR);
            }
        }
        return "landing-page"; 
    }

}
?>

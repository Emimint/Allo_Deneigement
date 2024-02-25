<?php
include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "views/templates/commons/flash.php");
include_once(DOSSIER_BASE_INCLUDE . "models/DAO/BilletDAO.class.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class EmailController extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnEnvoyer'])) {
            try {
                // Récupérer les données du formulaire
                $motif = $_POST['selectionMenu'] ?? '';
                $texte = $_POST['info'] ?? '';
                $email = $_POST['email'] ?? ''; // Récupérer l'adresse e-mail spécifiée dans le formulaire

                // Insérer le billet dans la base de données
                $dateBillet = date('Y-m-d H:i:s'); // Récupérer la date actuelle
                $nouveauBillet = new Billet('', $motif, $texte, $dateBillet, $email);
                BilletDAO::inserer($nouveauBillet);

                // Configuration SMTP
                $mail = new PHPMailer();
                $mail->isSMTP(); 
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true; 
                $mail->Username = 'cyliaoudiai93@gmail.com'; // Votre adresse e-mail SMTP
                $mail->Password = 'dxad lsas bevn jogg'; // Mot de passe de votre adresse e-mail SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Chiffrement TLS
                $mail->Port = 587; // Port SMTP à 
                

                // Définir les destinataires et le contenu de l'e-mail
                $mail->setFrom('cyliaoudiai93@gmail.com', 'Votre Nom');
                $mail->addAddress($email, 'Destinataire'); 
                $mail->Subject = 'Sujet de l\'e-mail';
                $mail->Body = $texte; // Utiliser le texte spécifié dans le formulaire
                
               
                $mail->send();

               
                flash('succes', 'Votre message a été envoyé avec succès', FLASH_SUCCESS);

               
                return "landing-page";
            } catch (Exception $e) {
          
                flash('Erreur', 'Impossible d\'envoyer votre message. Veuillez vérifier vos informations.', FLASH_ERROR);
                return "Fournisseur";
            }
        } else {
         
            return "Fournisseur";
        }
    }
}
?>

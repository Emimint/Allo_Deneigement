<?php

class Administrateur {
   

    // Constructeur
    public function __construct($id, $nom, $prenom, $email, $password, $addresse, $telephone, $username, $photo_url) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->username = $username;
        $this->password = $password;
        $this->photo_ur = $photo_ur;
    }

   // fontion modier compte
    public function modifierCompte($idCompte, $nouveauUsername, $nouveauPrenom, $nouvelEmail, $nouveauPassword) {
        try {
              // requete SQL  de mise à jour
            $query = "UPDATE compte SET username = ?, prenom = ?, email = ?, password = ? WHERE id = ?";
            $statement = $this->connexion->prepare($query);
    
       
            $resultat = $statement->execute([$nouveauUsername, $nouveauPrenom, $nouvelEmail, $nouveauPassword, $idCompte]);
    
           
            if ($resultat) {
                return "Modification du compte réussie.";
            } else {
                return "Échec de la modification du compte.";
            }
        } catch (PDOException $e) {
        
            return "Erreur PDO : " . $e->getMessage();
        }
    }
    
     // fontion trouver compte
    public function trouverCompte($idCompte) {
        try{
         
            $query = "SELECT * FROM COMPTE WHERE id = ?";
            $statement = $this->connexion->prepare($query);
            
           
            $statement->execute([$idCompte]);

         
            $compte = $statement->fetch(PDO::FETCH_ASSOC);

         
            if ($compte) {
                return $compte; 
            } else {
                return null; 
            }
        } catch (PDOException $e) {
           
            return "Erreur PDO : " . $e->getMessage();
        }
          
            
        }
       
    }

     // fontion supprimer compte
    public function supprimerCompte($idCompte) {
       try{
       
         $query = "DELET FROM administrateur WHERE id = ?";
         $statement = $this->connexion->prepare($query);

         $statement->execute([$idCompte]);

         if($statement->rowCount()> 0){
            return "Le compte a ete supprime avec succes.";
         } else{
            
            return "Aucun compte trouve avec cette ID.";
         }

       }catch (PDOException $e) {
      
        return "Erreur PDO : " . $e->getMessage();
    }
       
    }

    // Méthodes pour gérer les offres de service

     // fontion ajouter offre
    public function ajouterOffre($offreService) {
       try{
        $query = "INSET INTO Offre_de_service (id_service, prix,description, type_clientele, categorie, type_facturation, fournisseur) VALUES(?,?,?,?,?,?) ";
        $statement = $this->connexion->prepare($query);

        $statement->execute([Offre_de_service->getId_service(), Offre_de_service->getNom(), Offre_de_service->getDescription(), Offre_de_service->getPrix(), Offre_de_service->getType_clientele(), Offre_de_service->getCategorie(), Offre_de_service->getType_facturation(),Offre_de_service->getFournisseur()]);

        if($statement->rowCount()> 0){
            return "Le compte a ete supprime avec succes.";
         } else{
            
            return "Aucun compte trouve avec cette ID.";
         }

       }catch (PDOException $e) {
      
        return "Erreur PDO : " . $e->getMessage();
    }
    }


     // fontion trouver offre
    public function trouverOffre($idOffre) {
        try {
            // Requête SQL SELECT pour récupérer les données de l'offre de service
            $query = "SELECT * FROM offres_service WHERE id = ?";
            $statement = $this->connexion->prepare($query);
    
           
            $statement->execute([$idOffre]);
    
           
            $offre = $statement->fetch(PDO::FETCH_ASSOC);
    
            
            return $offre ? $offre : null;
        } catch (PDOException $e) {
           
            return "Erreur PDO : " . $e->getMessage();
        }
    }
    
    // fontion supprimer offre
    public function supprimerOffre($idOffre) {
        try {
            
            $query = "DELETE FROM offres_service WHERE id = ?";
            $statement = $this->connexion->prepare($query);
    
          
            $statement->execute([$idOffre]);
    
          
            if ($statement->rowCount() > 0) {
                return "L'offre de service a été supprimée avec succès.";
            } else {
                return "Erreur : l'offre de service n'a pas pu être supprimée.";
            }
        } catch (PDOException $e) {
          
            return "Erreur PDO : " . $e->getMessage();
        }
    }
    

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

   
}

?>

CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone VARCHAR(20),
    username VARCHAR(50),
    mot_de_passe VARCHAR(255),
    url_photo VARCHAR(255),
    nom_companie VARCHAR(255),
    note_globale DECIMAL(5,2)
);

CREATE TABLE Adresse (
    id_adresse INT AUTO_INCREMENT PRIMARY KEY,
    code_postal VARCHAR(10),
    numero_civique VARCHAR(10),
    nom_rue VARCHAR(255),
    ville VARCHAR(255),
    username VARCHAR(50),
    pays VARCHAR(255),
    province VARCHAR(255),
    coordonnees POINT
);
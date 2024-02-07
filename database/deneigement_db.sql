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
    pays VARCHAR(255),
    province VARCHAR(255),
    coordonnees POINT,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Billet (
    id_billet INT AUTO_INCREMENT PRIMARY KEY,
    motif VARCHAR(255),
    texte TEXT,
    date_billet DATE,
    email VARCHAR(255)
);

CREATE TABLE Offre_de_service (
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    prix_unitaire DECIMAL(10,2),
    description TEXT,
    type_clientele ENUM('Résidentiel', 'Commercial'),
    categorie ENUM('entrée de garage', 'devant tempo', 'pelletage', 'épandage de sel', 'chaudière de sel', 'chargement de neige'),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Review (
    id_review INT AUTO_INCREMENT PRIMARY KEY,
    score INT CHECK(score >= 1 AND score <= 5),
    commentaire TEXT,
    id_utilisateur INT,
    id_service INT,
    date_commentaire DATE,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_service) REFERENCES Offre_de_service(id_service)
);

CREATE TABLE Demande_de_service (
    id_demande INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    status ENUM('Acceptee', 'Refusee', 'En attente', 'Completee'),
    commentaire TEXT,
    id_utilisateur INT,
    id_review INT,
    id_offre INT,
    id_adresse INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_review) REFERENCES Review(id_review),
    FOREIGN KEY (id_offre) REFERENCES Offre_de_service(id_service),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse)
);
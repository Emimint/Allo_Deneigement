CREATE DATABASE deneigement_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE deneigement_db;

CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone VARCHAR(20),
    username VARCHAR(50),
    mot_de_passe VARCHAR(255),
    url_photo VARCHAR(255),
    nom_companie VARCHAR(255),
    note_globale DECIMAL(5,2)
);

INSERT INTO Utilisateur (email, nom, prenom, telephone, username, mot_de_passe, url_photo, nom_companie, note_globale) VALUES
('utilisateur1@example.com', 'Doe', 'John', '1234567890', 'johndoe', 'motdepasse1', 'url_photo1.jpg', 'Compagnie1', 4.2),
('utilisateur2@example.com', 'Smith', 'Alice', '9876543210', 'alicesmith', 'motdepasse2', 'url_photo2.jpg', 'Compagnie2', 3.8),
('utilisateur3@example.com', 'Johnson', 'Michael', '5551234567', 'michaeljohnson', 'motdepasse3', 'url_photo3.jpg', NULL, NULL),
('utilisateur4@example.com', 'Brown', 'Emma', '4445556666', 'emmabrown', 'motdepasse4', 'url_photo4.jpg', NULL, NULL),
('utilisateur5@example.com', 'Wilson', 'David', '2223334444', 'davidwilson', 'motdepasse5', 'url_photo5.jpg', 'Compagnie3', 3.9);

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

INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, coordonnees, id_utilisateur) VALUES
('H1A 0A1', '123', 'Rue Saint-Jacques', 'Montreal', 'Canada', 'Quebec', POINT(45.514, -73.554), 1),
('H2B 2C3', '456', 'Avenue Laurier Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.523, -73.594), 2),
('H3C 3D5', '789', 'Rue Sainte-Catherine', 'Montreal', 'Canada', 'Quebec', POINT(45.505, -73.562), 3),
('H4E 4F7', '1011', 'Boulevard René-Lévesque Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.498, -73.572), 4),
('H5G 5H9', '1213', 'Rue Sherbrooke Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.507, -73.580), 5),
('H1H 6I2', '1415', 'Avenue Mont-Royal Est', 'Montreal', 'Canada', 'Quebec', POINT(45.532, -73.579), 1),
('H2J 7K4', '1617', 'Rue Saint-Denis', 'Montreal', 'Canada', 'Quebec', POINT(45.516, -73.562), 2),
('H3K 8L6', '1819', 'Avenue du Parc', 'Montreal', 'Canada', 'Quebec', POINT(45.507, -73.572), 3),
('H4L 9M8', '2021', 'Rue Peel', 'Montreal', 'Canada', 'Quebec', POINT(45.501, -73.575), 4),
('H5N 0P3', '2223', 'Rue Crescent', 'Montreal', 'Canada', 'Quebec', POINT(45.497, -73.579), 5);


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
    categorie ENUM('Entrée de garage', 'Devant tempo', 'Pelletage', 'Epandage de sel', 'Chaudière de sel', 'Chargement de neige'),
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
    status ENUM('Acceptée', 'Refusée', 'En attente', 'Completée'),
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

CREATE TABLE Fournisseur (
    id INT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    adresse INT,
    telephone VARCHAR(20),
    username VARCHAR(50),
    password VARCHAR(255),
    photo_url VARCHAR(255),
    nom_de_la_compagnie VARCHAR(255),
    note_globale INT,
    FOREIGN KEY (adresse) REFERENCES Adresse(id_adresse)
);


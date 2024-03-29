CREATE DATABASE deneigement_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE deneigement_db;

CREATE TABLE Adresse (
    id_adresse INT AUTO_INCREMENT PRIMARY KEY,
    code_postal VARCHAR(10) NOT NULL,
    numero_civique VARCHAR(10) NOT NULL,
    nom_rue VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    pays VARCHAR(255) NOT NULL,
    province VARCHAR(255) NOT NULL,
    latitude DECIMAL(8,6),
    longitude DECIMAL(9,6)
);


INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, latitude, longitude) VALUES
('H1A 0A1', '123', 'Rue Saint-Jacques', 'Montreal', 'Canada', 'Quebec', 45.514, -73.554),
('H2B 2C3', '456', 'Avenue Laurier Ouest', 'Montreal', 'Canada', 'Quebec', 45.523, -73.594),
('H3C 3D5', '789', 'Rue Sainte-Catherine', 'Montreal', 'Canada', 'Quebec', 45.505, -73.562),
('H4E 4F7', '1011', 'Boulevard René-Lévesque Ouest', 'Montreal', 'Canada', 'Quebec', 45.498, -73.572),
('H5G 5H9', '1213', 'Rue Sherbrooke Ouest', 'Montreal', 'Canada', 'Quebec', 45.507, -73.580),
('H1H 6I2', '1415', 'Avenue Mont-Royal Est', 'Montreal', 'Canada', 'Quebec', 45.532, -73.579),
('H2J 7K4', '1617', 'Rue Saint-Denis', 'Montreal', 'Canada', 'Quebec', 45.516, -73.562),
('H3K 8L6', '1819', 'Avenue du Parc', 'Montreal', 'Canada', 'Quebec', 45.507, -73.572),
('H4L 9M8', '2021', 'Rue Peel', 'Montreal', 'Canada', 'Quebec', 45.501, -73.575),
('H5N 0P3', '2223', 'Rue Crescent', 'Montreal', 'Canada', 'Quebec', 45.497, -73.579);


CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255) NOT NULL,
    url_photo VARCHAR(255)
);

INSERT INTO Utilisateur (email, nom, prenom, telephone, username, password, url_photo) VALUES
('john.doe@example.com', 'Doe', 'John', '1234567890', 'johndoe', 'password1', 'url_photo1.jpg'),
('alice.smith@example.com', 'Smith', 'Alice', '9876543210', 'alicesmith', 'password2', 'url_photo2.jpg'),
('michael.johnson@example.com', 'Johnson', 'Michael', '5551234567', 'michaeljohnson', 'password3', 'url_photo3.jpg'),
('emma.brown@example.com', 'Brown', 'Emma', '4445556666', 'emmabrown', 'password4', 'url_photo4.jpg'),
('david.wilson@example.com', 'Wilson', 'David', '2223334444', 'davidwilson', 'password5', 'url_photo5.jpg'),
('sophia.miller@example.com', 'Miller', 'Sophia', '1112223333', 'sophiamiller', 'password6', 'url_photo6.jpg'),
('james.jones@example.com', 'Jones', 'James', '6667778888', 'jamesjones', 'password7', 'url_photo7.jpg'),
('olivia.garcia@example.com', 'Garcia', 'Olivia', '9990001111', 'oliviagarcia', 'password8', 'url_photo8.jpg'),
('william.martinez@example.com', 'Martinez', 'William', '3334445555', 'williammartinez', 'password9', 'url_photo9.jpg'),
('isabella.yang@example.com', 'Yang', 'Isabella', '7778889999', 'isabellayang', 'password10', 'url_photo10.jpg');

CREATE TABLE Fournisseur (
    id_fournisseur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    nom_de_la_compagnie VARCHAR(255) NOT NULL,
    nom_contact VARCHAR(255) NOT NULL,
    prenom_contact VARCHAR(255) NOT NULL,
    description TEXT,
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255) NOT NULL,
    url_photo VARCHAR(255),
    note_globale INT
);

INSERT INTO Fournisseur (email, nom_de_la_compagnie, nom_contact, prenom_contact, description, telephone, username, password, url_photo, note_globale) VALUES
('compagnie1@snow.com', 'Snow Masters', 'Smith', 'John', 'Snow Masters se spécialise dans la fourniture de services de déneigement de haute qualité pour les propriétés résidentielles et commerciales.', '1234567890', 'snowmasters', 'password1', 'photo_url1.jpg', 4),
('compagnie2@snow.com', 'Snow Clearers Inc.', 'Johnson', 'Alice', 'Snow Clearers Inc. propose des solutions complètes de déneigement adaptées aux besoins uniques de chaque client.', '9876543210', 'snowclearers', 'password2', 'photo_url2.jpg', 4),
('compagnie3@snow.com', 'Snow Angels', 'Brown', 'Michael', 'Snow Angels est dédié à assurer un déneigement sûr et efficace pour maintenir l\'accessibilité des propriétés en hiver.', '5551234567', 'snowangels', 'password3', 'photo_url3.jpg', 3),
('compagnie4@snow.com', 'Ice Busters', 'Wilson', 'Emma', 'Ice Busters se spécialise dans des solutions proactives de gestion de la glace pour prévenir les accidents et assurer la sécurité lors de conditions glaciales.', '4445556666', 'icebusters', 'password4', 'photo_url4.jpg', 5),
('compagnie5@snow.com', 'Frost Fighters', 'Garcia', 'David', 'Frost Fighters propose des services fiables de déneigement et de déglaçage pour aider les clients à maintenir des propriétés sûres et fonctionnelles tout au long de la saison hivernale.', '2223334444', 'frostfighters', 'password5', 'photo_url5.jpg', 4);

CREATE TABLE Administrateur (
    id_administrateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255) NOT NULL,
    url_photo VARCHAR(255)
);

INSERT INTO Administrateur (email, nom, prenom, telephone, username, password, url_photo) VALUES
('admin1@deneigement.ca', 'Admin1', 'Smith', '1234567890', 'admin1', 'password1', 'photo_url1.jpg'),
('admin2@deneigement.ca', 'Admin2', 'Johnson', '9876543210', 'admin2', 'password2', 'photo_url2.jpg');

CREATE TABLE Liste_adresses_Utilisateur (
    id_utilisateur INT,
    id_adresse INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse),
    PRIMARY KEY (id_utilisateur, id_adresse)
);

INSERT INTO Liste_adresses_Utilisateur (id_utilisateur, id_adresse) VALUES
(1, 1), 
(1, 2), 
(1, 3),
(2, 2),  
(3, 3), 
(4, 4),  
(5, 5),  
(6, 6),  
(7, 7),  
(8, 8),  
(9, 9),  
(10, 10); 

CREATE TABLE Liste_adresses_Fournisseur (
    id_fournisseur INT,
    id_adresse INT,
    FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur(id_fournisseur),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse),
    PRIMARY KEY (id_fournisseur, id_adresse)
);

INSERT INTO Liste_adresses_Fournisseur (id_fournisseur, id_adresse) VALUES
(1, 1), 
(2, 2),  
(3, 3),  
(4, 4),  
(5, 5);  


CREATE TABLE Liste_adresses_Administrateur (
    id_administrateur INT,
    id_adresse INT,
    FOREIGN KEY (id_administrateur) REFERENCES Administrateur(id_administrateur),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse),
    PRIMARY KEY (id_administrateur, id_adresse)
);

INSERT INTO Liste_adresses_Administrateur (id_administrateur, id_adresse) VALUES
(1, 1),
(1, 8),
(1, 9),
(2, 2);

CREATE TABLE Billet (
    id_billet INT AUTO_INCREMENT PRIMARY KEY,
    motif VARCHAR(255) NOT NULL,
    texte TEXT NOT NULL,
    date_billet DATE,
    email VARCHAR(255) NOT NULL
);

INSERT INTO Billet (motif, texte, date_billet, email) VALUES
('Plainte', 'Le service de déneigement que j\'ai reçu était très insatisfaisant. Le fournisseur n\'a pas respecté les horaires convenus et la qualité du travail était médiocre.', '2024-02-01', 'client@example.com'),
('Plainte', 'J\'ai commandé un service de déneigement pour mon entrée de garage mais le fournisseur n\'est jamais venu. J\'ai payé à l\'avance et je souhaite un remboursement immédiat.', '2024-02-02', 'client2@example.com'),
('Plainte', 'Le fournisseur a endommagé ma pelouse lors du déneigement. Je demande un remboursement des dommages causés.', '2024-02-03', 'client3@example.com'),
('Mot de passe perdu', 'J\'ai oublié mon mot de passe et je ne peux pas accéder à mon compte. Merci de m\'aider à réinitialiser mon mot de passe.', '2024-02-04', 'utilisateur@example.com'),
('Demande d\'information', 'Je souhaite obtenir des informations sur vos services de déneigement pour une résidence. Pouvez-vous me fournir des détails sur les tarifs et les options disponibles ?', '2024-02-05', 'client4@example.com'),
('Demande d\'information', 'Bonjour, j\'aimerais savoir si vous offrez des contrats de déneigement pour les entreprises. Merci de me fournir des informations sur vos services commerciaux.', '2024-02-05', 'entreprise@example.com');


CREATE TABLE Offre_de_service (
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    id_fournisseur INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL,
    type_clientele ENUM('Résidentiel', 'Commercial') NOT NULL,
    categorie ENUM('Entrée de garage', 'Devant tempo', 'Pelletage', 'Epandage de sel', 'Chaudière de sel', 'Chargement de neige') NOT NULL,
    FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur(id_fournisseur)
);

INSERT INTO Offre_de_service (id_fournisseur, prix_unitaire, description, type_clientele, categorie) VALUES
(1, 50.00, 'Déneigement de l''entrée de garage', 'Résidentiel', 'Entrée de garage'),
(2, 45.00, 'Pelletage devant le tempo', 'Résidentiel', 'Devant tempo'),
(3, 60.00, 'Épandage de sel sur les trottoirs', 'Commercial', 'Epandage de sel'),
(4, 80.00, 'Entretien de chaudière à sel', 'Commercial', 'Chaudière de sel'),
(5, 70.00, 'Chargement de neige après la tempête', 'Résidentiel', 'Chargement de neige');

-- Ajout offres supplementaires pour fournisseur 1 :

INSERT INTO Offre_de_service (id_fournisseur, prix_unitaire, description, type_clientele, categorie) VALUES
(1, 55.00, 'Déneigement de l''allée de garage', 'Résidentiel', 'Entrée de garage'),
(1, 40.00, 'Déneigement des escaliers extérieurs', 'Résidentiel', 'Pelletage'),
(1, 65.00, 'Déneigement des trottoirs', 'Commercial', 'Epandage de sel'),
(1, 85.00, 'Enlèvement de la glace sur le toit', 'Commercial', 'Chaudière de sel'),
(1, 75.00, 'Déblaiement des accès piétonniers', 'Résidentiel', 'Chargement de neige');


CREATE TABLE Review (
    id_review INT AUTO_INCREMENT PRIMARY KEY,
    score INT NOT NULL CHECK(score >= 1 AND score <= 5) ,
    commentaire TEXT,
    id_utilisateur INT NOT NULL,
    id_service INT NOT NULL,
    date_commentaire DATE,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_service) REFERENCES Offre_de_service(id_service)
);

INSERT INTO Review (score, commentaire, id_utilisateur, id_service, date_commentaire) VALUES
(4, 'Service de déneigement rapide et efficace.', 1, 1, '2023-01-15'),
(5, 'Excellent service de pelletage, je recommande vivement!', 2, 2, '2023-02-02'),
(3, 'L''épandage de sel a été bien fait mais un peu cher.', 3, 3, '2023-03-10'),
(4, 'La chaudière a été entretenue de manière professionnelle.', 4, 4, '2023-04-22'),
(5, 'Le chargement de neige a été réalisé rapidement après la tempête.', 5, 5, '2023-05-05');

INSERT INTO Review (score, commentaire, id_utilisateur, id_service, date_commentaire) VALUES
(5, 'Très satisfait du déneigement de l''allée, service rapide et efficace.', 1, 6, '2023-06-15'),
(4, 'Le pelletage des escaliers extérieurs était bien fait, mais légèrement en retard par rapport à l''horaire convenu.', 2, 7, '2023-07-02'),
(3, 'L''épandage de sel sur les trottoirs était satisfaisant mais un peu plus cher que prévu.', 3, 8, '2023-08-10'),
(4, 'Le déneigement des accès piétonniers a été réalisé de manière professionnelle.', 4, 9, '2023-09-22'),
(5, 'Très heureux du déblaiement de la glace sur le toit, service rapide et efficace.', 5, 10, '2023-10-05'),
(4, 'Déneigement de l''allée rapide et bien fait, je le recommande.', 6, 6, '2024-01-15'),
(5, 'Le pelletage des escaliers extérieurs était excellent, personnel poli et travail soigné.', 7, 7, '2024-02-02'),
(3, 'L''épandage de sel sur les trottoirs était correct mais le prix était un peu élevé.', 8, 8, '2024-03-10');



CREATE TABLE Demande_de_service (
    id_demande INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE NOT NULL,
    date_fin DATE,
    status ENUM('Acceptée', 'Refusée', 'En attente', 'Complétée'),
    commentaire TEXT,
    id_utilisateur INT NOT NULL,
    id_fournisseur INT NOT NULL,
    id_review INT,
    id_offre INT NOT NULL,
    id_adresse INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur(id_fournisseur),
    FOREIGN KEY (id_offre) REFERENCES Offre_de_service(id_service),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse),
    FOREIGN KEY (id_review) REFERENCES Review(id_review) ON DELETE SET NULL
);


INSERT INTO Demande_de_service (date_debut, date_fin, status, commentaire, id_utilisateur, id_fournisseur, id_review, id_offre, id_adresse) VALUES
('2023-01-20', '2023-01-25', 'En attente', 'Besoin de déneigement urgent.', 6, 1, NULL, 1, 1),
('2023-02-05', '2023-02-10', 'Acceptée', 'Besoin de pelletage devant le tempo.', 7, 2, NULL, 2, 2),
('2023-03-15', '2023-03-20', 'Refusée', 'Besoin d''épandage de sel pour le stationnement.', 8, 3, NULL, 3, 3),
('2023-04-25', '2023-04-30', 'En attente', 'Entretien de chaudière à sel nécessaire.', 9, 4, NULL, 4, 4),
('2023-05-10', '2023-05-15', 'Acceptée', 'Besoin de chargement de neige après la tempête.', 10, 5, NULL, 5, 5), 
('2024-02-15', '2024-02-20', 'Acceptée', 'Besoin de déneigement urgent.', 6, 1, NULL, 1, 1),
('2024-02-16', '2024-02-21', 'Refusée', 'Besoin de pelletage devant le tempo.', 6, 2, NULL, 2, 2),
('2024-02-17', '2024-02-22', 'En attente', 'Besoin d''épandage de sel pour le stationnement.', 6, 3, NULL, 3, 3),
('2024-02-18', '2024-02-23', 'Complétée', 'Entretien de chaudière à sel nécessaire.', 6, 4, NULL, 4, 4),
('2024-02-19', '2024-02-24', 'En attente', 'Besoin de chargement de neige après la tempête.', 6, 5, NULL, 5, 5);

CREATE DATABASE deneigement_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE deneigement_db;

CREATE TABLE Adresse (
    id_adresse INT AUTO_INCREMENT PRIMARY KEY,
    code_postal VARCHAR(10),
    numero_civique VARCHAR(10),
    nom_rue VARCHAR(255),
    ville VARCHAR(255),
    pays VARCHAR(255),
    province VARCHAR(255),
    coordonnees POINT
);

INSERT INTO Adresse (code_postal, numero_civique, nom_rue, ville, pays, province, coordonnees) VALUES
('H1A 0A1', '123', 'Rue Saint-Jacques', 'Montreal', 'Canada', 'Quebec', POINT(45.514, -73.554)),
('H2B 2C3', '456', 'Avenue Laurier Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.523, -73.594)),
('H3C 3D5', '789', 'Rue Sainte-Catherine', 'Montreal', 'Canada', 'Quebec', POINT(45.505, -73.562)),
('H4E 4F7', '1011', 'Boulevard René-Lévesque Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.498, -73.572)),
('H5G 5H9', '1213', 'Rue Sherbrooke Ouest', 'Montreal', 'Canada', 'Quebec', POINT(45.507, -73.580)),
('H1H 6I2', '1415', 'Avenue Mont-Royal Est', 'Montreal', 'Canada', 'Quebec', POINT(45.532, -73.579)),
('H2J 7K4', '1617', 'Rue Saint-Denis', 'Montreal', 'Canada', 'Quebec', POINT(45.516, -73.562)),
('H3K 8L6', '1819', 'Avenue du Parc', 'Montreal', 'Canada', 'Quebec', POINT(45.507, -73.572)),
('H4L 9M8', '2021', 'Rue Peel', 'Montreal', 'Canada', 'Quebec', POINT(45.501, -73.575)),
('H5N 0P3', '2223', 'Rue Crescent', 'Montreal', 'Canada', 'Quebec', POINT(45.497, -73.579));

CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
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
    email VARCHAR(255) UNIQUE,
    nom_de_la_compagnie VARCHAR(255),
    nom_contact VARCHAR(255),
    prenom_contact VARCHAR(255),
    description TEXT,
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
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
    email VARCHAR(255) UNIQUE,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone VARCHAR(20),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
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
    motif VARCHAR(255),
    texte TEXT,
    date_billet DATE,
    email VARCHAR(255)
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
    id_fournisseur INT,
    prix_unitaire DECIMAL(10,2),
    description TEXT,
    type_clientele ENUM('Résidentiel', 'Commercial'),
    categorie ENUM('Entrée de garage', 'Devant tempo', 'Pelletage', 'Epandage de sel', 'Chaudière de sel', 'Chargement de neige'),
    FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur(id_fournisseur)
);

INSERT INTO Offre_de_service (id_fournisseur, prix_unitaire, description, type_clientele, categorie) VALUES
(1, 50.00, 'Déneigement de l''entrée de garage', 'Résidentiel', 'Entrée de garage'),
(2, 45.00, 'Pelletage devant le tempo', 'Résidentiel', 'Devant tempo'),
(3, 60.00, 'Épandage de sel sur les trottoirs', 'Commercial', 'Epandage de sel'),
(4, 80.00, 'Entretien de chaudière à sel', 'Commercial', 'Chaudière de sel'),
(5, 70.00, 'Chargement de neige après la tempête', 'Résidentiel', 'Chargement de neige');

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

INSERT INTO Review (score, commentaire, id_utilisateur, id_service, date_commentaire) VALUES
(4, 'Service de déneigement rapide et efficace.', 1, 1, '2023-01-15'),
(5, 'Excellent service de pelletage, je recommande vivement!', 2, 2, '2023-02-02'),
(3, 'L''épandage de sel a été bien fait mais un peu cher.', 3, 3, '2023-03-10'),
(4, 'La chaudière a été entretenue de manière professionnelle.', 4, 4, '2023-04-22'),
(5, 'Le chargement de neige a été réalisé rapidement après la tempête.', 5, 5, '2023-05-05');


CREATE TABLE Demande_de_service (
    id_demande INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    status ENUM('Acceptée', 'Refusée', 'En attente', 'Complétée'),
    commentaire TEXT,
    id_utilisateur INT,
    id_fournisseur INT,
    id_review INT,
    id_offre INT,
    id_adresse INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur(id_fournisseur),
    FOREIGN KEY (id_review) REFERENCES Review(id_review),
    FOREIGN KEY (id_offre) REFERENCES Offre_de_service(id_service),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse)
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

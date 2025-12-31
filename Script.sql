-- DDL
CREATE TABLE clients (
id_client INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
 motpasse_hash VARCHAR(150) NOT NULL
);

CREATE TABLE categories(
id_categorie INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(100),
description TEXT
);

CREATE TABLE vehicules(
id_vehicule INT PRIMARY KEY AUTO_INCREMENT,
modele VARCHAR(100),
immatriculation VARCHAR(100),
prix_jour FLOAT,
categorie_id INT,
disponible BOOLEAN,
FOREIGN KEY (categorie_id) REFERENCES categories(id_categorie)
);

CREATE TABLE reservations(
id_reservation INT PRIMARY KEY AUTO_INCREMENT,
client_id_reserv INT,
vehicule_id_reserv INT,
date_debut DATE,
date_fin DATE,
lieu_depart VARCHAR(100),
lieu_retour VARCHAR(100),
FOREIGN KEY (client_id_reserv) REFERENCES clients(id_client),
FOREIGN KEY (vehicule_id_reserv) REFERENCES vehicules(id_vehicule)
);

CREATE TABLE avis(
id_avis INT PRIMARY KEY AUTO_INCREMENT,
client_id_avis INT,
vehicule_id_avis INT,
note INT,
commentaire TEXT,
soft_deleted BOOLEAN,
date_avis DATE,
FOREIGN KEY (client_id_avis) REFERENCES clients(id_client),
FOREIGN KEY (vehicule_id_avis) REFERENCES vehicules(id_vehicule)
);

-- DML

INSERT INTO categories (nom, description) 
VALUES ('Voiture', 'Voitures normales');

INSERT INTO categories (nom, description) 
VALUES ('Moto', 'Motos rapides');

INSERT INTO vehicules (modele, immatriculation, prix_jour, categorie_id, disponible) 
VALUES ('Renault Clio', 'ABC-123', 30, 1, 1);

INSERT INTO vehicules (modele, immatriculation, prix_jour, categorie_id, disponible) 
VALUES ('Honda Moto', 'XYZ-789', 25, 2, 1);

-- DQL
SELECT *FROM vehicules;
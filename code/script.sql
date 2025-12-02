CREATE DATABASE Zoo;
Use Zoo;
CREATE TABLE Animal (
    ID_Animal INT AUTO_INCREMENT PRIMARY KEY,
    NOM_Animal VARCHAR(255) NOT NULL,
    image_animal VARCHAR(255),
    Type_Alimentaire VARCHAR(255),
    ID_Habitat int,
    FOREIGN KEY (ID_Habitat) REFERENCES Habitat(ID_Habitat)
);
CREATE TABLE Habitat (
    ID_Habitat INT AUTO_INCREMENT PRIMARY KEY,
    Nom_Habitat VARCHAR(255) NOT NULL,
    des_Habitat VARCHAR(255)
);
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
    Nom_Habitat VARCHAR(255) NOT NULL UNIQUE,
    des_Habitat VARCHAR(255)
);
INSERT INTO habitat (Nom_Habitat,des_Habitat)
VALUES
('Savane','Grandes plaines avec herbes et animaux'),
 ('Jungle','Forêt dense avec beaucoup d’arbres et des animaux'),
('Désert','Lieux très chauds avec du sable, où vivent des animaux comme les chameaux'),
('Océan','Grande étendue d’eau où vivent des poissons, dauphins et autres animaux marins');
INSERT INTO animal (NOM_Animal, image_animal, Type_Alimentaire, ID_Habitat)
VALUES
('Lion', 'https://easydrawingguides.com/wp-content/uploads/2022/03/how-to-draw-an-easy-cartoon-lion-featured-image-1200.png', 'Carnivore', 1),
('Éléphant', 'https://t4.ftcdn.net/jpg/15/56/41/57/360_F_1556415704_S7dQ575wJadyo9dVakUoWTgX5jjvOsfA.jpg', 'Herbivore', 1),
('Girafe', 'https://www.momjunction.com/wp-content/uploads/2019/02/How-To-Draw-A-Giraffe-An-Easy-Step-By-Step-Tutorial.jpg.webp' ,'Herbivore',1),
('Orque', 'https://media.istockphoto.com/id/511864458/vector/cute-killer-whale-cartoon.jpg?s=612x612&w=0&k=20&c=06Q6_zncvqtq_fzVnS8R92ObJ2HIiw6thDVk5frlyDQ=','Carnivore' ,4);
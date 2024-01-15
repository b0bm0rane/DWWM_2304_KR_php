DROP DATABASE if EXISTS db_new_pokemon;

CREATE DATABASE if NOT EXISTS db_new_pokemon;

USE db_new_pokemon;

CREATE TABLE if NOT EXISTS pokemon (
numero INT, 
espece VARCHAR(50), 
niveau INT,
type_1 VARCHAR(50), 
type_2 VARCHAR(50)
);
 INSERT INTO pokemon 
 (numero, espece, niveau, type_1, type_2)
 VALUES
 (1, "bulbizarre", 5, "plante", "poison"), 
 (2, "herbizarre", 16, "plante", "poison"), 
 (3, "florizarre", 32, "plante", "poison"), 
 (4, "salamèche", 5, "feu", ""), 
 (5, "reptincel", 16, "feu", ""), 
 (6, "dracaufeu", 36, "feu", "vol"), 
 (7, "carapuce", 5, "eau", ""), 
 (8, "carabaffe", 16, "eau", ""), 
 (9, "tortank", 36, "eau", ""), 
 (25, "pikachu", 50, "electrik", "");
 
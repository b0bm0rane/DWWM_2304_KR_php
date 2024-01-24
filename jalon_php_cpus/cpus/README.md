# Jalon PHP MVC Débutant 

Vous devez compléter une page web afin de lister les micro-processeurs référencés dans une base de données.

Vous devez également implémenter un formulaire permettant d'ajouter un nouveau micro-processeur dans la base de données.

La page web a compléter (index.php) se situe dans le dossier **www**.

Vous prendrez soin d'effectuer les contrôles de saisie nécessaire: 

- L'identifiant est un entier auto incrémenté.
- La famille du micro-processeur contient strictement **2** caractères.
- Le modèle du micro-processeur est une chaine de **6** ou **7** caractères (ni plus, ni moins).
- La fréquence exprimée en Mhz est un entier dont la valeur est entre **1600** et **5000**.


La base de données est créée à partir du script suivant : 

```sql
DROP DATABASE IF EXISTS db_cpu;

CREATE DATABASE IF NOT EXISTS db_cpu DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE cpu_intel 
(
    cpu_id INT PRIMARY KEY AUTO_INCREMENT,
    cpu_family VARCHAR(2) NOT NULL,
    cpu_model VARCHAR(7) NOT NULL,
    cpu_mhz INT NOT NULL,
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO cpu_intel 
(cpu_id, cpu_family, cpu_model, cpu_mhz) 
VALUES 
(1, 'I5', '13400F', 2500),
(2, 'I5', '14600K', 2900),
(3, 'I7', '14700F', 3200),
(4, 'I9', '13980HX', 2200);
```
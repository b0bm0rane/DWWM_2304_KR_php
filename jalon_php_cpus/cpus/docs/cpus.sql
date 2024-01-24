DROP DATABASE IF EXISTS db_cpu;

CREATE DATABASE IF NOT EXISTS db_cpu DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE cpu_intel 
(
    cpu_id INT PRIMARY KEY AUTO_INCREMENT,
    cpu_family VARCHAR(2) NOT NULL,
    cpu_model VARCHAR(7) NOT NULL,
    cpu_mhz INT NOT NULL
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO cpu_intel 
(cpu_id, cpu_family, cpu_model,cpu_mhz) 
VALUES 
(1, 'I5', '13400F', 2500),
(2, 'I5', '14600K', 2900),
(3, 'I7', '14700F', 3200),
(4, 'I9', '13980HX', 2200);

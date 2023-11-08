CREATE TABLE konyvek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cim VARCHAR(255) NOT NULL,
    szerzo VARCHAR(255) NOT NULL,
    mufaj VARCHAR(255) NOT NULL,
    leiras TEXT,
    atlag_ertekeles FLOAT
);
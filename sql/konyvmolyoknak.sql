CREATE TABLE kolcsonzesek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    felhasznalo_id INT NOT NULL,
    konyv_id INT NOT NULL,
    kezdeti_datum DATE NOT NULL,
    lejarati_datum DATE NOT NULL,
    FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id),
    FOREIGN KEY (konyv_id) REFERENCES konyvek(id)
);

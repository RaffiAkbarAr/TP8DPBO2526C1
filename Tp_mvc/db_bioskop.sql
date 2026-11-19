CREATE DATABASE IF NOT EXISTS db_bioskop;
USE db_bioskop;
CREATE TABLE sutradara (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_sutradara VARCHAR(100) NOT NULL,
    negara VARCHAR(50) NOT NULL
);
CREATE TABLE genre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_genre VARCHAR(50) NOT NULL
);
CREATE TABLE film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_film VARCHAR(100) NOT NULL,
    tahun_rilis INT NOT NULL,
    id_sutradara INT,
    id_genre INT,
    FOREIGN KEY (id_sutradara) REFERENCES sutradara(id) ON DELETE CASCADE,
    FOREIGN KEY (id_genre) REFERENCES genre(id) ON DELETE CASCADE
);
INSERT INTO sutradara (nama_sutradara, negara) VALUES ('Christopher Nolan', 'UK'), ('Joko Anwar', 'Indonesia');
INSERT INTO genre (nama_genre) VALUES ('Sci-Fi'), ('Horror'), ('Action');
INSERT INTO film (judul_film, tahun_rilis, id_sutradara, id_genre) VALUES ('Interstellar', 2014, 1, 1), ('Pengabdi Setan', 2017, 2, 2);

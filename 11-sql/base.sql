-- Inserer une donnée en SQL
INSERT INTO user (username, email, password) VALUES ('Fiorella', 'fiorella@gmail.com', 'password');

-- Inserer plusieurs données d'un seul coup
INSERT INTO user (username, email, password) VALUES
('Toto', 'toto@gmail.com', 'password'), 
('titi', 'titi@gmail.com', 'password'),
('tata', 'tata@gmail.com', 'password');

-- on Peut mettre a jour une ou plusieur ligne (tuples)
UPDATE user SET `password` = 'daddy' WHERE id = 1;

-- selectionner tous les utilisateur avec tous les champs
SELECT * FROM user;

-- selectionner tous les utilisateur avec le username et l'email
SELECT * FROM `user` WHERE username, email;

-- Supprimer une ligne dans la BDD
DELETE FROM user WHERE id = 2;

-- Le SELECT permet de récupérer les données dans une table
SELECT * FROM movie;

-- WHERE permet de filtrer et condiotionner
-- On veux les fils qui durent plus de 3h
SELECT * FROM movie WHERE duration >= 180;

-- On veut les film d'action
SELECT * FROM movie WHERE id_category = 2 AND duration >60;

-- on veut les film des année 80
SELECT * FROM movie WHERE released_at >= '1980-01-01' AND  released_at <= '1989-12-31';

-- on veut trier les films par duréee (sans WHERE)
SELECT * FROM movie ORDER BY duration DESC;

-- on veut trier les films d'avant 2000 par durée (avec where)
SELECT * FROM movie WHERE released_at < '2000-01-01' ORDER BY duration DESC;

-- on veut afficher 4 films aleatoire
SELECT * FROM movie ORDER BY rand() LIMIT 4;

-- Faire une pagination en mySQL
SELECT * FROM movie LIMIT 0, 5; --OFFSET 0 LIMIT 5 / page 1
SELECT * FROM movie LIMIT 5, 5; --OFFSET 5 LIMIT 5 / page 2


-- exo 
-- SELECT * FROM movie;
-- SELECT * FROM movie WHERE id_category = 1;
-- SELECT * FROM movie WHERE id_category = 1 AND released_at < '1990-01-01';
-- SELECT * FROM movie ORDER BY released_at DESC;
-- SELECT * FROM movie ORDER BY rand();
-- SELECT * FROM movie LIMIT 4, 5;
-- SELECT * FROM movie ORDER BY released_at DESC LIMIT 1;
-- SELECT * FROM movie ORDER BY released_at ASC LIMIT 1;
-- SELECT * FROM actor WHERE birthday < '1960-01-01';


-- jointure
SELECT * FROM movie m
INNER JOIN category c ON m.id_category = c.id_category;

-- jointure
SELECT * FROM movie AS m
INNER JOIN movie_has_actor AS mha ON m.id_movie = mha.id_actor
INNER JOIN actor AS a ON a.id_actor = mha.id_actor
WHERE m.title = 'Le parrain';

-- Afficher les acteur qui ont jouée dans la categorie action
SELECT DISTINCT a.id_actor,a.name,a.firstname, c.name FROM actor AS a
INNER JOIN movie_has_actor AS mha ON m.id_actor = mha.id_actor
INNER JOIN movie AS m ON m.id_movie = mha.id_movie
INNER JOIN category AS c ON c.id_category = mha.id_category
WHERE c.name = 'Action';

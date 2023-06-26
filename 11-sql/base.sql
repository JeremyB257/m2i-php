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
SELECT * 
FROM movie m
INNER JOIN category c ON m.id_category = c.id_category;

-- jointure
SELECT * 
FROM movie AS m
INNER JOIN movie_has_actor AS mha ON m.id_movie = mha.id_actor
INNER JOIN actor AS a ON a.id_actor = mha.id_actor
WHERE m.title = 'Le parrain';

-- Afficher les acteur qui ont jouée dans la categorie action
SELECT DISTINCT a.id_actor,a.name,a.firstname, c.name 
FROM actor AS a
INNER JOIN movie_has_actor AS mha ON a.id_actor = mha.id_actor
INNER JOIN movie AS m ON m.id_movie = mha.id_movie
INNER JOIN category AS c ON c.id_category = m.id_category
WHERE c.name = 'Action';

-- exo

-- Obtenir la liste des 10 villes les plus peuplées en 2012
-- SELECT * FROM `villes_france_free` ORDER BY ville_population_2012 DESC LIMIT 10;

-- Obtenir la liste des 50 villes ayant la plus faible superficie
-- SELECT * FROM `villes_france_free` ORDER BY ville_surface ASC LIMIT 50;

-- Obtenir la liste des départements d’outres-mer, c’est-à-dire ceux dont le numéro de département commencent par “97”
-- SELECT * FROM `departement` WHERE departement_code LIKE '97%';

-- Obtenir le nom des 10 villes les plus peuplées en 2012, ainsi que le nom du département associé
--SELECT v.ville_nom, d.departement_nom 
--FROM `villes_france_free` AS v 
--INNER JOIN departement AS d ON v.ville_departement = d.departement_code
--ORDER BY v.ville_population_2012 DESC
--LIMIT 10;


-- Obtenir la liste du nom de chaque département, associé à son code et du nombre de commune au sein de ces département, en triant afin d’obtenir en priorité les départements qui possèdent le plus de communes
SELECT departement_nom, ville_departement, COUNT(*) AS nbr_items 
FROM `villes_france_free` 
LEFT JOIN departement ON departement_code = ville_departement
GROUP BY ville_departement
ORDER BY `nbr_items` DESC

-- Obtenir la liste des 10 plus grands départements, en terme de superficie
SELECT departement_nom, ville_departement, SUM(`ville_surface`) AS dpt_surface 
FROM `villes_france_free` 
LEFT JOIN departement ON departement_code = ville_departement
GROUP BY ville_departement  
ORDER BY dpt_surface  DESC
LIMIT 10

-- Compter le nombre de villes dont le nom commence par “Saint”
SELECT COUNT(*) 
FROM `villes_france_free` 
WHERE `ville_nom` LIKE 'saint%'

-- Obtenir la liste des villes qui ont un nom existants plusieurs fois, et trier afin d’obtenir en premier celles dont le nom est le plus souvent utilisé par plusieurs communes
SELECT ville_nom, COUNT(*) AS nbt_item 
FROM `villes_france_free` 
GROUP BY `ville_nom` 
ORDER BY nbt_item DESC

-- Obtenir en une seule requête SQL la liste des villes dont la superficie est supérieur à la superficie moyenne
SELECT * 
FROM `villes_france_free` 
WHERE `ville_surface` > (
    SELECT AVG(`ville_surface`) 
    FROM `villes_france_free`
)

-- Obtenir la liste des départements qui possèdent plus de 2 millions d’habitants
SELECT ville_departement, SUM(`ville_population_2012`) AS population_2012
FROM `villes_france_free` 
GROUP BY `ville_departement`
HAVING population_2012 > 2000000
ORDER BY population_2012 DESC

-- Remplacez les tirets par un espace vide, pour toutes les villes commençant par “SAINT-” (dans la colonne qui contient les noms en majuscule)
UPDATE `villes_france_free` 
SET ville_nom = REPLACE(ville_nom, '-', ' ') 
WHERE `ville_nom` LIKE 'SAINT-%'




--Obtenir l’utilisateur ayant le prénom “Muriel” et le mot de passe “test11”, sachant que l’encodage du mot de passe est effectué avec l’algorithme Sha1.
SELECT * 
FROM client
WHERE prenom = 'muriel'
AND password = SHA1('test11')

--Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes.
SELECT nom, COUNT(*) AS NbrProduct
FROM commande_ligne
GROUP BY nom
HAVING NbrProduct > 1

--Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes et y ajouter une colonne qui liste les identifiants des commandes associées.
SELECT nom, COUNT(*) AS nbr_items , GROUP_CONCAT(`commande_id`) AS liste_commandes
FROM `commande_ligne` 
GROUP BY nom 
HAVING nbr_items > 1
ORDER BY nbr_items DESC

--Enregistrer le prix total à l’intérieur de chaque ligne des commandes, en fonction du prix unitaire et de la quantité

--Obtenir le montant total pour chaque commande et y voir facilement la date associée à cette commande ainsi que le prénom et nom du client associé

--(difficulté très haute) Enregistrer le montant total de chaque commande dans le champ intitulé “cache_prix_total”

--Obtenir le montant global de toutes les commandes, pour chaque mois

--Obtenir la liste des 10 clients qui ont effectué le plus grand montant de commandes, et obtenir ce montant total pour chaque client.

--Obtenir le montant total des commandes pour chaque date

--Ajouter une colonne intitulée “category” à la table contenant les commandes. Cette colonne contiendra une valeur numérique

--Enregistrer la valeur de la catégorie, en suivant les règles suivantes :
--“1” pour les commandes de moins de 200€
--“2” pour les commandes entre 200€ et 500€
--“3” pour les commandes entre 500€ et 1.000€
--“4” pour les commandes supérieures à 1.000€

--Créer une table intitulée “commande_category” qui contiendra le descriptif de ces catégories

--Insérer les 4 descriptifs de chaque catégorie au sein de la table précédemment créée

--Supprimer toutes les commandes (et les lignes des commandes) inférieur au 1er février 2019. Cela doit être effectué en 2 requêtes maximum





-- From the following table, write a SQL query to find the actors who played a role in the movie 'Annie Hall'. Return all the fields of actor table.
--With SubQuery
SELECT * 
FROM actor
WHERE act_id IN(
    SELECT act_id 
    FROM movie_cast
    WHERE mov_id IN (
        SELECT mov_id
        FROM movie
        WHERE mov_title = 'Annie Hall'
    )
);

--With Join
SELECT a.act_id, a.act_fname, a.act_lname,a.act_gender
FROM actor AS a
JOIN movie_cast AS mc ON a.act_id = mc.act_id
JOIN movie AS m ON mc.mov_id = m.mov_id
WHERE m.mov_title = 'Annie Hall'

--From the following tables, write a SQL query to find the director of a film that cast a role in 'Eyes Wide Shut'. Return director first name, last name.
--with SubQuery
SELECT dir_fname, dir_lname
FROM director
WHERE dir_id IN(
    SELECT dir_id
    FROM movie_direction
    WHERE mov_id IN(
        SELECT mov_id
        FROM movie
        WHERE mov_title = 'Eyes Wide Shut'
    )
)

--with join
SELECT d.dir_fname, d.dir_lname
FROM director d
JOIN movie_direction md ON d.dir_id = md.dir_id
JOIN movie m ON md.mov_id = m.mov_id
WHERE m.mov_title = 'Eyes Wide Shut'

--From the following table, write a SQL query to find those movies that have been released in countries other than the United Kingdom. Return movie title, movie year, movie time, and date of release, releasing country.

SELECT mov_title, mov_year, mov_time, mov_dt_rel, mov_rel_country
FROM movie
WHERE mov_rel_country != 'UK'

--From the following tables, write a SQL query to find for movies whose reviewer is unknown. Return movie title, year, release date, director first name, last name, actor first name, last name.

SELECT m.mov_title, m.mov_year, m.mov_dt_rel, d.dir_fname ,d.dir_lname, a.act_fname, a.act_lname
FROM movie m, actor a, director d, movie_direction md, movie_cast mc, reviewer re, rating ra
WHERE  m.mov_id = md.mov_id
AND md.dir_id = d.dir_id
AND m.mov_id = mc.mov_id
AND mc.act_id = a.act_id
AND m.mov_id = ra.mov_id
AND re.rev_id = ra.rev_id
AND re.rev_name IS NULL

--From the following tables, write a SQL query to find those movies directed by the director whose first name is Woddy and last name is Allen. Return movie title.
--SubQuerry
SELECT mov_title
FROM movie
WHERE mov_id IN (
    SELECT mov_id 
    FROM movie_direction
    WHERE dir_id IN (
        SELECT dir_id
        FROM director
        WHERE dir_fname = 'Woody' 
        AND dir_lname = 'Allen'
    )
)

--Join
SELECT m.mov_title
FROM movie m
JOIN movie_direction md ON m.mov_id = md.mov_id
JOIN director d ON md.dir_id = d.dir_id
WHERE d.dir_fname = 'Woody' 
AND d.dir_lname = 'Allen'

-- From the following tables, write a SQL query to determine those years in which there was at least one movie that received a rating of at least three stars. Sort the result-set in ascending order by movie year. Return movie year.

SELECT DISTINCT mov_year
FROM movie
WHERE mov_id IN (
    SELECT mov_id
    FROM rating
    WHERE rev_stars > 3
)
ORDER BY mov_year


--From the following table, write a SQL query to search for movies that do not have any ratings. Return movie title.

SELECT mov_title
FROM movie
WHERE mov_id NOT IN(
    SELECT mov_id
    FROM rating
)

-- From the following table, write a SQL query to find those reviewers who have not given a rating to certain films. Return reviewer name.

SELECT rev_name 
FROM reviewer 
WHERE rev_id IN (
    SELECT rev_id 
    FROM rating 
    WHERE rev_stars IS NULL
)

-- From the following tables, write a SQL query to find movies that have been reviewed by a reviewer and received a rating. Sort the result-set in ascending order by reviewer name, movie title, review Stars. Return reviewer name, movie title, review Stars.

SELECT re.rev_name, m.mov_title, ra.rev_stars
FROM reviewer re, movie m ,rating ra
WHERE re.rev_id = ra.rev_id
AND ra.mov_id = m.mov_id
AND ra.rev_stars IS NOT NULL
AND re.rev_name IS NOT NULL
ORDER BY re.rev_name, m.mov_title, ra.rev_stars

-- From the following table, write a SQL query to find movies that have been reviewed by a reviewer and received a rating. Group the result set on reviewer’s name, movie title. Return reviewer’s name, movie title.

SELECT rev_name, mov_title 
FROM reviewer, movie, rating, rating r2
WHERE rating.mov_id=movie.mov_id 
AND reviewer.rev_id=rating.rev_ID 
AND rating.rev_id = r2.rev_id 
GROUP BY rev_name, mov_title HAVING count(*) > 1;

-- From the following tables, write a SQL query to find those movies, which have received highest number of stars. Group the result set on movie title and sorts the result-set in ascending order by movie title. Return movie title and maximum number of review stars.

SELECT mov_title, MAX(rev_stars)
FROM movie, rating 
WHERE movie.mov_id=rating.mov_id 
AND rating.rev_stars IS NOT NULL
GROUP BY  mov_title
ORDER BY mov_title;

--From the following tables, write a SQL query to find all reviewers who rated the movie 'American Beauty'. Return reviewer name.
--SubQuery
SELECT rev_name
FROM reviewer
WHERE rev_id IN (
    SELECT rev_id 
    FROM rating
    WHERE mov_id IN (
        SELECT mov_id
        FROM movie
        WHERE mov_title = 'American Beauty'
    )
)
--Join
SELECT re.rev_name
FROM reviewer re
JOIN rating ra ON re.rev_id = ra.rev_id
JOIN movie m ON ra.mov_id = m.mov_id
WHERE mov_title = 'American Beauty'

--From the following table, write a SQL query to find the movies that have not been reviewed by any reviewer body other than 'Paul Monks'. Return movie title.
--SubQuery
SELECT mov_title
FROM movie
WHERE mov_id IN (
    SELECT mov_id
    FROM rating
    WHERE rev_id NOT IN (
        SELECT rev_id
        FROM reviewer
        WHERE rev_name = 'Paul Monks'
    )
)
--Join
SELECT m.mov_title
FROM movie m
JOIN rating ra ON m.mov_id = ra.mov_id
JOIN reviewer re ON ra.rev_id = re.rev_id
WHERE re.rev_name != 'Paul Monks' OR re.rev_name is NULL



--From the following table, write a SQL query to find the movies with the lowest ratings. Return reviewer name, movie title, and number of stars for those movies.

SELECT reviewer.rev_name, movie.mov_title, rating.rev_stars
FROM reviewer, movie, rating
WHERE rating.rev_stars = (
SELECT MIN(rating.rev_stars)
FROM rating
)
AND rating.rev_id = reviewer.rev_id
AND rating.mov_id = movie.mov_id;

-- From the following tables, write a SQL query to find the movies directed by 'James Cameron'. Return movie title.

SELECT mov_title
FROM movie
WHERE mov_id IN (
    SELECT mov_id
    FROM movie_direction
    WHERE dir_id IN (
        SELECT dir_id 
        FROM director 
        WHERE dir_fname = 'James'
        AND dir_lname = 'Cameron'
    )
)

--Write a query in SQL to find the movies in which one or more actors appeared in more than one film.
SELECT mov_title
FROM movie
WHERE mov_id IN (
    SELECT mov_id
    FROM movie_cast
    WHERE act_id IN (
        SELECT act_id
        FROM actor
        WHERE act_id IN (
            SELECT act_id
            FROM movie_cast GROUP BY act_id
            HAVING COUNT(act_id)>1
        )
    )
)

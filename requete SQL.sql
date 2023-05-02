-- Remplissage de la base de données---------------------------------------------

--personne : réalisateur/trices
INSERT INTO personne VALUES('1', 'Kubrick', 'Stanley', 'Homme', '1928-07-26')
INSERT INTO personne VALUES('2', 'Leonetti', 'John R.', 'Homme', '1956-07-04')
INSERT INTO personne VALUES('3', 'Wan', 'James', 'Homme', '1977-02-26')
INSERT INTO personne VALUES('4', 'Ducourneau', 'Julia', 'Femme', '1983-11-18')
INSERT INTO personne VALUES('5', 'Watts', 'Jon', 'Homme', '1981-06-28')
INSERT INTO personne VALUES('6', 'Jenkins', 'Patty', 'Femme', '1971-07-24')
INSERT INTO personne VALUES('7', 'Coppola', 'Sofia', 'Femme', '1971-05-14')

--personne : acteur/trices
INSERT INTO personne VALUES('8', 'Murray', 'Bill', 'Homme', '2004-01-07')
INSERT INTO personne VALUES('9', 'Johansson', 'Scarlett', 'Femme', '1984-11-22')
INSERT INTO personne VALUES('10', 'Gadot', 'Gal', 'Femme', '1985-04-30')
INSERT INTO personne VALUES('11', 'Skarsgard', 'Bill', 'Homme', '1990-08-09')
INSERT INTO personne VALUES('12', 'Martell', 'Jaeden', 'Homme', '2003-01-04')
INSERT INTO personne VALUES('13', 'Nicholson', 'Jack', 'Homme', '1937-04-22')
INSERT INTO personne VALUES('14', 'Duvall', 'Shelley', 'Femme', '1979-07-07')
INSERT INTO personne VALUES('15', 'McDowell', 'Malcolm', 'Homme', '1943-06-13')
INSERT INTO personne VALUES('16', 'Corri', 'Adrienne', 'Femme', '1931-11-13')
INSERT INTO personne VALUES('17', 'Irons', 'Jeremy', 'Homme', '1948-09-19')
INSERT INTO personne VALUES('18', 'Swain', 'Dominique', 'Femme', '1980-08-12')
INSERT INTO personne VALUES('19', 'Wallis', 'Annabelle', 'Femme', '1984-09-05')
INSERT INTO personne VALUES('20', 'Howe', 'Brian', 'Homme', '1953-07-22')
INSERT INTO personne VALUES('21', 'Kierman', 'Shipka', 'Femme', '1999-11-10')
INSERT INTO personne VALUES('22', 'Tucci', 'Stanley', 'Homme', '1960-11-11')
INSERT INTO personne VALUES('23', 'Farmiga', 'Vera', 'Femme', '1973-08-06')
INSERT INTO personne VALUES('24', 'Wilson', 'Patrick', 'Homme', '1973-07-03')
INSERT INTO personne VALUES('25', 'Byrne', 'Rose', 'Femme', '1979-07-24')
INSERT INTO personne VALUES('26', 'Walker', 'Paul', 'Homme', '1973-09-12')
INSERT INTO personne VALUES('27', 'Rodriguez', 'Michelle', 'Femme', '1978-07-12')
INSERT INTO personne VALUES('28', 'Holland', 'Tom', 'Homme', '1996-06-01')
INSERT INTO personne VALUES('29', 'Coleman', 'Zendaya', 'Femme', '1996-09-01')
INSERT INTO personne VALUES('30','Theron','Charlize', 'Femme', '1975-08-07')
INSERT INTO personne VALUES('31', 'Dunst', 'Kristen', 'Femme', '1982-04-30')

--réalisateur
INSERT INTO realisateur VALUES('1', '1')
INSERT INTO realisateur VALUES('2', '2')
INSERT INTO realisateur VALUES('3', '3')
INSERT INTO realisateur VALUES('4', '4')
INSERT INTO realisateur VALUES('5', '5')
INSERT INTO realisateur VALUES('6', '6')
INSERT INTO realisateur VALUES('7', '7')

--acteur
INSERT INTO acteur VALUES('1', '8')
INSERT INTO acteur VALUES('2', '9')
INSERT INTO acteur VALUES('3', '10')
INSERT INTO acteur VALUES('4', '11')
INSERT INTO acteur VALUES('5', '12')
INSERT INTO acteur VALUES('6', '13')
INSERT INTO acteur VALUES('7', '14')
INSERT INTO acteur VALUES('8', '15')
INSERT INTO acteur VALUES('9', '16')
INSERT INTO acteur VALUES('10', '17')
INSERT INTO acteur VALUES('11', '18')
INSERT INTO acteur VALUES('12', '19')
INSERT INTO acteur VALUES('13', '20')
INSERT INTO acteur VALUES('14', '21')
INSERT INTO acteur VALUES('15', '22')
INSERT INTO acteur VALUES('16', '23')
INSERT INTO acteur VALUES('17', '24')
INSERT INTO acteur VALUES('18', '25')
INSERT INTO acteur VALUES('19', '26')
INSERT INTO acteur VALUES('20', '27')
INSERT INTO acteur VALUES('21', '28')
INSERT INTO acteur VALUES('22', '29')
INSERT INTO acteur VALUES('23', '30')
INSERT INTO acteur VALUES('24', '31')

--film
INSERT INTO film VALUES('1', 'Shining', '1980', '119', '', '4', '', '1')
INSERT INTO film VALUES('2', 'A Clockwork Orange', '1972', '136', '', '4.8', '', '1')
INSERT INTO film VALUES('3', 'Lolita', '1962', '153', '', '3.9', '', '1')
INSERT INTO film VALUES('4', 'Anabelle', '2014', '98', '', '2.1', '', '2')
INSERT INTO film VALUES('5', 'The silence', '2019', '121', '', '2.4', '', '2')
INSERT INTO film VALUES('6', 'Conjuring', '2013', '111', '', '3.3', '', '3')
INSERT INTO film VALUES('7', 'Insidious', '2011', '102', '', '3.5', '', '3')
INSERT INTO film VALUES('8', 'Fast and Furious 7', '2015', '137', '', '3.6', '', '3')
INSERT INTO film VALUES('9', 'Titane', '2021', '108', '', '3.5', '', '4')
INSERT INTO film VALUES('10', 'Grave', '2017', '98', '', '3.6', '', '4')
INSERT INTO film VALUES('11', 'Junior', '2011', '20', '', '3.4', '', '4')
INSERT INTO film VALUES('12', 'Clown', '2014', '99', '', '2.5', '', '5')
INSERT INTO film VALUES('13', 'Spider-Man: Homecoming', '2017', '133', '', '3.5', '', '5')
INSERT INTO film VALUES('14', 'Spider-Man: Far From Home', '2019', '129', '', '3.8', '', '5')
INSERT INTO film VALUES('15', 'Spider-Man: No Way Home', '2021', '148', '', '3.3', '', '5')
INSERT INTO film VALUES('16', 'Wonder Woman', '2017', '141', '', '3.1', '', '6')
INSERT INTO film VALUES('17', 'Monster', '2003', '111', '', '3.7', '', '6')
INSERT INTO film VALUES('18', 'Wonder Woman 1984', '2020', '151', '', '2.1', '', '6')
INSERT INTO film VALUES('19', 'Lost in Translation', '2003', '102', '', '4.5', '', '7')
INSERT INTO film VALUES('20', 'Marie-Antoinette', '2006', '123', '', '4.1', '', '7')
INSERT INTO film VALUES('21', 'Virgin Suicides', '2000', '97', '', '4.4', '', '7')

--genre
INSERT INTO genre VALUES('1', 'Drame')
INSERT INTO genre VALUES('2', 'Horreur')
INSERT INTO genre VALUES('3', 'Action')
INSERT INTO genre VALUES('4', 'Thriller')
INSERT INTO genre VALUES('5', 'Super-héros')
INSERT INTO genre VALUES('6', 'Anticipation')
INSERT INTO genre VALUES('7', 'Comédie')
INSERT INTO genre VALUES('8', 'Romance')
INSERT INTO genre VALUES('9', 'Science-fiction')
INSERT INTO genre VALUES('10', 'Fantastique')
INSERT INTO genre VALUES('11', 'Psychologique')
INSERT INTO genre VALUES('12', 'Post-apocalyptique')
INSERT INTO genre VALUES('13', 'Comédie dramatique')
INSERT INTO genre VALUES('14', 'Biographique')
INSERT INTO genre VALUES('15', 'Historique')

--categoriser
INSERT INTO categoriser VALUES('1', '2')
INSERT INTO categoriser VALUES('1', '4')
INSERT INTO categoriser VALUES('2', '6')
INSERT INTO categoriser VALUES('2', '1')
INSERT INTO categoriser VALUES('3', '1')
INSERT INTO categoriser VALUES('3', '11')
INSERT INTO categoriser VALUES('4', '2')
INSERT INTO categoriser VALUES('4', '10')
INSERT INTO categoriser VALUES('5', '2')
INSERT INTO categoriser VALUES('5', '12')
INSERT INTO categoriser VALUES('6', '2')
INSERT INTO categoriser VALUES('7', '2')
INSERT INTO categoriser VALUES('8', '3')
INSERT INTO categoriser VALUES('9', '4')
INSERT INTO categoriser VALUES('9', '1')
INSERT INTO categoriser VALUES('9', '2')
INSERT INTO categoriser VALUES('9', '10')
INSERT INTO categoriser VALUES('10', '1')
INSERT INTO categoriser VALUES('10', '2')
INSERT INTO categoriser VALUES('11', '10')
INSERT INTO categoriser VALUES('12', '2')
INSERT INTO categoriser VALUES('13', '5')
INSERT INTO categoriser VALUES('14', '5')
INSERT INTO categoriser VALUES('15', '5')
INSERT INTO categoriser VALUES('16', '5')
INSERT INTO categoriser VALUES('17', '4')
INSERT INTO categoriser VALUES('18', '5')
INSERT INTO categoriser VALUES('19', '13')
INSERT INTO categoriser VALUES('20', '1')
INSERT INTO categoriser VALUES('20', '15')
INSERT INTO categoriser VALUES('20', '14')
INSERT INTO categoriser VALUES('21', '1')

--role
INSERT INTO role VALUES('1', 'Jack Torrance')
INSERT INTO role VALUES('2', 'Wendy Torrance')
INSERT INTO role VALUES('3', 'Alex DeLarge')
INSERT INTO role VALUES('4', 'Mrs. Alexander')
INSERT INTO role VALUES('5', 'Humbert')
INSERT INTO role VALUES('6', 'Dolorès Haze')
INSERT INTO role VALUES('7', 'Mia')
INSERT INTO role VALUES('8', 'Pete Higgins')
INSERT INTO role VALUES('9', 'Ally Andrews')
INSERT INTO role VALUES('10', 'Hugh Andrews')
INSERT INTO role VALUES('11', 'Lorraine Warren')
INSERT INTO role VALUES('12', 'Ed Warren')
INSERT INTO role VALUES('13', 'Josh Lambert')
INSERT INTO role VALUES('14', 'Renai Lambert')
INSERT INTO role VALUES('15', 'Brian O Conner')
INSERT INTO role VALUES('16', 'Letty Ortiz')
INSERT INTO role VALUES('17', 'Justine')
INSERT INTO role VALUES('18', 'Alexia')
INSERT INTO role VALUES('19', 'Frowny the Clown')
INSERT INTO role VALUES('20', 'Spider-Man')
INSERT INTO role VALUES('21', 'Michelle Jones')
INSERT INTO role VALUES('22', 'Wonder Woman')
INSERT INTO role VALUES('23', 'Aileen')
INSERT INTO role VALUES('24', 'Bob Harris')
INSERT INTO role VALUES('25', 'Charlotte')
INSERT INTO role VALUES('26', 'Marie-Antoinette')
INSERT INTO role VALUES('27', 'Lux Lisbon')

--jouer (id_film, id_acteur, id_role) :
INSERT INTO jouer VALUES('1', '6', '1')
INSERT INTO jouer VALUES('1', '7', '2')
INSERT INTO jouer VALUES('2', '8', '3')
INSERT INTO jouer VALUES('2', '9', '4')
INSERT INTO jouer VALUES('3', '10', '5')
INSERT INTO jouer VALUES('3', '11', '6')
INSERT INTO jouer VALUES('4', '12', '7')
INSERT INTO jouer VALUES('4', '13', '8')
INSERT INTO jouer VALUES('5', '14', '9')
INSERT INTO jouer VALUES('5', '15', '10')
INSERT INTO jouer VALUES('6', '16', '11')
INSERT INTO jouer VALUES('6', '17', '12')
INSERT INTO jouer VALUES('7', '17', '13')
INSERT INTO jouer VALUES('7', '18', '14')
INSERT INTO jouer VALUES('8', '19', '15')
INSERT INTO jouer VALUES('8', '20', '16')
INSERT INTO jouer VALUES('13', '21', '20')
INSERT INTO jouer VALUES('13', '22', '21')
INSERT INTO jouer VALUES('14', '21', '20')
INSERT INTO jouer VALUES('14', '22', '21')
INSERT INTO jouer VALUES('15', '22', '21')
INSERT INTO jouer VALUES('15', '21', '20')
INSERT INTO jouer VALUES('17', '23', '23')
INSERT INTO jouer VALUES('20', '24', '26')
INSERT INTO jouer VALUES('21', '24', '27')

--Requêtes --------------------------------------------------------------------

--A. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT titre, anneeSortie, duree, nom, prenom
FROM film 
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_realisateur = personne.id_personne

--B. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT titre, duree
FROM film
WHERE duree < '136'
ORDER BY duree DESC

--C. Liste des films d’un réalisateur (en précisant l’année de sortie)
SELECT nom, titre, anneeSortie
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_realisateur = personne.id_personne

--D. Nombre de films par genre (classés dans l’ordre décroissant)
SELECT COUNT(film.id_film) AS 'Nombre de films', nom_genre AS 'Genre'
FROM film
INNER JOIN categoriser ON film.id_film = categoriser.id_film
INNER JOIN genre ON categoriser.id_genre = genre.id_genre
GROUP BY nom_genre

--E. Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT nom, prenom, COUNT(film.id_film) AS 'Nombre de films'
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_realisateur = personne.id_personne
GROUP BY realisateur.id_realisateur 
ORDER BY COUNT(film.id_film) DESC

--F. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe

--Pour les afficher tous ------------------------------------------------------
SELECT titre, nom, prenom, sexe
FROM film
INNER JOIN jouer ON film.id_film = jouer.id_film
INNER JOIN acteur ON acteur.id_acteur = jouer.id_acteur
INNER JOIN personne ON personne.id_personne = acteur.id_personne
-------------------------------------------------------------------------------

SELECT personne.prenom, personne.nom, personne.sexe
FROM film, jouer, acteur, personne
WHERE film.id_film = jouer.id_film
AND jouer.id_acteur = acteur.id_acteur
AND acteur.id_personne = personne.id_personne
AND film.id_film = 1

--G. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)


--H. Liste des personnes qui sont à la fois acteurs et réalisateurs
SELECT film.titre, film.anneeSortie
FROM personne, acteur, realisateur
WHERE personne.id_personne = acteur.id_personne
AND acteur.id_personne = realisateur.id_personne

--I. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT film.titre, film.anneeSortie
FROM film
WHERE YEAR(CURDATE())-film.anneeSortie <= 5
ORDER BY film.anneeSortie DESC

--J. Nombre d’hommes et de femmes parmi les acteurs
SELECT personne.sexe AS 'Sexe', COUNT(personne.sexe) AS 'Nombre'
FROM acteur, personne
WHERE acteur.id_personne = personne.id_personne
GROUP BY personne.sexe


-- La condition HAVING en SQL est presque similaire à WHERE à la seule différence que HAVING permet de filtrer en utilisant des fonctions telles que SUM(), COUNT(), AVG(), MIN() ou MAX().

--K. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
SELECT personne.prenom, personne.nom, personne.dateNaissance, (TIMESTAMPDIFF(YEAR, personne.dateNaissance, CURRENT_DATE)) AS age
FROM acteur, personne
WHERE acteur.id_personne = personne.id_personne
HAVING age >= 50

--L. Acteurs ayant joué dans 3 films ou plus
SELECT jouer.id_acteur, COUNT(jouer.id_film) AS film_joue
FROM jouer, acteur
WHERE jouer.id_acteur = acteur.id_acteur
GROUP BY jouer.id_acteur
HAVING film_joue <= 3
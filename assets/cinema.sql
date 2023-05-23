-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE IF NOT EXISTS `cinema2` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `cinema2`;
-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~0 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 8),
	(2, 9),
	(3, 10),
	(4, 11),
	(5, 12),
	(6, 13),
	(7, 14),
	(8, 15),
	(9, 16),
	(10, 17),
	(11, 18),
	(12, 19),
	(13, 20),
	(14, 21),
	(15, 22),
	(16, 23),
	(17, 24),
	(18, 25),
	(19, 26),
	(20, 27),
	(21, 28),
	(22, 29),
	(23, 30),
	(24, 31);

-- Listage de la structure de table cinema. categoriser
CREATE TABLE IF NOT EXISTS `categoriser` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK__film2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK__genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.categoriser : ~64 rows (environ)
INSERT INTO `categoriser` (`id_film`, `id_genre`) VALUES
	(1, 2),
	(1, 4),
	(2, 6),
	(2, 1),
	(3, 1),
	(3, 11),
	(4, 2),
	(4, 10),
	(5, 2),
	(5, 12),
	(6, 2),
	(7, 2),
	(8, 3),
	(9, 4),
	(9, 1),
	(9, 2),
	(9, 10),
	(10, 1),
	(10, 2),
	(11, 10),
	(12, 2),
	(13, 5),
	(14, 5),
	(15, 5),
	(16, 5),
	(17, 4),
	(18, 5),
	(19, 13),
	(20, 1),
	(20, 15),
	(20, 14),
	(21, 1);

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '0',
  `anneeSortie` int NOT NULL DEFAULT '0',
  `duree` int NOT NULL DEFAULT '0',
  `synopsis` text NOT NULL,
  `note` float NOT NULL DEFAULT '0',
  `affiche` varchar(50) NOT NULL DEFAULT '0',
  `id_realisateur` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK__realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.film : ~0 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Shining', 1980, 119, 'Jack Torrance takes a winter caretaker position at the remote Overlook Hotel in the Rocky Mountains, which closes every winter season. After his arrival, manager Stuart Ullman advises Torrance that a previous caretaker, Charles Grady, killed his family and himself in the hotel.', 4, '', 1),
	(2, 'A Clockwork Orange', 1972, 136, 'In a futuristic Britain, Alex DeLarge is the leader of a gang of "droogs": Georgie, Dim and Pete. One night, after getting intoxicated on drug-laden "milk-plus", they engage in an evening of "ultra-violence", which includes a fight with a rival gang. They drive to the country home of writer Frank Alexander and trick his wife into letting them inside. They beat Alexander to the point of crippling him, and Alex violently rapes Alexander\'s wife while singing "Singin\' in the Rain". The next day, while truant from school, Alex is approached by his probation officer, PR Deltoid, who is aware of Alex\'s activities and cautions him.', 4.8, '', 1),
	(3, 'Lolita', 1962, 153, 'In 1947, Humbert Humbert, a middle-aged European professor of English literature, travels to the United States to take a teaching position in New Hampshire. He rents a room in the home of widow Charlotte Haze, largely because he is sexually attracted to her 14-year-old daughter Dolores, also called "Lo", whom he sees while touring the house. Obsessed from boyhood with girls of approximately her age (whom he calls "nymphets"), Humbert is immediately smitten with Lo and marries Charlotte only to be near her daughter.', 3.9, '', 1),
	(4, 'Anabelle', 2014, 98, 'In Santa Monica, California, John Form, a doctor, presents his expectant wife Mia with a rare vintage porcelain doll as a gift for their first child to be placed in a collection of dolls in their daughter\'s nursery.', 2.1, '', 2),
	(5, 'The silence', 2019, 121, 'A cave research team unearths an unknown species of pterosaur-like creature, referred to as "vesps", from a mine. The vesps violently kill the researchers, fly out of the mine, and seek the noisiest areas.', 2.4, '', 2),
	(6, 'Conjuring', 2013, 111, 'In 1971, Roger and Carolyn Perron move into a farmhouse in Harrisville, Rhode Island, with their five daughters: Andrea, Nancy, Christine, Cindy, and April. Their dog, Sadie, refuses to enter the house and the entrance to a cellar has been boarded up. Paranormal events occur within the first few nights. Every clock in the house stops at 3:07 AM. Sadie is found dead in the morning, and Carolyn wakes up with large bruises. She and Christine both encounter a malevolent spirit.', 3.3, '', 3),
	(7, 'Insidious', 2011, 102, 'Married couple Josh and Renai Lambert have recently moved in to a new home with their sons Dalton and Foster, and their infant daughter Cali. One evening, Dalton sneaks into the attic, where he encounters a mysterious entity. The next day, he inexplicably slips into a coma.', 3.5, '', 3),
	(8, 'Fast and Furious 7', 2015, 137, 'After defeating Owen Shaw and securing pardons for their past crimes,[a] Dominic Toretto, Brian O\'Conner and the team have returned to the US to live normal lives. Dom tries to help Letty Ortiz regain her memory, while Brian accustoms himself to life as a father.', 3.6, '', 3),
	(9, 'Titane', 2021, 108, 'A little girl named Alexia annoys her father during a drive. As she removes her seatbelt, her father turns around to scold her, causing a car crash. Alexia suffers a skull injury and has a titanium plate fitted into her head. When she gets out of the hospital, she shuns her parents and embraces their car passionately.', 3.5, '', 4),
	(10, 'Grave', 2017, 98, 'Lifelong vegetarian Justine begins her first semester at veterinary school, the same one her older sister Alexia is attending and where their parents met. On her first night, she meets her roommate Adrien, and they are forced to partake in a week-long hazing ritual, welcoming the new students. They are brought to a party, where Alexia shows Justine old class photos of students bathed in blood, including one with their parents. The next morning, the new class is splattered with blood and is forced to eat raw rabbit kidneys. Justine refuses because of her vegetarianism, but Alexia forces her to eat one. Justine leaves with Adrien and later discovers an itchy rash all over her body. She goes to the doctor, who diagnoses her with food poisoning and gives her cream for the rash.', 3.6, '', 4),
	(11, 'Junior', 2011, 20, 'ustine, dite `Junior\', 13 ans, des boutons et un sens de l\'humour bien à elle, est un garçon manqué un brin misogyne. Alors qu\'on lui a diagnostiqué une gastroentérite fulgurante, le corps de Junior devient le théâtre d\'une métamorphose étrange.', 3.4, '', 4),
	(12, 'Clown', 2014, 99, 'Kent McCoy, a real estate agent, is a loving husband and father who hosts a birthday party for his young son Jack. However, the clown hired for their party is unable to make it. Kent discovers an old clown costume in the basement of a house he is selling and puts it on. After the party, he falls asleep wearing the outfit, and the following day finds he cannot take it off.', 2.5, '', 5),
	(13, 'Spider-Man: Homecoming', 2017, 133, 'Following the Battle of New York in 2012,[a] Adrian Toomes and his salvage company are contracted to clean up the city, but their operation is taken over by the Department of Damage Control (DODC), a partnership between Tony Stark and the U.S. government. Enraged at being driven out of business, Toomes persuades his employees to keep the Chitauri technology they have already scavenged and use it to create and sell advanced weapons, including a flying Vulture suit Toomes uses to steal Chitauri power cells.', 3.5, '', 5),
	(14, 'Spider-Man: Far From Home', 2019, 129, 'In Ixtenco, Mexico, Nick Fury and Maria Hill investigate an unnatural storm and encounter the Earth Elemental. Quentin Beck, a super-powered individual, arrives to defeat the creature, and is subsequently recruited by Fury and Hill. In New York City, the Midtown School of Science and Technology completes its year, which was restarted to accommodate the students who previously disintegrated five years earlier as a result of Thanos\' actions.[a] They had reappeared un-aged, thanks to the actions of the Avengers.[b] The school organizes a two-week summer field trip to Europe, where Peter Parker—who is still mourning the death of his mentor Tony Stark—plans to reveal to classmate MJ his attraction to her. Happy Hogan informs Parker that Fury intends to contact him, but Parker ignores Fury\'s phone call.', 3.8, '', 5),
	(15, 'Spider-Man: No Way Home', 2021, 148, 'After Quentin Beck frames Peter Parker for his murder and reveals Parker\'s identity as Spider-Man,[a] Parker, his girlfriend Michelle "MJ" Jones-Watson, best friend Ned Leeds, and aunt May are interrogated by the Department of Damage Control. Lawyer Matt Murdock gets Parker\'s charges dropped, but the group grapples with negative publicity. After Parker, MJ, and Ned\'s MIT applications are rejected, Parker goes to the New York Sanctum to ask Stephen Strange for help. Strange starts casting a spell that would make everyone forget Parker is Spider-Man, but it is corrupted when Parker repeatedly requests alterations to let his loved ones retain their memories, ultimately causing Strange to contain the spell to stop it.', 3.3, '', 5),
	(16, 'Wonder Woman', 2017, 141, 'In present-day Paris, Diana Prince receives a photographic plate from Wayne Enterprises of herself and four men taken during World War I, prompting her to recall her past. The daughter of Queen Hippolyta, Diana is raised on the hidden island of Themyscira, home to the Amazons, women warriors created by the Olympian gods to protect mankind. Hippolyta explains their history to Diana, including how Ares became jealous of humanity and orchestrated its destruction. When the other gods attempted to stop him, Ares killed all but Zeus, who used the last of his power to wound Ares and force his retreat. Before dying, Zeus left the Amazons a weapon, the "god-killer", to prepare them for Ares\' return. Hippolyta reluctantly agrees to let her sister, General Antiope, train Diana as a warrior.', 3.1, '', 6),
	(17, 'Monster', 2003, 111, 'In 1989, after moving from Michigan to Daytona Beach, Florida, and on the verge of committing suicide, street prostitute Aileen Wuornos meets Selby Wall in a gay bar. Although she is initially hostile and declares that she is not gay, Aileen talks to Selby while drinking beer. Selby takes to Aileen almost immediately, as she likes that she is very protective of her. Selby invites Aileen to spend the night with her. The two women return to the house where Selby is staying (temporarily exiled by her parents following the accusation from another girl that Selby tried to kiss her). They later agree to meet at a roller skating rink, and they kiss for the first time. Aileen and Selby fall in love, but they have nowhere to go, so Selby goes back to her aunt\'s home.', 3.7, '', 6),
	(18, 'Wonder Woman 1984', 2020, 151, 'As a child, Diana participates in an athletic competition on Themyscira against adult Amazons. After being knocked off her horse, she takes a shortcut and remounts, but misses a checkpoint. Antiope removes her from the race for cheating, explaining that anything worthwhile must be obtained honestly, while her mother Hippolyta advises her to be patient in her pursuit of glory and honor.', 2.1, '', 6),
	(19, 'Lost in Translation', 2003, 102, 'Bob Harris is a fading American movie star who arrives in Tokyo to appear in lucrative advertisements for Suntory whisky. He stays at the upscale Park Hyatt Tokyo and is miserable due to problems within his 25-year marriage and a midlife crisis. Charlotte, another American staying at the hotel, is a young Yale graduate in philosophy who is accompanying her husband John while he works as a celebrity photographer. Charlotte is feeling similarly disenchanted as she questions her marriage and is anxious about her future. They both struggle with additional bouts of jet lag and culture shock in Tokyo and pass the time loitering around the hotel.', 4.5, '', 7),
	(20, 'Marie-Antoinette', 2006, 123, 'Fourteen-year-old Maria Antonia, the youngest daughter of Empress Maria-Theresa of Austria, is a beautiful, charming and naïve archduchess. In 1770, she is sent by her mother to marry Louis-Auguste, the Dauphin of France, to seal an alliance between the two rival countries.', 4.1, '', 7),
	(21, 'Virgin Suicides', 2000, 97, 'As an ambulance arrives for the body of Mary Lisbon, the last Lisbon sister to die, a group of anonymous adolescent neighborhood boys recalls the events leading up to her death.', 4.4, '', 7);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~0 rows (environ)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Drame'),
	(2, 'Horreur'),
	(3, 'Action'),
	(4, 'Thriller'),
	(5, 'Super-héros'),
	(6, 'Anticipation'),
	(7, 'Comédie'),
	(8, 'Romance'),
	(9, 'Science-fiction'),
	(10, 'Fantastique'),
	(11, 'Psychologique'),
	(12, 'Post-apocalyptique'),
	(13, 'Comédie dramatique'),
	(14, 'Biographique'),
	(15, 'Historique');

-- Listage de la structure de table cinema. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL DEFAULT '0',
  `id_role` int NOT NULL DEFAULT '0',
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK__acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK__film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.jouer : ~50 rows (environ)
INSERT INTO `jouer` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 6, 1),
	(1, 7, 2),
	(2, 8, 3),
	(2, 9, 4),
	(3, 10, 5),
	(3, 11, 6),
	(4, 12, 7),
	(4, 13, 8),
	(5, 14, 9),
	(5, 15, 10),
	(6, 16, 11),
	(6, 17, 12),
	(7, 17, 13),
	(7, 18, 14),
	(8, 19, 15),
	(8, 20, 16),
	(13, 21, 20),
	(13, 22, 21),
	(14, 21, 20),
	(14, 22, 21),
	(15, 22, 21),
	(15, 21, 20),
	(17, 23, 23),
	(20, 24, 26),
	(21, 24, 27);
	

-- Listage de la structure de table cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `prenom` varchar(50) NOT NULL DEFAULT '0',
  `sexe` tinytext NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.personne : ~0 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'Kubrick', 'Stanley', 'Homme', '1928-07-26'),
	(2, 'Leonetti', 'John R.', 'Homme', '1956-07-04'),
	(3, 'Wan', 'James', 'Homme', '1977-02-26'),
	(4, 'Ducourneau', 'Julia', 'Femme', '1983-11-18'),
	(5, 'Watts', 'Jon', 'Homme', '1981-06-28'),
	(6, 'Jenkins', 'Patty', 'Femme', '1971-07-24'),
	(7, 'Coppola', 'Sofia', 'Femme', '1971-05-14'),
	(8, 'Murray', 'Bill', 'Homme', '2004-01-07'),
	(9, 'Johansson', 'Scarlett', 'Femme', '1984-11-22'),
	(10, 'Gadot', 'Gal', 'Femme', '1985-04-30'),
	(11, 'Skarsgard', 'Bill', 'Homme', '1990-08-09'),
	(12, 'Martell', 'Jaeden', 'Homme', '2003-01-04'),
	(13, 'Nicholson', 'Jack', 'Homme', '1937-04-22'),
	(14, 'Duvall', 'Shelley', 'Femme', '1979-07-07'),
	(15, 'McDowell', 'Malcolm', 'Homme', '1943-06-13'),
	(16, 'Corri', 'Adrienne', 'Femme', '1931-11-13'),
	(17, 'Irons', 'Jeremy', 'Homme', '1948-09-19'),
	(18, 'Swain', 'Dominique', 'Femme', '1980-08-12'),
	(19, 'Wallis', 'Annabelle', 'Femme', '1984-09-05'),
	(20, 'Howe', 'Brian', 'Homme', '1953-07-22'),
	(21, 'Kierman', 'Shipka', 'Femme', '1999-11-10'),
	(22, 'Tucci', 'Stanley', 'Homme', '1960-11-11'),
	(23, 'Farmiga', 'Vera', 'Femme', '1973-08-06'),
	(24, 'Wilson', 'Patrick', 'Homme', '1973-07-03'),
	(25, 'Byrne', 'Rose', 'Femme', '1979-07-24'),
	(26, 'Walker', 'Paul', 'Homme', '1973-09-12'),
	(27, 'Rodriguez', 'Michelle', 'Femme', '1978-07-12'),
	(28, 'Holland', 'Tom', 'Homme', '1996-06-01'),
	(29, 'Coleman', 'Zendaya', 'Femme', '1996-09-01'),
	(30, 'Theron', 'Charlize', 'Femme', '1975-08-07'),
	(31, 'Dunst', 'Kristen', 'Femme', '1982-04-30');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK__personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~0 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~0 rows (environ)
INSERT INTO `role` (`id_role`, `role`) VALUES
	(1, 'Jack Torrance'),
	(2, 'Wendy Torrance'),
	(3, 'Alex DeLarge'),
	(4, 'Mrs. Alexander'),
	(5, 'Humbert'),
	(6, 'Dolorès Haze'),
	(7, 'Mia'),
	(8, 'Pete Higgins'),
	(9, 'Ally Andrews'),
	(10, 'Hugh Andrews'),
	(11, 'Lorraine Warren'),
	(12, 'Ed Warren'),
	(13, 'Josh Lambert'),
	(14, 'Renai Lambert'),
	(15, 'Brian O Conner'),
	(16, 'Letty Ortiz'),
	(17, 'Justine'),
	(18, 'Alexia'),
	(19, 'Frowny the Clown'),
	(20, 'Spider-Man'),
	(21, 'Michelle Jones'),
	(22, 'Wonder Woman'),
	(23, 'Aileen'),
	(24, 'Bob Harris'),
	(25, 'Charlotte'),
	(26, 'Marie-Antoinette'),
	(27, 'Lux Lisbon');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

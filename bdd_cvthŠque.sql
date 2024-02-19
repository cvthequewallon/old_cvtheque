-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : db5001645630.hosting-data.io
-- Généré le : jeu. 15 fév. 2024 à 14:06
-- Version du serveur : 5.7.42-log
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs1365127`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`o1365127`@`%` PROCEDURE `AccepterEntreprise` (IN `LidCompteEntreprise` INT)   BEGIN
UPDATE entreprise SET Valider = 1 WHERE Id_Entreprise = LidCompteEntreprise;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherClasseParId` (IN `LId` INT)   BEGIN
SELECT * FROM classe WHERE IdClasse = LId;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherCVParClasse` (IN `LidClasse` INT)   BEGIN
SELECT eleve.prenom AS 'PrenomEleve', compte.Nom AS 'NomEleve', classe.Libelle AS 'NomClasse', cvenregistrer.IdEnregistrerCV AS 'IdCV', cvenregistrer.Nom AS 'NomCV' FROM eleve INNER JOIN compte ON eleve.id_eleve = compte.IdCompte INNER JOIN classe ON eleve.Id_classe = classe.IdClasse INNER JOIN cvenregistrer ON eleve.id_eleve = cvenregistrer.IdEleve WHERE classe.IdClasse = LidClasse;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherCVParEleve` (IN `LidEleve` INT)   BEGIN
	SELECT IdEnregistrerCV, Nom, IdModele FROM cvenregistrer WHERE IdEleve = LidEleve;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherEleves` ()   BEGIN
SELECT compte.Nom, eleve.Prenom, eleve.DateDeNaissance, compte.Email, eleve.Id_classe, eleve.id_eleve
FROM compte
INNER JOIN eleve ON compte.IdCompte = eleve.id_eleve;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherEleveSupprimer` ()   BEGIN
	SELECT * FROM comptesupprime;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherEmail` ()   BEGIN
	SELECT Email FROM compte;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherEntreprise` ()   BEGIN
SELECT entreprise.Id_Entreprise AS 'id Entreprise', entreprise.Valider 'Valider', entreprise.NumSiret AS 'Numéro de Siret', entreprise.Adresse AS 'Adresse', entreprise.CP AS 'Code Postal', entreprise.Ville AS 'Ville', entreprise.Telephone AS 'Telephone', compte.Nom AS 'Nom entreprise', compte.Email AS 'Email' FROM entreprise INNER JOIN compte ON entreprise.Id_Entreprise = compte.IdCompte;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherIdEleves` ()   BEGIN
SELECT id_eleve AS 'id' FROM eleve;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherIdEntreprises` ()   BEGIN
SELECT Id_Entreprise AS 'id' FROM entreprise;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherIdProfesseurs` ()   BEGIN
SELECT id_professeur AS 'id' FROM professeur;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherInfosEleveParEmail` (IN `LEmail` VARCHAR(100))   BEGIN
SELECT compte.IdCompte AS 'id', compte.Nom AS 'Nom', eleve.prenom AS 'Prenom', compte.Email AS 'Email', compte.MotDePasse AS 'Mot de passe', eleve.DateDeNaissance AS 'Date de Naissance', eleve.DateDeSuppression AS 'Date de Suppresion', eleve.Adresse AS 'Adresse', eleve.Ville AS 'Ville', eleve.CP AS 'Code postal', eleve.Telephone AS 'Telephone', classe.Libelle AS 'Classe', compte.darkmod AS 'darkmod' FROM eleve INNER JOIN compte ON eleve.id_eleve = compte.IdCompte INNER JOIN classe ON eleve.id_classe = classe.IdClasse WHERE compte.Email = LEmail;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherInfosEntreprise` (IN `LEmail` VARCHAR(100))   BEGIN
SELECT DISTINCT compte.IdCompte AS 'id', compte.Nom AS 'Nom', compte.Email AS 'Email', compte.MotDePasse AS 'Mot de passe', compte.darkmod AS 'darkmod', entreprise.NumSiret AS 'Numero de siret', entreprise.Adresse AS 'Adresse', entreprise.CP AS 'Code postal', entreprise.Ville AS 'Ville', entreprise.Telephone AS 'Telephone', entreprise.Valider AS 'Valider' FROM entreprise INNER JOIN compte ON entreprise.Id_Entreprise = compte.IdCompte INNER JOIN enseigner WHERE compte.Email = LEmail;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherInfosParId` (IN `LId` INT, IN `LeStatue` VARCHAR(50))   BEGIN
CASE LeStatue
	WHEN 'eleves' THEN
    	SELECT compte.IdCompte AS 'id', compte.Nom AS 'Nom', eleve.prenom AS 'Prenom', compte.Email AS 'Email', eleve.DateDeNaissance AS 'Date de Naissance', eleve.DateDeSuppression AS 'Date de Suppresion', eleve.Adresse AS 'Adresse', eleve.Ville AS 'Ville', eleve.CP AS 'Code postal', eleve.Telephone AS 'Telephone', classe.Libelle AS 'Classe', compte.darkmod AS 'darkmod' FROM eleve INNER JOIN compte ON eleve.id_eleve = compte.IdCompte INNER JOIN classe ON eleve.id_classe = classe.IdClasse WHERE compte.IdCompte = LId;
    WHEN 'professeurs' THEN
SELECT compte.IdCompte AS 'id', compte.Nom AS 'Nom', professeur.Prenom AS 'Prenom', compte.Email AS 'Email', professeur.Administrateur AS 'Droit Administrateur', classe.Libelle AS 'Classe',  compte.darkmod AS 'darkmod' FROM professeur  INNER JOIN compte ON professeur.Id_professeur = compte.IdCompte INNER JOIN enseigner ON professeur.Id_professeur = enseigner.Id_professeur INNER JOIN classe ON enseigner.Id_classe = classe.IdClasse WHERE compte.IdCompte = LId;
	WHEN 'entreprises' THEN
    	SELECT DISTINCT compte.IdCompte AS 'id', compte.Nom AS 'Nom', compte.Email AS 'Email', compte.darkmod AS 'darkmod', entreprise.NumSiret AS 'Numero de siret', entreprise.Adresse AS 'Adresse', entreprise.CP AS 'Code postal', entreprise.Ville AS 'Ville', entreprise.Telephone AS 'Telephone'  FROM entreprise INNER JOIN compte ON entreprise.Id_Entreprise = compte.IdCompte INNER JOIN enseigner WHERE compte.IdCompte = LId;
        WHEN 'administrateurs' THEN
        SELECT compte.IdCompte AS 'id', compte.Nom AS 'Nom', professeur.Prenom AS 'Prenom', compte.Email AS 'Email', professeur.Administrateur AS 'Droit Administrateur', classe.Libelle AS 'Classe',  compte.darkmod AS 'darkmod' FROM professeur  INNER JOIN compte ON professeur.Id_professeur = compte.IdCompte INNER JOIN enseigner ON professeur.Id_professeur = enseigner.Id_professeur INNER JOIN classe ON enseigner.Id_classe = classe.IdClasse WHERE compte.IdCompte = LId;
END CASE;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherInfosProfesseur` (IN `LEmail` VARCHAR(250))   BEGIN SELECT compte.IdCompte AS 'id', compte.Nom AS 'Nom', professeur.Prenom AS 'Prenom', compte.Email AS 'Email', compte.MotDePasse AS 'Mot de passe', professeur.Administrateur AS 'Droit Administrateur', compte.darkmod AS 'darkmod' FROM professeur  INNER JOIN compte ON professeur.Id_professeur = compte.IdCompte WHERE Email = LEmail; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherInfosStage` ()   BEGIN SELECT * FROM infostage; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherModele` ()   BEGIN
	SELECT balise, Nom FROM modelecv;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherModeleParClasse` (IN `LeNom` VARCHAR(50))   BEGIN
SELECT modelecv.IdModeleCV AS 'idModele', modelecv.Nom AS 'NomModele' FROM appartenir INNER JOIN modelecv ON appartenir.IdModeleCV = modelecv.IdModeleCV INNER JOIN classe ON appartenir.IdClasse = classe.IdClasse WHERE classe.Libelle = LeNom;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherModeleParId` (IN `Lid` INT)   BEGIN
	SELECT balise, Nom FROM modelecv WHERE IdModeleCV = Lid;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherProfesseurs` ()   BEGIN
SELECT professeur.Id_professeur, professeur.Prenom, professeur.Administrateur, compte.Nom, compte.Email, classe.Libelle
FROM compte
INNER JOIN professeur ON compte.IdCompte = professeur.Id_professeur
INNER JOIN enseigner ON professeur.Id_professeur = enseigner.Id_professeur
INNER JOIN classe ON enseigner.Id_classe = classe.IdClasse;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherSauvegardeCV` (IN `LidEleve` INT)   BEGIN
	SELECT cvenregistrer.IdEnregistrerCV AS 'idCV' FROM cvenregistrer INNER JOIN coordonnees ON cvenregistrer.IdEnregistrerCV = coordonnees.IdCoordonnees INNER JOIN objectif ON cvenregistrer.IdEnregistrerCV = objectif.IdObjectif INNER JOIN parcoursprofessionnel ON cvenregistrer.IdEnregistrerCV = parcoursprofessionnel.IdParcoursPro INNER JOIN competence ON cvenregistrer.IdEnregistrerCV = competence.IdCompetence WHERE cvenregistrer.IdEleve =  LidEleve;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherSauvegardeCVEleve` (IN `LidEleve` INT)   BEGIN
	SET @idCV = (SELECT IdEnregistrerCV FROM cvenregistrer WHERE IdEleve = LidEleve); 
	SELECT cvenregistrer.IdEnregistrerCV AS 'idCV', cvenregistrer.Nom AS 'NomCV', coordonnees.Nom AS 'NomCoordonnees', coordonnees.Prenom AS 'PrenomCoordonnees', coordonnees.Telephone AS 'TelephoneCoordonnees', coordonnees.Ville AS 'VilleCoordonnees', coordonnees.CP AS 'CPCoordonnees', coordonnees.Adresse AS 'AdresseCoordonnees', coordonnees.Email AS 'EmailCoordonnees', coordonnees.Permis AS 'PermisCoordonnees', objectif.Libelle AS 'ObjectifLibelle', parcoursprofessionnel.Fonction AS 'PPFonction', parcoursprofessionnel.Entreprise AS 'PPEntreprise', parcoursprofessionnel.Ville AS 'PPVille', parcoursprofessionnel.DateDebut AS 'PPDateDebut', parcoursprofessionnel.DateFin AS 'PPDateFin', parcoursprofessionnel.Description AS 'PPDescription', competence.Libelle AS 'CompetenceLibelle', competence.Niveau AS 'CompetenceNiveau', langue.Libelle AS 'LangueLibelle', langue.Niveau AS 'LangueNiveau', centreinteret.Libelle AS 'CILibelle' FROM cvenregistrer INNER JOIN coordonnees ON cvenregistrer.IdEnregistrerCV = coordonnees.IdCoordonnees INNER JOIN objectif ON cvenregistrer.IdEnregistrerCV = objectif.IdObjectif INNER JOIN parcoursprofessionnel ON cvenregistrer.IdEnregistrerCV = parcoursprofessionnel.IdParcoursPro INNER JOIN competence ON cvenregistrer.IdEnregistrerCV = competence.IdCompetence INNER JOIN langue ON cvenregistrer.IdEnregistrerCV = langue.Langue INNER JOIN centreinteret ON cvenregistrer.IdEnregistrerCV = centreinteret.IdCentreInteret WHERE cvenregistrer.IdEleve = LidEleve AND competence.IdCv = @idCV AND objectif.IdCv = @idCV AND parcoursprofessionnel.IdCV = @idCV AND competence.IdCv = @idCV AND langue.IdCv = @idCV AND centreinteret.IdCv = @idCv;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherTousCV` ()   BEGIN
SELECT cvenregistrer.IdEnregistrerCV AS 'idCV', cvenregistrer.Nom AS 'NomCV', cvenregistrer.IdModele AS 'idModele', coordonnees.Nom AS 'NomCoordonnees', coordonnees.Prenom AS 'PrenomCoordonnees', coordonnees.Telephone AS 'TelephoneCoordonnees', coordonnees.Ville AS 'VilleCoordonnees', coordonnees.CP AS 'CPCoordonnees', coordonnees.Adresse AS 'AdresseCoordonnees', coordonnees.Email AS 'EmailCoordonnees', coordonnees.Permis AS 'PermisCoordonnees', objectif.Libelle AS 'ObjectifLibelle', parcoursprofessionnel.Fonction AS 'PPFonction', parcoursprofessionnel.Entreprise AS 'PPEntreprise', parcoursprofessionnel.Ville AS 'PPVille', parcoursprofessionnel.DateDebut AS 'PPDateDebut', parcoursprofessionnel.DateFin AS 'PPDateFin', parcoursprofessionnel.Description AS 'PPDescription', competence.Libelle AS 'CompetenceLibelle', competence.Niveau AS 'CompetenceNiveau', langue.Libelle AS 'LangueLibelle', langue.Niveau AS 'LangueNiveau', centreinteret.Libelle AS 'CILibelle' FROM cvenregistrer INNER JOIN coordonnees ON cvenregistrer.IdEnregistrerCV = coordonnees.IdCv INNER JOIN objectif ON cvenregistrer.IdEnregistrerCV = objectif.IdCv INNER JOIN parcoursprofessionnel ON cvenregistrer.IdEnregistrerCV = parcoursprofessionnel.IdCv INNER JOIN competence ON cvenregistrer.IdEnregistrerCV = competence.IdCv INNER JOIN langue ON cvenregistrer.IdEnregistrerCV = langue.IdCv INNER JOIN centreinteret ON cvenregistrer.IdEnregistrerCV = centreinteret.IdCv;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherToutesClasses` ()   BEGIN
SELECT * FROM classe;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AfficherUnCV` (IN `LidCV` INT)   BEGIN     DECLARE nombre INT DEFAULT 0; 	CREATE TEMPORARY TABLE Informations(         NomCV VARCHAR(250),         IdModele INT,         NomC VARCHAR(100),         PrenomC VARCHAR(100),         TelephoneC VARCHAR(20),         VilleC VARCHAR(100),         CPC VARCHAR(100),         AdresseC VARCHAR(250),         EmailC VARCHAR(250),         PermisC TINYINT,         LibelleO VARCHAR(250)     );          SELECT cvenregistrer.Nom, cvenregistrer.IdModele, coordonnees.Nom, coordonnees.Prenom, coordonnees.Telephone, coordonnees.Ville, coordonnees.CP, coordonnees.Adresse, coordonnees.Email, coordonnees.Permis, objectif.Libelle INTO @NomCV, @IdModele, @NomC, @PrenomC, @TelephoneC, @VilleC, @CPC, @AdresseC, @EmailC, @PermisC, @LibelleO FROM cvenregistrer INNER JOIN coordonnees ON cvenregistrer.IdEnregistrerCV = coordonnees.IdCv INNER JOIN objectif ON cvenregistrer.IdEnregistrerCV = objectif.IdCv WHERE cvenregistrer.IdenregistrerCV = LidCV;          INSERT INTO Informations(NomCV, IdModele, NomC, PrenomC, TelephoneC, VilleC, CPC, AdresseC, EmailC, PermisC, LibelleO) VALUES (@NomCV, @IdModele, @NomC, @PrenomC, @TelephoneC, @VilleC, @CPC, @AdresseC, @EmailC, @PermisC, @LibelleO);    SET @NombrePP = (SELECT COUNT(*) FROM parcoursprofessionnel WHERE idCv = LidCV);          parcours_loop: LOOP    	IF nombre = @NombrePP THEN     	LEAVE parcours_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN FonctionCV1 VARCHAR(250),         		ADD COLUMN EntrepriseCV1 VARCHAR(250),         		ADD COLUMN VilleCV1 VARCHAR(250),                 ADD COLUMN DateDebutCV1 DATE,                 ADD COLUMN DateFinCV1 DATE,                 ADD COLUMN DescriptionCV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Fonction, Entreprise, Ville, DateDebut, DateFin, Description INTO @FonctionPP, @EntreprisePP, @VillePP, @DateDebutPP, @DateFinPP, @DescriptionPP FROM parcoursprofessionnel WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET FonctionCV1 = @FonctionPP;                 UPDATE Informations SET EntrepriseCV1 = @EntreprisePP;                 UPDATE Informations SET VilleCV1 = @VillePP;                 UPDATE Informations SET DateDebutCV1 = @DateDebutPP;                 UPDATE Informations SET DateFinCV1 = @DateFinPP;                 UPDATE Informations SET DescriptionCV1 = @DescriptionPP;             WHEN nombre = 2 THEN             ALTER TABLE Informations         		ADD COLUMN FonctionCV2 VARCHAR(250),         		ADD COLUMN EntrepriseCV2 VARCHAR(250),         		ADD COLUMN VilleCV2 VARCHAR(250),                 ADD COLUMN DateDebutCV2 DATE,                 ADD COLUMN DateFinCV2 DATE,                 ADD COLUMN DescriptionCV2 VARCHAR(250);                                  SET nombre = nombre-1;                  SELECT Fonction, Entreprise, Ville, DateDebut, DateFin, Description INTO @FonctionPP, @EntreprisePP, @VillePP, @DateDebut, @DateFin, @Description FROM parcoursprofessionnel WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET FonctionCV2 = @FonctionPP;                 UPDATE Informations SET EntrepriseCV2 = @EntreprisePP;                 UPDATE Informations SET VilleCV2 = @VillePP;                 UPDATE Informations SET DateDebutCV2 = @DateDebutPP;                 UPDATE Informations SET DateFinCV2 = @DateFinPP;                 UPDATE Informations SET DescriptionCV2 = @DescriptionPP;             WHEN nombre = 3 THEN         		ALTER TABLE Informations         		ADD COLUMN FonctionCV3 VARCHAR(250),         		ADD COLUMN EntrepriseCV3 VARCHAR(250),         		ADD COLUMN VilleCV3 VARCHAR(250),                 ADD COLUMN DateDebutCV3 DATE,                 ADD COLUMN DateFinCV3 DATE,                 ADD COLUMN DescriptionCV3 VARCHAR(250);                                  SET nombre = nombre-1;                  SELECT Fonction, Entreprise, Ville, DateDebut, DateFin, Description INTO @FonctionPP, @EntreprisePP, @VillePP, @DateDebut, @DateFin, @Description FROM parcoursprofessionnel WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET FonctionCV3 = @FonctionPP;                 UPDATE Informations SET EntrepriseCV3 = @EntreprisePP;                 UPDATE Informations SET VilleCV3 = @VillePP;                 UPDATE Informations SET DateDebutCV3 = @DateDebutPP;                 UPDATE Informations SET DateFinCV3 = @DateFinPP;                 UPDATE Informations SET DescriptionCV3 = @DescriptionPP;        	END CASE;     END LOOP parcours_loop;     SET nombre = 0;          SET @NombreCom = (SELECT COUNT(*) FROM competence WHERE idCv = LidCV);          competence_loop:LOOP    	IF nombre = @NombreCom THEN     	LEAVE competence_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleComV1 VARCHAR(250),         		ADD COLUMN NiveauComV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleCom, @NiveauCom FROM competence WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleComV1 = @LibelleCom;                 UPDATE Informations SET NiveauComV1 = @NiveauCom;             WHEN nombre = 2 THEN                 ALTER TABLE Informations         		ADD COLUMN LibelleComV2 VARCHAR(250),         		ADD COLUMN NiveauComV2 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleCom, @NiveauCom FROM competence WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleComV2 = @LibelleCom;                 UPDATE Informations SET NiveauComV2 = @NiveauCom;             WHEN nombre = 3 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleComV3 VARCHAR(250),         		ADD COLUMN NiveauComV3 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleCom, @NiveauCom FROM competence WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleComV3 = @LibelleCom;                 UPDATE Informations SET NiveauComV3 = @NiveauCom;              WHEN nombre = 4 THEN              ALTER TABLE Informations         		ADD COLUMN LibelleComV4 VARCHAR(250),         		ADD COLUMN NiveauComV4 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleCom, @NiveauCom FROM competence WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleComV4 = @LibelleCom;                 UPDATE Informations SET NiveauComV4 = @NiveauCom;        	END CASE;     END LOOP competence_loop;     SET nombre = 0;          SET @NombreLangue = (SELECT COUNT(*) FROM langue WHERE idCv = LidCV);          Langue_loop: LOOP    	IF nombre = @NombreLangue THEN     	LEAVE Langue_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleLangueV1 VARCHAR(250),         		ADD COLUMN NiveauLangueV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleLangue, @NiveauLangue FROM langue WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleLangueV1 = @LibelleLangue;                 UPDATE Informations SET NiveauLangueV1 = @NiveauLangue;             WHEN nombre = 2 THEN                 ALTER TABLE Informations         		ADD COLUMN LibelleLangueV2 VARCHAR(250),         		ADD COLUMN NiveauLangueV2 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleLangue, @NiveauLangue FROM langue WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleLangueV2 = @LibelleLangue;                 UPDATE Informations SET NiveauLangueV2 = @NiveauLangue;             WHEN nombre = 3 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleLangueV3 VARCHAR(250),         		ADD COLUMN NiveauLangueV3 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle, Niveau INTO @LibelleLangue, @NiveauLangue FROM langue WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleLangueV3 = @LibelleLangue;                 UPDATE Informations SET NiveauLangueV3 = @NiveauLangue;        	END CASE;     END LOOP Langue_loop;  	SET nombre = 0;          SET @NombreCI = (SELECT COUNT(*) FROM centreinteret WHERE idCv = LidCV);         CI_loop: LOOP    	IF nombre = @NombreCI THEN     	LEAVE CI_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleCIV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleCI FROM centreinteret WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleCIV1 = @LibelleCI;             WHEN nombre = 2 THEN                 ALTER TABLE Informations         		ADD COLUMN LibelleCIV2 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleCI FROM centreinteret WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleCIV2 = @LibelleCI;             WHEN nombre = 3 THEN 				ALTER TABLE Informations         		ADD COLUMN LibelleCIV3 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleCI FROM centreinteret WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleCIV3 = @LibelleCI;        	END CASE;     END LOOP CI_loop;     SET nombre = 0;          SET @NombreAtout = (SELECT COUNT(*) FROM atout WHERE idCv = LidCV);         Atout_loop: LOOP    	IF nombre = @NombreAtout THEN     	LEAVE Atout_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleAV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleA FROM atout WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleAV1 = @LibelleA;             WHEN nombre = 2 THEN                 ALTER TABLE Informations         		ADD COLUMN LibelleAV2 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleA FROM atout WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleAV2 = @LibelleA;             WHEN nombre = 3 THEN 				ALTER TABLE Informations         		ADD COLUMN LibelleAV3 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleA FROM atout WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleAV3 = @LibelleA;        	END CASE;     END LOOP Atout_loop;     SET nombre = 0;          SET @NombreInformatique = (SELECT COUNT(*) FROM informatique WHERE idCv = LidCV);         Informatique_loop:LOOP    	IF nombre = @NombreInformatique THEN     	LEAVE Informatique_loop;     END IF;     SET nombre = nombre + 1;     CASE         	WHEN nombre = 1 THEN         		ALTER TABLE Informations         		ADD COLUMN LibelleIV1 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleI FROM informatique WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleIV1 = @LibelleI;             WHEN nombre = 2 THEN                 ALTER TABLE Informations         		ADD COLUMN LibelleIV2 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleI FROM informatique WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleIV2 = @LibelleI;             WHEN nombre = 3 THEN 				ALTER TABLE Informations         		ADD COLUMN LibelleIV3 VARCHAR(250);                 SET nombre = nombre-1;                 SELECT Libelle INTO @LibelleI FROM informatique WHERE idCv = LidCV LIMIT 1 OFFSET nombre;                 SET nombre = nombre+1;                 UPDATE Informations SET LibelleIV3 = @LibelleI;        	END CASE;     END LOOP Informatique_loop;     SELECT * FROM Informations;     DROP TEMPORARY TABLE Informations; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterAtout` (IN `LidCV` INT, IN `LeNom` VARCHAR(250))   BEGIN
	INSERT INTO atout(Libelle, IdCv) VALUES (LeNom, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterCentreInteret` (IN `LidCV` INT, `LeNom` VARCHAR(250))   BEGIN
	INSERT INTO centreinteret(Libelle, IdCv) VALUES (LeNom, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterClasse` (IN `NomC` VARCHAR(100))   BEGIN INSERT INTO classe(Libelle) VALUES(NomC); END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterCompetence` (IN `LidCV` INT, IN `LeLibelle` VARCHAR(100), `LeNiveau` VARCHAR(100))   BEGIN
	INSERT INTO competence(Libelle, Niveau, IdCv) VALUES (LeLibelle, LeNiveau, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ajouterEleve` (IN `LeNom` VARCHAR(100), IN `LEmail` VARCHAR(100), IN `Lemotdepasse` VARCHAR(500), IN `LePrenom` VARCHAR(100), IN `LaDateDeNaissance` DATE, IN `LAdresse` VARCHAR(100), IN `LaVille` VARCHAR(100), IN `LeCodePostal` VARCHAR(6), IN `LeTelephone` VARCHAR(20), IN `LaClasse` INT)   BEGIN
	INSERT INTO compte(Nom, Email, MotDePasse) VALUES ( LeNom, LEmail, MD5(Lemotdepasse));
    SET @ideleve = (SELECT idCompte FROM compte WHERE Email = LEmail);
 	INSERT INTO eleve(id_eleve, prenom, DateDeNaissance, adresse, ville, Telephone, CP, id_classe, DateDeSuppression) VALUES(@ideleve, LePrenom, LaDateDeNaissance, LAdresse, LaVille, LeTelephone, LeCodePostal, LaClasse, CURDATE() + INTERVAL 3 YEAR);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ajouterEntrepriseEnAttenteAvecSiret` (IN `LeNom` VARCHAR(100), IN `LEmail` VARCHAR(100), IN `Lemotdepasse` VARCHAR(500), IN `LeNumSiret` VARCHAR(50), IN `LAdresse` VARCHAR(100), IN `LeCodePostal` VARCHAR(6), IN `LaVille` VARCHAR(100), IN `LeTelephone` VARCHAR(20))   BEGIN
INSERT INTO compte(Nom, Email, MotDePasse) VALUES (LeNom, LEmail, MD5(Lemotdepasse));
SET @identreprise = (SELECT idCompte FROM compte WHERE Email = LEmail);
INSERT INTO entreprise(Id_Entreprise, Valider, NumSiret, Adresse, CP, Ville, Telephone) VALUES(@identreprise, 0, LeNumSiret, LAdresse, LeCodePostal, LaVille, LeTelephone);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ajouterEntrepriseEnAttenteSansSiret` (IN `LeNom` VARCHAR(100), IN `LEmail` VARCHAR(100), IN `Lemotdepasse` VARCHAR(500), IN `LAdresse` VARCHAR(100), IN `LeCodePostal` VARCHAR(6), IN `LaVille` VARCHAR(100), IN `LeTelephone` VARCHAR(20))   BEGIN
INSERT INTO compte(Nom, Email, MotDePasse) VALUES (LeNom, LEmail, MD5(Lemotdepasse));
SET @identreprise = (SELECT idCompte FROM compte WHERE Email = LEmail);
INSERT INTO entreprise(Id_Entreprise, Valider, Adresse, CP, Ville, Telephone) VALUES(@identreprise, 0, LAdresse, LeCodePostal, LaVille, LeTelephone);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterInformatique` (IN `LidCV` INT, `LeNom` VARCHAR(250))   BEGIN
	INSERT INTO informatique(Libelle, IdCv) VALUES (LeNom, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterLangue` (IN `LidCV` INT, IN `LeNomLangue` VARCHAR(250), IN `LeNiveau` VARCHAR(100))   BEGIN
	INSERT INTO langue(Libelle, Niveau, IdCv) VALUES (LeNomLangue, LeNiveau, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterModele` (IN `LaBalise` LONGTEXT, IN `LeNom` VARCHAR(100))   BEGIN INSERT INTO modelecv(balise, Nom) VALUES (LaBalise, LeNom); END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterParcours` (IN `LidCV` INT, IN `LaFonction` VARCHAR(100), IN `LEntreprise` VARCHAR(100), IN `LaVille` VARCHAR(100), IN `LaDateDebut` DATE, IN `LaDateFin` DATE, IN `LaDescription` VARCHAR(1000))   BEGIN
	INSERT INTO parcoursprofessionnel(Fonction, Entreprise, Ville, DateDebut, DateFin, Description, IdCv) VALUES (LaFonction, LEntreprise, LaVille, LaDateDebut,  LaDateFin, LaDescription, LidCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AjouterPeriodeStage` (IN `laclasse` VARCHAR(5), IN `ladate_debut` DATE, IN `ladate_fin` DATE, IN `lesattente` LONGTEXT)   BEGIN INSERT INTO infostage(classe, date_debut, date_fin, attente)  VALUES (laclasse, ladate_debut, ladate_fin, lesattente); END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ajouterProfesseurUneClasse` (IN `LeNom` VARCHAR(100), IN `LEmail` VARCHAR(250), IN `Lemotdepasse` VARCHAR(500), IN `LePrenom` VARCHAR(100), IN `DroitAdministrateur` TINYINT, IN `LaClasse` INT)   BEGIN DECLARE idprofesseur INT DEFAULT 0; INSERT INTO compte(Nom, Email, MotDePasse) VALUES (LeNom, LEmail, MD5(Lemotdepasse)); SELECT IdCompte INTO idprofesseur FROM compte WHERE Email = LEmail; INSERT INTO professeur(Id_professeur, Prenom, Administrateur) VALUES (idprofesseur, LePrenom, DroitAdministrateur); INSERT INTO enseigner(Id_classe, Id_professeur) VALUES (LaClasse, idprofesseur); END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `assignerClasseProfesseur` (IN `Lid` INT, IN `LaClasse` INT)   BEGIN
INSERT INTO enseigner(Id_classe, Id_professeur) VALUES (LaClasse, Lid);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `AssocierModeleCVClasse` (IN `LIdClasse` INT, IN `LIdModeleCV` INT)   BEGIN
INSERT INTO appartenir(IdClasse, IdModeleCV) VALUES (LIdClasse, LIdModeleCV);
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ChangerMDPOublier` (IN `LEmail` VARCHAR(250), IN `LeMotDePasse` VARCHAR(500))   BEGIN
	UPDATE compte SET MotDePasse = MD5(LeMotDePasse) WHERE Email = LEmail;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ListeEntrepriseEnAttente` ()   BEGIN
SELECT compte.Nom AS 'Nom', compte.Email AS 'Email', entreprise.NumSiret AS 'Numéro siret', entreprise.Adresse AS 'Adresse', entreprise.CP AS 'Code Postal', entreprise.Ville AS 'Ville', entreprise.Telephone AS 'Telephone' FROM entreprise INNER JOIN compte ON entreprise.Id_Entreprise = compte.IdCompte WHERE entreprise.Valider = 0;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `MettreAJourInformation` (IN `Lid` INT, IN `type` VARCHAR(50), IN `Modification` VARCHAR(100), IN `Statue` VARCHAR(50))   BEGIN
CASE type
	WHEN 'MNom' THEN
    	UPDATE compte SET Nom = Modification WHERE idCompte = Lid;
    WHEN 'MPrenom' THEN
    	IF statue = 'eleves' THEN
    		UPDATE eleve SET Prenom = Modification WHERE id_eleve = Lid;
        ELSE
        	UPDATE professeur SET Prenom = Modification WHERE Id_professeur = Lid;
        END IF;
    WHEN 'MDDN' THEN
    	UPDATE eleve SET DateDeNaissance = Modification WHERE id_eleve = Lid;
    WHEN 'MEmail' THEN
    	UPDATE compte SET Email = Modification WHERE idCompte = Lid;
    WHEN 'MTelephone' THEN
    	IF statue = 'eleves' THEN
        	UPDATE eleve SET Telephone = Modification WHERE id_eleve = Lid;
        ELSE
        	UPDATE entreprise SET Telephone = Modification WHERE Id_Entreprise = Lid;
        END IF;
    WHEN 'MAdresse' THEN
    	IF statue = 'eleves' THEN
    		UPDATE eleve SET Adresse = Modification WHERE id_eleve = Lid;
        ELSE
        	UPDATE entreprise SET Adresse = Modification WHERE Id_Entreprise = Lid;
        END IF;
    WHEN 'MVille' THEN
    	IF statue = 'eleves' THEN
        	UPDATE eleve SET Ville = Modification WHERE id_eleve = Lid;
        ELSE
        	UPDATE entreprise SET Ville = Modification WHERE Id_Entreprise = Lid;
        END IF;
    WHEN 'MCP' THEN
    	IF statue = 'eleves' THEN
        	UPDATE eleve SET CP = Modification WHERE id_eleve = Lid;
        ELSE
        	UPDATE entreprise SET CP = Modification WHERE Id_Entreprise = Lid;
        END IF;
END CASE;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ModifierInfosStage` (IN `lId_infostage` INT, IN `laclasse` VARCHAR(5), IN `ladate_debut` DATE, IN `ladate_fin` DATE, IN `lesattente` LONGTEXT)   BEGIN UPDATE infostage     SET classe = laclasse, date_debut = ladate_debut, date_fin = ladate_fin, attente = lesattente     WHERE Id_infostage = lId_infostage; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `PremiereSauvegardeCV` (IN `LidEleve` INT, IN `LidModele` INT, IN `LeNomCV` VARCHAR(250), IN `LeNomCoordonnees` VARCHAR(100), IN `LePrenomCoordonnees` VARCHAR(100), IN `LeTelephoneCoordonnees` VARCHAR(20), IN `LaVilleCoordonnees` VARCHAR(100), IN `LeCPCoordonnees` VARCHAR(6), IN `LAdresseCoordonnees` VARCHAR(250), IN `LEmailCoordonnees` VARCHAR(250), IN `PermisCoordonnees` TINYINT, IN `LeLibelleObjectif` VARCHAR(1000), IN `LaFonctionParcours` VARCHAR(100), IN `LEntrepriseParcours` VARCHAR(100), IN `LaVilleParcours` VARCHAR(100), IN `LaDateDebutParcours` DATE, IN `LaDateFinParcours` DATE, IN `LaDescriptionParcours` VARCHAR(1000), IN `LeLibelleCompetence` VARCHAR(100), IN `LeNiveauCompetence` VARCHAR(100), IN `LeLibelleLangue` VARCHAR(100), IN `LeNiveauLangue` VARCHAR(100), IN `LeLibelleAtout` VARCHAR(250), IN `LeLibelleInformatique` VARCHAR(250), IN `LeLibelleCentre` VARCHAR(250))   BEGIN     INSERT INTO cvenregistrer(Nom, IdEleve, IdModele) VALUES (LeNomCV, LidEleve, LidModele);     SET @IdCV = (SELECT IdEnregistrerCV FROM cvenregistrer WHERE Nom = LeNomCV AND IdEleve = LidEleve);     INSERT INTO coordonnees(Nom, Prenom, Telephone, Ville, CP, Adresse, Email, Permis, IdCv) VALUES (LeNomCoordonnees, LePrenomCoordonnees, LeTelephoneCoordonnees, LaVilleCoordonnees, LeCPCoordonnees, LAdresseCoordonnees, LEmailCoordonnees, PermisCoordonnees, @IdCV);     INSERT INTO objectif(Libelle, IdCv) VALUES (LeLibelleObjectif, @IdCV);     INSERT INTO parcoursprofessionnel(Fonction, Entreprise, Ville, DateDebut, DateFin, Description, IdCv) VALUES (LaFonctionParcours, LEntrepriseParcours, LaVilleParcours, LaDateDebutParcours, LaDateFinParcours, LaDescriptionParcours, @IdCV);     INSERT INTO competence(Libelle, Niveau, IdCv) VALUES (LeLibelleCompetence, LeNiveauCompetence, @IdCV);     INSERT INTO langue(Libelle, Niveau, IdCv) VALUES (LeLibelleLangue, LeNiveauLangue, @IdCV);     INSERT INTO centreinteret(Libelle, IdCv) VALUES (LeLibelleCentre, @IdCV);     INSERT INTO atout(Libelle, IdCv) VALUES (LeLibelleAtout, @IdCV);     INSERT INTO informatique(Libelle, IdCv) VALUES (LeLibelleInformatique, @IdCV); END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `RestaurerEleve` (IN `LidSupprime` INT)   BEGIN
	SET @Nom = (SELECT Nom FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Email = (SELECT Email FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @MDP = (SELECT MotDePasse FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @darkmod = (SELECT Darkmod FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Prenom = (SELECT Prenom FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Naissance = (SELECT DateDeNaissance FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Adresse = (SELECT Adresse FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Ville = (SELECT Ville FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @CP = (SELECT CP FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Telephone = (SELECT Telephone FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @Classe = (SELECT Classe FROM comptesupprime WHERE IdSupprime = LidSupprime);
    SET @DateSupprime = (SELECT DateSuppressionOriginal FROM comptesupprime WHERE IdSupprime = LidSupprime);
    
    INSERT INTO compte(Nom, Email, MotDePasse, darkmod) VALUES (@Nom, @Email, @MDP, @darkmod);
    SET @id = (SELECT IdCompte FROM compte WHERE Email = @Email);
    INSERT INTO eleve(id_eleve, Prenom, DateDeNaissance, Adresse, Ville, CP, Telephone, Id_classe, DateDeSuppression) VALUES (@id, @Prenom, @Naissance, @Adresse, @Ville, @CP, @Telephone, @Classe, @DateSupprime);
    
    DELETE FROM comptesupprime WHERE IdSupprime = LidSupprime;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SuppressionDonneeParDate` (IN `DateSuppression` DATE)   BEGIN
	DECLARE termine TINYINT DEFAULT 0;
    DECLARE Lid INT DEFAULT NULL;
	DECLARE idcompteresultat CURSOR FOR SELECT id_eleve FROM eleve WHERE DateDeSuppression = DateSuppression;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET termine = 1;
    OPEN idcompteresultat;
    supprimeid: LOOP
    	FETCH idcompteresultat INTO Lid;
        IF termine = 1 THEN
        	LEAVE supprimeid;
        END IF;
        DELETE FROM compte WHERE IdCompte = Lid;
        DELETE FROM eleve WHERE id_eleve = Lid;
    END LOOP supprimeid;
    CLOSE idcompteresultat;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimeCompteAttenteParId` (IN `Lid` INT)   BEGIN
	DELETE FROM comptesupprime WHERE IdSupprime = Lid;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerClasse` (IN `lid` INT)   BEGIN DELETE FROM classe WHERE IdClasse = lid; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerCompteAttente` (IN `Date` DATE)   BEGIN
    DELETE FROM comptesupprime WHERE DateSuppression = Date;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerCVParId` (IN `idCV` INT)   BEGIN
  DELETE FROM cvenregistrer
  WHERE cvenregistrer.IdEnregistrerCV = idCV;

  DELETE FROM informatique
  WHERE informatique.IdCv = idCV;

  DELETE FROM atout
  WHERE atout.IdCv = idCV;

  DELETE FROM centreinteret
  WHERE centreinteret.IdCv = idCV;

  DELETE FROM langue
  WHERE langue.IdCv = idCV;

  DELETE FROM competence
  WHERE competence.IdCv = idCV;

  DELETE FROM parcoursprofessionnel
  WHERE parcoursprofessionnel.IdCv = idCV;

  DELETE FROM objectif
  WHERE objectif.IdCv = idCV;

  DELETE FROM coordonnees
  WHERE coordonnees.IdCv = idCV;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerEleve` (IN `id` INT)   BEGIN 	SET @Nom = (SELECT Nom FROM compte WHERE IdCompte = id);     SET @Email = (SELECT Email FROM compte WHERE IdCompte = id);     SET @MDP = (SELECT MotDePasse FROM compte WHERE IdCompte = id);     SET @darkmod = (SELECT darkmod FROM compte WHERE IdCompte = id);     SET @DateSuppresion = (SELECT DateDeSuppression FROM eleve WHERE id_eleve = id);     SET @Prenom = (SELECT Prenom FROM eleve WHERE id_eleve = id);     SET @Naissance = (SELECT DateDeNaissance FROM eleve WHERE id_eleve = id);     SET @Adresse = (SELECT Adresse FROM eleve WHERE id_eleve = id);     SET @Classe = (SELECT Id_classe FROM eleve WHERE id_eleve = id);     SET @Ville = (SELECT Ville FROM eleve WHERE id_eleve = id);     SET @CP = (SELECT CP FROM eleve WHERE id_eleve = id);     SET @Telephone = (SELECT Telephone FROM eleve WHERE id_eleve = id);          INSERT INTO comptesupprime(AncienIdCompte, Nom, Email, MotDePasse, darkmod, Photo, Prenom, DateDeNaissance, Adresse, Ville, CP, Telephone, DateSuppression, Classe, DateSuppressionOriginal) VALUES (id, @Nom, @Email, @MDP, @darkmod, 0, @Prenom, @Naissance, @Adresse, @Ville, @CP, @Telephone, CURDATE() + INTERVAL 1 MONTH, @Classe, @DateSuppresion); 	DELETE FROM eleve WHERE id_eleve = id;     DELETE FROM compte WHERE IdCompte = id; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerEntreprise` (IN `LId` INT)   BEGIN
	DELETE FROM entreprise WHERE id_Entreprise = LId;
    DELETE FROM compte WHERE idCompte = LId;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerInfosStage` (IN `lId_infostage` INT)   BEGIN 	DELETE FROM infostage      WHERE Id_infostage = lId_infostage; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerModele` (IN `Lid` INT)   BEGIN
	DELETE FROM modelecv WHERE idModeleCV = Lid;
    DELETE FROM appartenir WHERE IdModeleCV = Lid;
END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `SupprimerProfesseur` (IN `id` INT)   BEGIN DELETE FROM professeur WHERE Id_Professeur = id; DELETE FROM compte WHERE IdCompte = id; DELETE FROM enseigner WHERE Id_Professeur = id; END$$

CREATE DEFINER=`o1365127`@`%` PROCEDURE `ToutesClassesProfesseur` (IN `LId` INT)   BEGIN
SELECT classe.Libelle AS 'Classe', classe.IdClasse AS 'id' FROM classe INNER JOIN enseigner ON classe.IdClasse = enseigner.id_classe WHERE enseigner.Id_professeur = LId GROUP BY classe.Libelle;
END$$

--
-- Fonctions
--
CREATE DEFINER=`o1365127`@`%` FUNCTION `ChangerMDP` (`Lid` INT, `AncienMDP` VARCHAR(500), `NouveauMDP` VARCHAR(500)) RETURNS TINYINT(4)  BEGIN
SET @AMDR = (SELECT MotDePasse FROM compte WHERE IdCompte = Lid);
IF @AMDR = MD5(AncienMDP) THEN
	UPDATE compte SET MotDePasse = MD5(NouveauMDP) WHERE IdCompte = Lid;
    RETURN 1;
ELSE
	RETURN 0;
END IF;
END$$

CREATE DEFINER=`o1365127`@`%` FUNCTION `SeConnecter` (`LEmail` VARCHAR(100), `LeMotDePasse` VARCHAR(500)) RETURNS TINYINT(4)  BEGIN
	SET @email = (SELECT COUNT(*) FROM compte WHERE Email = LEmail);
    IF @email = 0 THEN
    	RETURN 0;
    ELSE
    	SET @motdepasse = (SELECT MotDePasse FROM compte WHERE Email = LEmail);
        IF @motdepasse != MD5(LeMotDePasse) THEN
        	RETURN 0;
        ELSE
        	RETURN 1;
        END IF;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `IdClasse` int(11) NOT NULL,
  `IdModeleCV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`IdClasse`, `IdModeleCV`) VALUES
(1, 72),
(2, 72),
(3, 72),
(4, 72),
(5, 72),
(6, 72),
(7, 72),
(8, 72);

-- --------------------------------------------------------

--
-- Structure de la table `atout`
--

CREATE TABLE `atout` (
  `IdAtout` int(11) NOT NULL,
  `Libelle` varchar(250) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `atout`
--

INSERT INTO `atout` (`IdAtout`, `Libelle`, `IdCv`) VALUES
(4, '', 20);

-- --------------------------------------------------------

--
-- Structure de la table `centreinteret`
--

CREATE TABLE `centreinteret` (
  `IdCentreInteret` int(11) NOT NULL,
  `Libelle` varchar(250) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `centreinteret`
--

INSERT INTO `centreinteret` (`IdCentreInteret`, `Libelle`, `IdCv`) VALUES
(19, 'Jouer à des jeux vidéo', 20);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `IdClasse` int(11) NOT NULL,
  `Libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`IdClasse`, `Libelle`) VALUES
(1, 'SIO1'),
(2, 'SIO2'),
(3, 'SAM1'),
(4, 'SAM2'),
(5, 'BANQUE1'),
(6, 'BANQUE2'),
(7, 'GLPA1'),
(8, 'GLPA2');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `IdCompetence` int(11) NOT NULL,
  `Libelle` varchar(100) DEFAULT NULL,
  `Niveau` varchar(100) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`IdCompetence`, `Libelle`, `Niveau`, `IdCv`) VALUES
(26, 'Développeur Web', 'Acquis', 20);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `IdCompte` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MotDePasse` varchar(500) NOT NULL,
  `darkmod` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Nom`, `Email`, `MotDePasse`, `darkmod`) VALUES
(1, 'Administrateur', 'Administrateur@Administrateur', '08743718469923be1c0c2864169d7a77', 0),
(2, 'Leroy', 'EstelleLeroy@supwallon.fr', '0c9396a42bcef527686493e6adba68c5', 1),
(3, 'ViveLaProgrammation', 'ViveLaProgrammation@contact.fr', '3c6d67b319e8ea98c75f0815095e795b', 0),
(4, 'UnEleve', 'UnEleve@sio1', 'adba8c0f9788b1a1e9a2f31896d42ac4', 0),
(5, 'BAUDRAIN', 'BAUDRAIN.Erwan@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(6, 'BILLIET', 'BILLIET.Charles@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(7, 'BOUTIFLAT', 'BOUTIFLAT.Kévin@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(8, 'BROQUET', 'BROQUET.Robby@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(9, 'CHAVATTE', 'CHAVATTE.Nicolas@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(10, 'CHIBANE', 'CHIBANE.Mehdi@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(11, 'CREPIN', 'CREPIN.Matthieu@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(12, 'CROMBEZ', 'CROMBEZ.Cyprien@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(13, 'DEFAUX', 'DEFAUX.Pierre@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(14, 'DELOFFE', 'DELOFFE.Raphael@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(15, 'DRUT', 'DRUT.Kylian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(16, 'DURET', 'DURET.Florian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(17, 'ESCOT', 'ESCOT.Florian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(18, 'GOFFETTE-WARIN', 'GOFFETTE-WARIN.Arthur@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(19, 'GRUMERMER', 'GRUMERMER.Brian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(20, 'HARLET', 'HARLET.Julien@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(21, 'HAVET', 'HAVET.Louis@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(22, 'IVANOUSKI', 'IVANOUSKI.Bahdan@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(23, 'JONNEAUX', 'JONNEAUX.Théo@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(24, 'KHAMADJ', 'KHAMADJ.Hamza@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(25, 'LAMBUSTA', 'LAMBUSTA.Lorenzo@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(26, 'LAROCHETTE', 'LAROCHETTE.Florian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(27, 'LEROY', 'LEROY.Julian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(28, 'LIN', 'LIN.Lydie@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(29, 'LOOTEN', 'LOOTEN.Alexis@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(30, 'PEREK', 'PEREK.Corentin@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(31, 'PLUMAT', 'PLUMAT.Dorian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(32, 'QUINET', 'QUINET.Florian@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(33, 'RADOUAN', 'RADOUAN.Théo@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(34, 'RENAUD', 'RENAUD.Clément@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(35, 'REY', 'REY.Felix@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(36, 'SERGUEEV', 'SERGUEEV.Eric@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(37, 'SHAHZAD', 'SHAHZAD.Abdul@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(38, 'TAOUTAOU', 'TAOUTAOU.Judicael@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(39, 'VANDENBOGAERDE', 'VANDENBOGAERDE.Clement@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(40, 'VIVIER', 'VIVIER.Axel@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(41, 'WALERS', 'WALERS.Mathias@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(42, 'YARDIN', 'YARDIN.Calvin@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(43, 'ZADDAME', 'ZADDAME.Sarah@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(44, 'ZERIAT', 'ZERIAT.Djalal@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0),
(45, 'ZOUHIR', 'ZOUHIR.Anasse@supwallon.com', '71ec2af811cdf898bce6904a75a48d75', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comptesupprime`
--

CREATE TABLE `comptesupprime` (
  `IdSupprime` int(11) NOT NULL,
  `AncienIdCompte` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MotDePasse` varchar(500) DEFAULT NULL,
  `Darkmod` tinyint(4) DEFAULT NULL,
  `Photo` varchar(250) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `Adresse` varchar(250) DEFAULT NULL,
  `Ville` varchar(250) DEFAULT NULL,
  `CP` varchar(6) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `DateSuppression` date DEFAULT NULL,
  `Classe` int(11) DEFAULT NULL,
  `DateSuppressionOriginal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `consulterentreprise`
--

CREATE TABLE `consulterentreprise` (
  `IdEntreprise` int(11) NOT NULL,
  `IdCV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `consulterprofesseur`
--

CREATE TABLE `consulterprofesseur` (
  `IdProfesseur` int(11) NOT NULL,
  `IdCV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `IdCoordonnees` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `CP` varchar(6) DEFAULT NULL,
  `Adresse` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Permis` tinyint(4) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`IdCoordonnees`, `Nom`, `Prenom`, `Telephone`, `Ville`, `CP`, `Adresse`, `Email`, `Permis`, `IdCv`) VALUES
(18, 'Braem', 'Pierre', '06 06 06 06 06', 'Valenciennes', '59300', '16 place de la république', 'pierrebraem@orange.fr', 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `cvenregistrer`
--

CREATE TABLE `cvenregistrer` (
  `IdEnregistrerCV` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `IdEleve` int(11) NOT NULL,
  `IdModele` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `cvenregistrer`
--

INSERT INTO `cvenregistrer` (`IdEnregistrerCV`, `Nom`, `IdEleve`, `IdModele`) VALUES
(20, 'CV présentation', 4, 72);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(11) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `DateDeNaissance` date NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `CP` varchar(6) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Id_classe` int(11) NOT NULL,
  `DateDeSuppression` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `Prenom`, `DateDeNaissance`, `Adresse`, `Ville`, `CP`, `Telephone`, `Id_classe`, `DateDeSuppression`) VALUES
(4, 'UnEleve', '2021-02-09', '63 rue de la peur', 'Valenciennes', '59300', '0', 1, '2024-02-09'),
(5, 'Erwan', '2000-03-30', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(6, 'Charles', '2000-05-11', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(7, 'Kévin', '2002-10-26', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(8, 'Robby', '2002-09-17', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(9, 'Nicolas', '2002-02-18', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(10, 'Mehdi', '2001-09-16', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(11, 'Matthieu', '2002-03-07', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(12, 'Cyprien', '2002-02-25', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(13, 'Pierre', '2001-07-02', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(14, 'Raphael', '2002-06-14', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(15, 'Kylian', '2002-03-28', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(16, 'Florian', '2001-09-13', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(17, 'Florian', '1998-09-02', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(18, 'Arthur', '2002-04-14', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(19, 'Brian', '2001-10-21', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(20, 'Julien', '2002-05-28', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(21, 'Louis', '2000-12-28', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(22, 'Bahdan', '2002-04-06', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(23, 'Théo', '2002-11-18', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(24, 'Hamza', '2001-09-13', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(25, 'Lorenzo', '2002-08-02', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(26, 'Florian', '2002-05-07', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(27, 'Julian', '2003-02-11', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(28, 'Lydie', '2001-06-13', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(29, 'Alexis', '2002-10-20', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(30, 'Corentin', '2001-11-07', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(31, 'Dorian', '2001-06-19', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(32, 'Florian', '2002-10-20', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(33, 'Théo', '2001-12-18', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(34, 'Clément', '2002-04-29', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(35, 'Felix', '2002-01-31', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(36, 'Eric', '2002-04-13', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(37, 'Abdul', '2002-08-29', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(38, 'Judicael', '2002-10-15', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(39, 'Clement', '2001-09-13', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(40, 'Axel', '2000-02-04', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(41, 'Mathias', '2000-09-07', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(42, 'Calvin', '2001-12-11', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(43, 'Sarah', '2001-04-06', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(44, 'Djalal', '2000-10-29', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09'),
(45, 'Anasse', '2001-05-21', 'adresse', 'ville', 'CP', 'TEL', 1, '2024-02-09');

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

CREATE TABLE `enseigner` (
  `Id_classe` int(11) NOT NULL,
  `Id_professeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`Id_classe`, `Id_professeur`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `Id_Entreprise` int(11) NOT NULL,
  `Valider` tinyint(4) NOT NULL,
  `NumSiret` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CP` varchar(6) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`Id_Entreprise`, `Valider`, `NumSiret`, `Adresse`, `CP`, `Ville`, `Telephone`) VALUES
(3, 1, NULL, '16 Place de la République', '59300', 'Valenciennes', '03 27 19 30 40');

-- --------------------------------------------------------

--
-- Structure de la table `informatique`
--

CREATE TABLE `informatique` (
  `IdInformatique` int(11) NOT NULL,
  `Libelle` varchar(250) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `informatique`
--

INSERT INTO `informatique` (`IdInformatique`, `Libelle`, `IdCv`) VALUES
(4, '', 20);

-- --------------------------------------------------------

--
-- Structure de la table `infostage`
--

CREATE TABLE `infostage` (
  `Id_infostage` int(11) NOT NULL,
  `classe` varchar(5) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `attente` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `Langue` int(11) NOT NULL,
  `Libelle` varchar(100) DEFAULT NULL,
  `Niveau` varchar(100) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`Langue`, `Libelle`, `Niveau`, `IdCv`) VALUES
(21, 'Anglais', 'B1', 20);

-- --------------------------------------------------------

--
-- Structure de la table `modelecv`
--

CREATE TABLE `modelecv` (
  `IdModeleCV` int(11) NOT NULL,
  `balise` varchar(10000) DEFAULT NULL,
  `Nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `modelecv`
--

INSERT INTO `modelecv` (`IdModeleCV`, `balise`, `Nom`) VALUES
(56, '\r\n    <divtest style=\"display:block;width: 100%;height: 100%;position:relative;overflow:hidden;\">\r\n                            <divImage style=\"background-color:#117596;position: Absolute;height:20%;width: 100%;margin-left: 0%;margin-top: 0%;\">\r\n                                <img id=\"photo_upload\" style=\"width: 100px;height: 100px;margin:3%\" class=\"border border-secondary\" />\r\n                            </divImage>\r\n                            <divProfil style=\"background-color:#117596;position: Absolute;height:20%;width: 100%;margin-left: 30%;margin-top: 0%;\">\r\n                                <Nom style=\"font-size:90%;\">Nom</Nom>\r\n                                <prenom style=\"font-size:90%;\">Prenom</prenom><br>\r\n                                Tel: <Tel style=\"font-size:70%;\">06 ** ** ** **</Tel><br>\r\n                                Adresse: <br>\r\n                                <Adresse style=\"font-size:70%;\">5 Rue de Paris</Adresse style=\"font-size:70%;\"><br>\r\n                                <ville style=\"font-size:70%;\">Valenciennes</ville>\r\n                                <cp style=\"font-size:70%;\">59700</cp><br>\r\n                                Email: <Email style=\"font-size:70%;\">Test.test@gmail.com</Email><br>\r\n                                <Permis></Permis>\r\n                            </divProfil>\r\n                            <divParcour style=\"background-color:#ADD8E6;position: Absolute ;height:81%;width: 50%;margin-left: 0%;margin-top: 28%;\">\r\n                                <p style=\"margin-top: 10px;\"> Parcours professionnel</p>\r\n                                <div class=\"row\">\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Debut style=\"font-size:70%;\">Date debut</Debut><br>\r\n                                        <Fin style=\"font-size:70%;\">Date Fin</Fin>\r\n                                    </div>\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Entreprise style=\"font-size:70%;\">entreprise d accueil</Entreprise><br>\r\n                                        <VilleP style=\"font-size:70%;\">Ville</VilleP><br>\r\n                                        <Fonction style=\"font-size:70%;\">Fonction</Fonction>\r\n                                    </div>\r\n                                </div>\r\n                                <div style=\"line-height:10px;\">\r\n                                    <DescriptionP style=\"font-size:70%;\">Description</DescriptionP><br><br>\r\n                                </div>\r\n                                <div class=\"row\">\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Debut2 style=\"font-size:70%;\">Date debut</Debut2><br>\r\n                                        <Fin2 style=\"font-size:70%;\">Date Fin</Fin2>\r\n                                    </div>\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Entreprise2 style=\"font-size:70%;\">entreprise d accueil</Entreprise2><br>\r\n                                        <VilleP2 style=\"font-size:70%;\">Ville</VilleP2><br>\r\n                                        <Fonction2 style=\"font-size:70%;\">Fonction</Fonction2>\r\n                                    </div>\r\n                                </div>\r\n                                <div style=\"line-height:10px;\">\r\n                                    <DescriptionP2 style=\"font-size:70%;\">Description</DescriptionP2><br><br>\r\n                                </div>\r\n\r\n                                <div class=\"row\">\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Debut3 style=\"font-size:70%;\">Date Debut</Debut3><br>\r\n                                        <Fin3 style=\"font-size:70%;\">Date Fin</Fin3>\r\n                                        <Fonction3 style=\"font-size:70%;\">Fonction</Fonction3>\r\n                                    </div>\r\n                                    <div class=\"col\" style=\"line-height:20px;\">\r\n                                        <Entreprise3 style=\"font-size:70%;\">entreprise d accueil</Entreprise3><br><br>\r\n                                        <VilleP3 style=\"font-size:70%;\">Ville</VilleP3>\r\n                                    </div>\r\n                                </div>\r\n                                <div style=\"line-height:10px;\">\r\n                                    <DescriptionP3 style=\"font-size:70%;\">Description</DescriptionP3><br><br>\r\n                                </div>\r\n                            </divParcour>\r\n                            <divObjectif style=\"background-color:#ADD8E6;position: Absolute ;height:35%;width: 50%;margin-left: 50%;margin-top: 28%;\">\r\n                                <p style=\"margin-top: 50px;\">Objectif</p>\r\n                                <div style=\"line-height:10px;\">\r\n                                    <Objectif style=\" margin-top:10px;font-size:70%;\">Description de ton Objectif</Objectif><br>\r\n                                </div>\r\n                            </divObjectif>\r\n<divCompetences></divCompetences>\r\n<divlangues></divlangues>\r\n<divAtouts></divAtouts>\r\n<divInformatique></divInformatique>\r\n<divCentreinteret></divCentreinteret>\r\n                        </divtest>\r\n    ', 'Mon Cv'),
(72, '<divImage style=\"background-color:#0037ff; position:absolute;  height:160px; width:160px; margin-left: 0px;margin-top: 0px;\"><img id=\"photo_upload\" style=\"width: 150px;height: 150px;margin:3%\" class=\"border border-secondary\"/></divImage>\r\n    <divProfil style=\"background-color:#0040ff;color:#000000; position:absolute;  height:160px; width:438px; margin-left: 160px;margin-top: 0px;\"><Nom style=\"font-size:90%;\">Nom</Nom><prenom style=\"font-size:90%;\">Prenom</prenom><br>Tel: <Tel style=\"font-size:70%;\">06 ** ** ** **</Tel><br>Adresse: <br><Adresse style=\"font-size:70%;\">5 Rue de Paris</Adresse><br><ville style=\"font-size:70%;\">Valenciennes</ville><cp style=\"font-size:70%;\">59700</cp><br>Email: <Email style=\"font-size:70%;\">Test.test@gmail.com</Email><br><Permis></Permis></divProfil><divObjectif style=\"background-color:#adadad;color:#000000; position:absolute;  height:160px; width:594px; margin-left: 0px;margin-top: 680px;\"><p style=\"margin-top: 50px;\">Objectif</p><div style=\"line-height:10px;\"><Objectif style=\" margin-top:10px;font-size:70%;\">Description de ton Objectif</Objectif><br></div></divObjectif><divParcour style=\"background-color:#ffffff;color:#000000; position:absolute;  height:298px; width:297px; margin-left: 0px;margin-top: 160px;\"><p style=\"margin-top: 10px;\"> Parcours professionnel</p><div class=\"row\"><div class=\"col\" style=\"line-height:20px;\"><Debut style=\"font-size:70%;\">Date debut</Debut><br><Fin style=\"font-size:70%;\">Date Fin</Fin></div><div class=\"col\" style=\"line-height:20px;\"><Entreprise style=\"font-size:70%;\">entreprise d accueil</Entreprise><br><VilleP style=\"font-size:70%;\">Ville</VilleP><br><Fonction style=\"font-size:70%;\">Fonction</Fonction></div></div><div style=\"line-height:10px;\"><DescriptionP style=\"font-size:70%;\">Description</DescriptionP><br><br></div><div class=\"row\"><div class=\"col\" style=\"line-height:20px;\"><Debut2 style=\"font-size:70%;\">Date debut</Debut2><br><Fin2 style=\"font-size:70%;\">Date Fin</Fin2></div><div class=\"col\" style=\"line-height:20px;\"><Entreprise2 style=\"font-size:70%;\">entreprise d accueil</Entreprise2><br><VilleP2 style=\"font-size:70%;\">Ville</VilleP2><br><Fonction2 style=\"font-size:70%;\">Fonction</Fonction2></div></div><div style=\"line-height:10px;\"><DescriptionP2 style=\"font-size:70%;\">Description</DescriptionP2><br><br></div><div class=\"row\"><div class=\"col\" style=\"line-height:20px;\"><Debut3 style=\"font-size:70%;\">Date Debut</Debut3><br><Fin3 style=\"font-size:70%;\">Date Fin</Fin3><Fonction3 style=\"font-size:70%;\">Fonction</Fonction3></div><div class=\"col\" style=\"line-height:20px;\"><Entreprise3 style=\"font-size:70%;\">entreprise d accueil</Entreprise3><br><br></div></div><div style=\"line-height:10px;\"><DescriptionP3 style=\"font-size:70%;\">Description</DescriptionP3><br><br></div></divParcour><divlangues style=\"background-color:#ffffff;color:#000000; position:absolute;  height:369px; width:281px; margin-left: 0px;margin-top: 476px;\">Langues<p style=\"line-height:10px;\"><Langues style=\"font-size:60%;\"></Langues> <NiveauxLangues style=\"font-size:60%;\"></NiveauxLangues></br><Langues2 style=\"font-size:60%;\"></Langues2> <NiveauxLangues2 style=\"font-size:60%;\"></NiveauxLangues2></br><Langues3 style=\"font-size:60%;\"></Langues3> <NiveauxLangues3 style=\"font-size:60%;\"></NiveauxLangues3></p></divlangues><divCompetences style=\"background-color:#ffffff;color:#000000; position:absolute;  height:305px; width:301px; margin-left: 296px;margin-top: 169.5px;\">Competences<p style=\"line-height:10px;\"><Competence style=\"font-size:60%;\">Competences</Competence><a1 style=\"font-size:60%;\"> :</a1><br><Competencev2 style=\"font-size:70% ;\">Acquis</Competencev2><br><br><Competence2 style=\"font-size:70%;\">Competences</Competence2><a1 style=\"font-size:60%;\"> :</a1><br><Competence2v2 style=\"font-size:70%;\">Acquis</Competence2v2><br><br><Competence3 style=\"font-size:70%;\">Competences</Competence3><a1 style=\"font-size:60%;\"> :</a1><br><Competence3v2 style=\"font-size:70%;\">Acquis</Competence3v2><br><br> <Competence4 style=\"font-size:70%;\">Competences</Competence4><a1 style=\"font-size:60%;\"> :</a1><br><Competence4v2 style=\"font-size:70%;\">Acquis</Competence4v2><br><br></p></divCompetences><divCentredinteret style=\"background-color:#ffffff;color:#ffffff; position:absolute;  height:369px; width:316.5px; margin-left: 281px;margin-top: 476px;\">Centre dintêret<p style=\"font-size: 10px;\"><interet style=\"font-size:60%\"></interet></br><interet2 style=\"font-size:60%\"></interet2></br><interet3 style=\"font-size:60%\"></interet3></p></divCentredinteret>', 'Modèle CV présentation');

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

CREATE TABLE `objectif` (
  `IdObjectif` int(11) NOT NULL,
  `Libelle` varchar(1000) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`IdObjectif`, `Libelle`, `IdCv`) VALUES
(18, '', 20);

-- --------------------------------------------------------

--
-- Structure de la table `parcoursprofessionnel`
--

CREATE TABLE `parcoursprofessionnel` (
  `IdParcoursPro` int(11) NOT NULL,
  `Fonction` varchar(100) DEFAULT NULL,
  `Entreprise` varchar(100) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `IdCv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `parcoursprofessionnel`
--

INSERT INTO `parcoursprofessionnel` (`IdParcoursPro`, `Fonction`, `Entreprise`, `Ville`, `DateDebut`, `DateFin`, `Description`, `IdCv`) VALUES
(23, 'Développeur web', 'Radio Club', 'Valenciennes', '2021-01-04', '2021-02-15', 'Développer ce Site Internet', 20);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `Id_professeur` int(11) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Administrateur` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`Id_professeur`, `Prenom`, `Administrateur`) VALUES
(1, 'Administrateur', 1),
(2, 'Estelle', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`IdClasse`,`IdModeleCV`),
  ADD KEY `IdModeleCV` (`IdModeleCV`);

--
-- Index pour la table `atout`
--
ALTER TABLE `atout`
  ADD PRIMARY KEY (`IdAtout`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `centreinteret`
--
ALTER TABLE `centreinteret`
  ADD PRIMARY KEY (`IdCentreInteret`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`IdClasse`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`IdCompetence`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`);

--
-- Index pour la table `comptesupprime`
--
ALTER TABLE `comptesupprime`
  ADD PRIMARY KEY (`IdSupprime`);

--
-- Index pour la table `consulterentreprise`
--
ALTER TABLE `consulterentreprise`
  ADD PRIMARY KEY (`IdEntreprise`,`IdCV`),
  ADD KEY `IdCV` (`IdCV`);

--
-- Index pour la table `consulterprofesseur`
--
ALTER TABLE `consulterprofesseur`
  ADD PRIMARY KEY (`IdProfesseur`,`IdCV`),
  ADD KEY `IdCV` (`IdCV`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`IdCoordonnees`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `cvenregistrer`
--
ALTER TABLE `cvenregistrer`
  ADD PRIMARY KEY (`IdEnregistrerCV`),
  ADD KEY `IdEleve` (`IdEleve`),
  ADD KEY `IdModele` (`IdModele`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `Id_classe` (`Id_classe`);

--
-- Index pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD PRIMARY KEY (`Id_classe`,`Id_professeur`),
  ADD KEY `Id_professeur` (`Id_professeur`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD KEY `Id_Entreprise` (`Id_Entreprise`);

--
-- Index pour la table `informatique`
--
ALTER TABLE `informatique`
  ADD PRIMARY KEY (`IdInformatique`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `infostage`
--
ALTER TABLE `infostage`
  ADD PRIMARY KEY (`Id_infostage`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`Langue`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `modelecv`
--
ALTER TABLE `modelecv`
  ADD PRIMARY KEY (`IdModeleCV`);

--
-- Index pour la table `objectif`
--
ALTER TABLE `objectif`
  ADD PRIMARY KEY (`IdObjectif`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `parcoursprofessionnel`
--
ALTER TABLE `parcoursprofessionnel`
  ADD PRIMARY KEY (`IdParcoursPro`),
  ADD KEY `IdCv` (`IdCv`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD KEY `Id_professeur` (`Id_professeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `atout`
--
ALTER TABLE `atout`
  MODIFY `IdAtout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `centreinteret`
--
ALTER TABLE `centreinteret`
  MODIFY `IdCentreInteret` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `IdClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `IdCompetence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `IdCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `comptesupprime`
--
ALTER TABLE `comptesupprime`
  MODIFY `IdSupprime` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `IdCoordonnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `cvenregistrer`
--
ALTER TABLE `cvenregistrer`
  MODIFY `IdEnregistrerCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `informatique`
--
ALTER TABLE `informatique`
  MODIFY `IdInformatique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `infostage`
--
ALTER TABLE `infostage`
  MODIFY `Id_infostage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `Langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `modelecv`
--
ALTER TABLE `modelecv`
  MODIFY `IdModeleCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `objectif`
--
ALTER TABLE `objectif`
  MODIFY `IdObjectif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `parcoursprofessionnel`
--
ALTER TABLE `parcoursprofessionnel`
  MODIFY `IdParcoursPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

DELIMITER $$
--
-- Évènements
--
CREATE DEFINER=`o1365127`@`%` EVENT `SuppressionDonneesDate` ON SCHEDULE EVERY 1 DAY STARTS '2021-02-15 01:00:00' ON COMPLETION PRESERVE DISABLE ON SLAVE DO BEGIN
	CALL SuppressionDonneeParDate(CURDATE());
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

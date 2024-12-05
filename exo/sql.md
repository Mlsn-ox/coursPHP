# Exercice SQL

### Exercice 1 : Afficher toutes les données

SELECT \* FROM `personnes`

### Exercice 2 : Trier les personnes par âge

SELECT \* FROM `personnes`  
ORDER BY `age` ASC

### Exercice 3 : Trouver les personnes majeures

SELECT \* FROM `personnes`  
WHERE `age`>=18;

### Exercice 4 : Rechercher une personne par son prénom

SELECT \* FROM `personnes`  
WHERE `prenom` = 'Amanda'

### Exercice 5 : Compter le nombre total de personnes

SELECT COUNT(\*) FROM `personnes`;

### Exercice 6 : Modifier l'email d'une personne

UPDATE `personnes`  
SET `email`= REPLACE(`email`, 'douglassilva@yahoo.com', 'nouveau@gmail.com')  
WHERE `id`=3

### Exercice 7 : Supprimer une personne de la table

DELETE FROM `personnes`  
WHERE `id`=5

### Exercice 8 : Trouver les emails contenant un domaine spécifique

UPDATE `personnes`  
SET `email` = REPLACE(`email`, 'gmail.com', 'gogole.com')  
WHERE `email` LIKE '%gmail.com%';

### Exercice 9 : Trouver l'âge moyen des personnes

SELECT AVG(`age`) as `moyenne_age`  
FROM `personnes`

### Exercice 10 : Grouper par domaine d'email et compter les utilisateurs

(SELECT COUNT(\*)  
FROM `personnes` AS `nbr_gogole`  
WHERE `email` LIKE '%gogole%')  
C'est pas ça, j'avais pas bien lu la question.

SELECT SUBSTRING_INDEX(`email`, '@', -1) AS `email_account`, COUNT(\*) AS `total_users`  
FROM `personnes`  
GROUP BY `email_account`

### Exercice 11 : Trouver les 3 personnes les plus âgées

SELECT `prenom`, `nom`, `age`  
FROM `personnes`  
ORDER BY `age` DESC  
LIMIT 3

### Exercice 12 : Vérifier les doublons par email

SELECT SUBSTRING_INDEX(`email`, '@', -1) AS `Email Acount`,  
COUNT(\*) AS `Total Users`  
FROM `personnes`  
GROUP BY `Email Acount`  
HAVING `Total Users` >2

### Exercice 13 : Créer une liste des personnes par tranche d’âge

SELECT (CASE  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEN `age` > 30 THEN "Plus de 30 ans"  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ELSE "Entre 18 et 30 ans"  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;END) AS `tranche_age`, COUNT(\*) AS `total`  
FROM `personnes`  
GROUP BY `tranche_age`

### Exercice 14 : Rechercher les noms similaires avec une correspondance partielle

SELECT `prenom`, `nom`  
FROM `personnes`  
WHERE `prenom` LIKE '%and%'

### Exercice 15 : Combiner des critères multiples

SELECT \*
FROM `personnes`  
WHERE `prenom` LIKE 'A%'  
AND `age`>30  
AND `email` LIKE '%gogole%'

### Exercice 16 : Trouver l'âge maximum et minimum par domaine d'email

SELECT SUBSTRING_INDEX(`email`, '@', -1) AS `Email Acount`, COUNT(\*) AS `Total Users`, MIN(`age`), MAX(`age`)  
FROM `personnes`  
GROUP BY `Email Acount`  
HAVING `Total Users` > 2

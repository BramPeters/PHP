CREATE DATABASE IF NOT EXISTS cursusphp;
USE cursusphp;

DROP TABLE IF EXISTS films;
CREATE TABLE films (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  titel varchar(150) NOT NULL,
  duurtijd int(10) unsigned NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO films (id,titel,duurtijd) VALUES 
 (1,'Shawshank Redemption, The',142),
 (2,'Godfather, The',168),
 (3,'Green Mile, The',188),
 (4,'Pulp Fiction',154),
 (5,'Once Upon a Time in the West',165),
 (6,'Lord of the Rings: The Return of the King, The',201),
 (7,'Se7en',127),
 (8,'Schindler\'s List',195),
 (9,'Forrest Gump',142);

DROP TABLE IF EXISTS gastenboek;
CREATE TABLE gastenboek (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  auteur varchar(45) NOT NULL,
  boodschap varchar(250) NOT NULL,
  datum datetime NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO gastenboek (id,auteur,boodschap,datum) VALUES 
 (2,'Bezoeker','Even testen of het gastenboek werkt...','2010-05-11 09:22:44'),
 (3,'Admin','Het werkt inderdaad.','2010-05-11 09:24:13');
 

DROP TABLE IF EXISTS modules;
CREATE TABLE modules (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  naam varchar(50) NOT NULL,
  prijs float NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO modules (id,naam,prijs) VALUES 
 (1,'Programmatielogica',75),
 (2,'Computers en netwerken',130),
 (4,'SQL',99.9),
 (5,'Objectgeoriënteerde principes',85),
 (6,'Javascript / DOM',140),
 (7,'JQuery',120),
 (8,'UML',90),
 (9,'PHP',140),
 (11,'XHTML/CSS',120);


DROP TABLE IF EXISTS personen;
CREATE TABLE personen (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  familienaam varchar(50) NOT NULL,
  voornaam varchar(30) NOT NULL,
  geboortedatum date NOT NULL,
  geslacht char(1) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO personen (id,familienaam,voornaam,geboortedatum,geslacht) VALUES 
 (1,'Peeters','Bram','1976-01-19','M'),
 (2,'Van Dessel','Rudy','1969-10-05','M'),
 (3,'Vereecken','Marie','1981-05-23','V'),
 (4,'Maes','Eveline','1983-08-16','V'),
 (5,'Vangeel','Joke','1976-05-22','V'),
 (6,'Van Heule','Pieter','1968-03-02','M'),
 (7,'Naessens','Katleen','1984-05-12','V'),
 (8,'Sleeuwaert','Koen','1957-02-25','M');


DROP TABLE IF EXISTS vieropeenrij_spelbord;
CREATE TABLE vieropeenrij_spelbord (
  rijnummer smallint(5) unsigned NOT NULL,
  kolomnummer smallint(5) unsigned NOT NULL,
  status smallint(5) unsigned NOT NULL,
  PRIMARY KEY (rijnummer,kolomnummer)
);


INSERT INTO vieropeenrij_spelbord (rijnummer,kolomnummer,status) VALUES 
 (1,1,0),
 (1,2,0),
 (1,3,0),
 (1,4,0),
 (1,5,0),
 (1,6,0),
 (1,7,0),
 (2,1,0),
 (2,2,0),
 (2,3,0),
 (2,4,0),
 (2,5,0),
 (2,6,0),
 (2,7,0),
 (3,1,0),
 (3,2,0),
 (3,3,0),
 (3,4,0),
 (3,5,0),
 (3,6,0),
 (3,7,0),
 (4,1,0),
 (4,2,0),
 (4,3,0),
 (4,4,0),
 (4,5,0),
 (4,6,0),
 (4,7,0),
 (5,1,0),
 (5,2,0),
 (5,3,0),
 (5,4,0),
 (5,5,0),
 (5,6,0),
 (5,7,0),
 (6,1,0),
 (6,2,0),
 (6,3,0),
 (6,4,0),
 (6,5,0),
 (6,6,0),
 (6,7,0);

 
CREATE USER 'cursusgebruiker'@'localhost' IDENTIFIED BY 'cursuspwd';
GRANT USAGE ON * . * TO 'cursusgebruiker'@'localhost' IDENTIFIED BY 'cursuspwd';
GRANT SELECT, INSERT, UPDATE, DELETE ON cursusphp.* TO 'cursusgebruiker'@'localhost';

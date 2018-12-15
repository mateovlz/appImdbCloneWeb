/*
SQLyog Community v12.2.5 (32 bit)
MySQL - 5.7.11 : Database - parapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`parapp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `parapp`;

/*Table structure for table `actores` */

DROP TABLE IF EXISTS `actores`;

CREATE TABLE `actores` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Fechanace` varchar(50) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  `VivoMuerto` varchar(50) DEFAULT NULL,
  `AnimalFav` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `actores` */

insert  into `actores`(`Id`,`Nombre`,`Apellidos`,`Fechanace`,`Pais`,`VivoMuerto`,`AnimalFav`) values 
(1,'Keir ','Gilchrist','1992-09-28','Estados Unidos','Vivo','Camaleon'),
(2,'Brigette','Lundy Paine','1994-09-10','Estados Unidos ','Vivo','Perro'),
(3,'Michael ','Rapaport','1970-04-20','Estados Unidos','Vivo','Camello'),
(4,'Nik','Dodani','1994-12-19','Estados Unidos','Vivo','Gato'),
(5,'Maria','Pedraza','1996-01-26','España','Vivo','Pajaro'),
(6,'Jaime','Lorente','1991-12-12','España','Vivo','Tiburon'),
(7,'Miguel ','Herran','1996-03-25','España','Vivo','Iguana'),
(8,'Camila','Sodi','1986-05-14','Mexico','Vivo','Peces'),
(9,'Juan','Raba','1977-01-14','Colombia','Vivo','Perro'),
(10,'Carolina ','Acevedo','1979-10-07','Colombia','Vivo','Gallina'),
(11,'Juan Fernando','Sanchez','1979-12-25','Colombia','Vivo','Gato'),
(12,'Emilia ','Clarke','1986-10-23','Reino Unido','Vivo','Oso'),
(13,'Sophie','Turner','1996-02-21','Reino Unido','Vivo','Jaguar'),
(14,'Peter','Dinklage','1969-06-11','Estados Unidos','Vivo','Tigre'),
(15,'Lena','Heady','1973-10-03','Bermudas','Vivo','Leon'),
(16,'Nikolaj ','Coster-Waldau','1970-07-27','Dinamarca','Vivo','Elefante'),
(17,'Eliza','Taylor','1989-10-24','Australia','Vivo','Canguro'),
(18,'Marie','Avgeropoulos','1986-06-17','Canada','Vivo','Pavo Real'),
(19,'Elizabeth','Olsen','1989-02-16','Estados Unidos','Vivo','Tortuga'),
(20,'Henry','Ian Cusick','1967-03-17','Peru','Vivo','Conejo'),
(21,'Bobby ','Morley','1984-12-20','Australia','Vivo','Perro'),
(22,'Christopher','Larkin','1987-10-02','Corea del Sur','Vivo','Mono'),
(23,'Richard ','Harmon','1991-09-18','Canada','Vivo','Peces'),
(25,'Sigifredo ','Velez ','1963-11-25','Colombia','Vivo','Perro'),
(26,'Andres','Leon','1997-10-10','Colombia ','Vivo','Tigre'),
(27,'Aldemar','Bernal','1999-12-09','Colombia','Vivo','Perro'),
(28,'Emmanuel','Alzate','2004-11-03','Peru','Ahi....','Cacatua'),
(31,'Alfredo','Bernal','2010-02-02','Rusia','Vivo','Tortuga');

/*Table structure for table `relacion` */

DROP TABLE IF EXISTS `relacion`;

CREATE TABLE `relacion` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `Actor` varchar(50) DEFAULT NULL,
  `Serie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `relacion` */

insert  into `relacion`(`Id`,`Actor`,`Serie`) values 
(14,'Keir','Life Unexpected'),
(15,'Keir','Falling Skies'),
(17,'Luisa','Under the Domo'),
(20,'Richard ','Arrow'),
(25,'Keir ','Stranger Things');

/*Table structure for table `serie` */

DROP TABLE IF EXISTS `serie`;

CREATE TABLE `serie` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Sinopsis` varchar(600) DEFAULT NULL,
  `Fechaini` varchar(50) DEFAULT NULL,
  `ActiCance` varchar(50) DEFAULT NULL,
  `Temporadas` varchar(50) DEFAULT NULL,
  `Capitulos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `serie` */

insert  into `serie`(`Id`,`Nombre`,`Sinopsis`,`Fechaini`,`ActiCance`,`Temporadas`,`Capitulos`) values 
(2,'Stranger Things','La historia arranca durante la década de los 80, en el ficticio pueblo de Hawkins, Indiana, cuando un niño llamado Will Byers desaparece, hecho que destapa los extraños sucesos que tienen lugar en la zona, producto de una serie de experimentos que realiza el gobierno en un laboratorio científico cercano.','2016-07-15','Activa','2','17'),
(3,'Arrow','Cuando Oliver Queen, un billonario mujeriego, que se presumía había fallecido, regresa a casa a la ciudad Starling, luego de cinco años de quedar atrapado en una isla remota en el Pacífico, él esconde los cambios creados por la experiencia en sí mismo, mientras busca la reconciliación con su ex Laurel; él secretamente lleva dos vidas paralelas. ','2012-10-10','Activa','7','140'),
(4,'Greys Anatomy','Merdith Grey pertenece a un grupo de doctores jóvenes que laboran en el Hospital de Seattle, quienes tratan de equilibrar la vida personal y el trabajo.','2005-04-27','Activa','15','317'),
(5,'The Flash','Nueve meses después de que el laboratorio S.T.A.R. explotara, Barry despierta del coma y descubre que tiene el poder de la súper velocidad. Con la ayuda de su nuevo equipo, Barry, denominado ahora `Flash\', luchará contra el crimen en Ciudad Central.','2014-10-07','Activa','5','95'),
(6,'Riverdale','La localidad de Riverdale aún no se ha recuperado del trágico asesinato del chico de oro de la escuela, Jason Blossom. Ante lo ocurrido, Archie Andrews se replantea su futuro: dedicarse a la música en lugar de trabajar en el negocio familiar.','2017-01-25','Activa','3','39'),
(7,'IZombie','Una zombi recién convertida acepta un trabajo en una oficina forense para obtener acceso a cerebros frescos.','2015-04-23','Activa','4','58'),
(8,'Under the Domo','Serie dramática de ciencia-ficción, adaptada de la novela de Stephen King, acerca de una pequeña ciudad que repentinamente es sellada del resto del mundo por un enorme domo transparente.','2013-06-24','Cancelada','3','39'),
(9,'Falling Skies','Grupo de sobrevivientes forma un movimiento de resistencia después de una invasión extraterrestre.','2011-06-19','Cancelada','5','52'),
(10,'The Vampire Diaries','Elena, una estudiante de secundaria, se encuentra extasiada con un nuevo estudiante apuesto y misterioso, Stefan, desconociendo que él es un vampiro de varios siglos de edad que está tratando de hacer lo mejor para vivir en paz junto a los humanos.','2009-09-10','Cancelada','8','171'),
(11,'Teen Wolf','Joven lucha por entender quien es el y en lo que se ha convertido luego de ser mordido por un lobo.','2011-06-05','Cancelada','6','100'),
(12,'The Tomorrow People','Stephen Jameson escucha voces y se teletransporta en sus sueños, él cree estar enloqueciendo y en su desesperación sigue a una de las voces que lo lleva a unos jóvenes genéticamente avanzados, que están siendo perseguidos por un grupo paramilitar.','2013-10-09','Cancelada','1','22'),
(13,'Life Unexpected','Un adolescente criado en el sistema adoptivo temporal, busca, encuentra y conoce a sus padres.','2010-01-18','Cancelada','2','26'),
(14,'The Originals','Klaus, un híbrido de vampiro y hombre lobo, regresa a Nueva Orleans para investigar los rumores de un complot en su contra y lucha por recuperar la ciudad.','2013-10-03','Cancelada','5','92'),
(15,'Supergirl','Con tan sólo 13 años de edad, Kara Zor-El es enviada a la Tierra para cuidar de su primo, Superman. Y a los 24 años, Kara revela al mundo sus poderes y empieza a trabajar para una agencia paraestatal con vida extraterrestre en la Tierra.','2015-10-26','Activa','4','67'),
(16,'Legends of Tomorrow','El viajero del tiempo Rip Hunter regresa al presente y forma una insólita coalición de superhéroes y villanos para salvar el mundo de un peligro terrible que amenaza con destruir no sólo el planeta, sino incluso el propio tiempo.','2016-01-21','Activa','3','51'),
(17,'Black Lighting','El vigilante retirado Jefferson Pierce vuelve a la lucha como su alter ego.','2018-01-16','Activa','2','15'),
(18,'Lucifer','Harto del infierno, Lucifer abandona su trono en el averno y se marcha a Los Ángeles, donde empieza a trabajar como detective de homicidios.','2016-01-25','Activa','3','57'),
(19,'La Casa de Papel','Una banda organizada de ladrones se propone cometer el atraco del siglo en la Fábrica Nacional de Moneda y Timbre. Cinco meses de preparación quedarán reducidos a once días para poder llevar a cabo con éxito el gran golpe.','2017-04-02','Activa','2','15'),
(20,'Elite','Las Encinas es el colegio más exclusivo de España, el lugar donde estudian los hijos de la élite y donde acaban de ser admitidos tres jóvenes de clase baja, procedentes de un colegio público en ruinas.','2018-10-05','Activa','1','8'),
(21,'Love','El dulce Gus y la rebelde Mickey navegan por las aguas turbulentas de las relaciones modernas.','2016-02-09','Activa','3','34'),
(22,'Avengers','El dios asgardiano exiliado Loki se encuentra con El Otro,2​ un líder de una raza extraterrestre conocida como los Chitauri. Con quienes llegan a un trato, a cambio de recuperar el Teseracto, una fuente de poderosa energía de potencial desconocido, el Otro promete ofrecerle a Loki un ejército con el que puede subyugar a la tierra. ','2012-03-02','Activa','2','20'),
(32,'The 100','epawis','2014-11-28','Activa','5','120');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

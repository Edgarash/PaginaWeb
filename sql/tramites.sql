# Host: Servidor  (Version 5.7.21-log)
# Date: 2018-06-02 18:06:23
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "departamentos"
#

CREATE TABLE `departamentos` (
  `Num_Depto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL DEFAULT '',
  `Jefe_Depto` int(11) DEFAULT NULL,
  PRIMARY KEY (`Num_Depto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "departamentos"
#

INSERT INTO `departamentos` VALUES (1,'INFORMATICA',1),(2,'RECURSOS',NULL),(3,'PUBLICIDAD Y MERCADOTECNIA',NULL),(4,'FINANZAS Y CONTABILIDAD',NULL),(5,'ADMINISTRACIÓN',1),(6,'MANTENIMIENTO',NULL);

#
# Structure for table "folios"
#

CREATE TABLE `folios` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Tramite` int(11) NOT NULL DEFAULT '0',
  `Trabajador` int(11) NOT NULL DEFAULT '0',
  `Estatus` varchar(50) NOT NULL DEFAULT '',
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  PRIMARY KEY (`Folio`,`Tipo_Tramite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "folios"
#


#
# Structure for table "notasbuenas"
#

CREATE TABLE `notasbuenas` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Genera` date DEFAULT NULL,
  `Trabajador` int(11) NOT NULL DEFAULT '0',
  `Generada` int(11) NOT NULL DEFAULT '0',
  `No_Oficio` int(11) DEFAULT NULL,
  `Fecha_Uso` date DEFAULT NULL,
  `usada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Folio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "notasbuenas"
#

INSERT INTO `notasbuenas` VALUES (2,'2018-05-30',2,1,1002,NULL,0),(3,'2018-05-30',2,1,1003,NULL,0),(4,'2018-05-30',3,1,1004,NULL,0),(5,'2018-05-30',4,1,1005,NULL,0),(6,'2018-05-30',1,1,1006,NULL,0),(7,'2018-06-02',0,0,0,NULL,0);

#
# Structure for table "notasmalas"
#

CREATE TABLE `notasmalas` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Genera` date DEFAULT NULL,
  `Trabajador` int(11) NOT NULL DEFAULT '0',
  `Generada` int(11) NOT NULL DEFAULT '0',
  `No_Oficio` int(11) DEFAULT NULL,
  PRIMARY KEY (`Folio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "notasmalas"
#

INSERT INTO `notasmalas` VALUES (1,'2018-05-30',2,1,NULL);

#
# Structure for table "personal"
#

CREATE TABLE `personal` (
  `Num_emp` int(11) NOT NULL AUTO_INCREMENT,
  `RFC` varchar(13) NOT NULL DEFAULT '',
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Ap_Paterno` varchar(35) NOT NULL DEFAULT '',
  `Ap_Materno` varchar(35) DEFAULT NULL,
  `Departamento` int(11) NOT NULL DEFAULT '0',
  `Puesto` varchar(50) NOT NULL DEFAULT '',
  `Fecha_Ingreso` date DEFAULT '0000-00-00',
  PRIMARY KEY (`Num_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "personal"
#

INSERT INTO `personal` VALUES (1,'CIGE960822D88','EDGAR MICHEL','CISNEROS','GARCIA',6,'JEFE','2018-05-30'),(2,'MOM960830S003','MAARIBEL','MONTES','RODRÍGUEZ',6,'Auxiliar','2018-05-30'),(3,'AVECBDH123233','EDUARDO','RENTERIA','RODRIGUEZ',3,'Empleado','2018-05-30'),(4,'ERBSH33292928','EBER','RETA','BAEZA',2,'Contador','2018-05-30');

#
# Structure for table "tramites"
#

CREATE TABLE `tramites` (
  `No_Tramite` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL DEFAULT '',
  `Tramite_Local` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`No_Tramite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tramites"
#


#
# Structure for table "usuarios"
#

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL DEFAULT '',
  `Contraseña` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Informatica','123'),(2,'RecursosHumanos','123'),(3,'Publicidad','123'),(4,'Finanzas','123'),(5,'Administración','123');

#
# Procedure "ActualizarDepartamento"
#

CREATE PROCEDURE `ActualizarDepartamento`(IN IDepto int, IN Nombre varchar(100), IN Jefe int)
BEGIN
  UPDATE `Departamentos` SET `Nombre` = Nombre, `Jefe_Depto` = Jefe WHERE `Num_Depto` = IDepto;
END;

#
# Procedure "ActualizarPersonal"
#

CREATE PROCEDURE `ActualizarPersonal`(
  IN NumEmp int,
  RFC varchar(13),
  Nombre varchar(50),
  APaterno varchar(35),
  AMaterno varchar(35),
  Departamento int,
  Puesto varchar(50),
  FechaIngreso date
)
BEGIN
  UPDATE
    `Personal`
  SET
    `Num_emp` = NumEmp,
    `RFC` = RFC,
    `Nombre` = Nombre,
    `Ap_Paterno` = APaterno,
    `Ap_Materno` = AMaterno,
    `Departamento` = Departamento,
    `Puesto` = Puesto,
    `Fecha_Ingreso` = FechaIngreso
  WHERE
    `Num_emp` = NumEmp;
END;

#
# Procedure "AgregarDepartamento"
#

CREATE PROCEDURE `AgregarDepartamento`(IN Nombre varchar(100), Jefe int)
BEGIN
  INSERT
    INTO `Departamentos`
    (`Nombre`, `Jefe_Depto`)
  VALUES
    (Nombre, Jefe);
END;

#
# Procedure "AgregarPersonal"
#

CREATE PROCEDURE `AgregarPersonal`(
  RFC varchar(13),
  Nombre varchar(50),
  APaterno varchar(35),
  AMaterno varchar(35),
  Departamento int,
  Puesto varchar(50),
  FechaIngreso date
)
BEGIN
  INSERT
    INTO `PERSONAL`
    (`RFC`, `Nombre`, `Ap_Paterno`, `Ap_Materno`, `Departamento`, `Puesto`, `Fecha_Ingreso`)
  VALUES
    (RFC, Nombre, APaterno, AMaterno, Departamento, Puesto, FechaIngreso);
END;

#
# Procedure "Departamentos"
#

CREATE PROCEDURE `Departamentos`()
BEGIN
  SELECT
    `Departamentos`.`Num_Depto` AS 'ID', `Departamentos`.`Nombre` AS 'Departamento', `Personal`.`Nombre` AS 'Jefe de Departamento'
  FROM
    `Departamentos`,
    `Personal`
  WHERE
    `Jefe_Depto` = `Num_Emp`
  UNION ALL
  SELECT
    `Num_Depto`, `Nombre`, ''
  FROM
    `Departamentos`
  WHERE
    ISNULL(`Jefe_Depto`)
  ORDER BY `ID`;
END;

#
# Procedure "EliminarDepartamento"
#

CREATE PROCEDURE `EliminarDepartamento`(IN NumDepto int)
BEGIN
  DELETE FROM `Departamentos` WHERE `Num_Depto` = NumDepto;
END;

#
# Procedure "EliminarPersonal"
#

CREATE PROCEDURE `EliminarPersonal`(IN NumEmp int)
BEGIN
  DELETE FROM `Personal` WHERE `Num_Emp` = NumEmp;
END;

#
# Procedure "HacerLogin"
#

CREATE PROCEDURE `HacerLogin`(Usuario varchar(50))
BEGIN
  SELECT `Contraseña` FROM `Usuarios` WHERE `Usuarios`.`Usuario` = Usuario;
END;

#
# Procedure "MostrarDepartamento"
#

CREATE PROCEDURE `MostrarDepartamento`(IN IDepto int)
BEGIN
  SELECT
    `Num_Depto`, `Nombre`, `Jefe_Depto`
  FROM
    `Departamentos`
  WHERE
    `Num_Depto` = IDepto;
END;

#
# Procedure "MostrarPersonal"
#

CREATE PROCEDURE `MostrarPersonal`(IN NumEmp int)
BEGIN
  SELECT
    `Num_emp`,
    `RFC`,
    `Nombre`,
    `Ap_Paterno`,
    `Ap_Materno`,
    `Departamento`,
    `Puesto`,
    `Fecha_Ingreso`
  FROM
    `Personal`
  WHERE
    `Num_emp` = NumEmp;
END;

#
# Procedure "NotasBuenas"
#

CREATE PROCEDURE `NotasBuenas`(Expide int, Trabajador int, NoOficio int)
BEGIN
  INSERT
    INTO `NotasBuenas`
    (`Fecha_Genera`, `Trabajador`, `Generada`, `No_Oficio`)
  VALUES
    (DATE(NOW()), Trabajador, Expide, NoOficio);
END;

#
# Procedure "NotasMalas"
#

CREATE PROCEDURE `NotasMalas`(Expide int, Trabajador int, NoOficio int)
BEGIN
  INSERT
    INTO `NotasMalas`
    (`Fecha_Genera`, `Trabajador`, `Generada`, `No_Oficio`)
  VALUES
    (DATE(NOW()), Trabajador, Expide, NoOficio);
END;

#
# Procedure "Personal"
#

CREATE PROCEDURE `Personal`()
BEGIN
  SELECT
    `Num_emp` AS 'ID',
    `RFC`,
    `Personal`.`Nombre`,
    `Ap_Paterno` AS 'Apellido Paterno',
    `Ap_Materno` AS 'Apellido Materno',
    `Departamentos`.`Nombre` AS 'Depto.',
    `Puesto`,
    `Fecha_Ingreso` AS 'Alta'
  FROM
    `Personal`,
    `Departamentos`
  WHERE
    `Personal`.`Departamento` = `Departamentos`.`Num_Depto`
  UNION ALL
  SELECT
    `Num_emp` AS 'ID',
    `RFC`,
    `Personal`.`Nombre`,
    `Ap_Paterno` AS 'Apellido Paterno',
    `Ap_Materno` AS 'Apellido Materno',
    '' AS 'Depto.',
    `Puesto`,
    `Fecha_Ingreso` AS 'Alta'
  FROM
    `Personal`
  WHERE
    `Departamento` NOT IN (SELECT `Num_Depto` FROM `Departamentos`)
  ORDER BY `ID`;
END;

#
# Procedure "TodasNotasBuenas"
#

CREATE PROCEDURE `TodasNotasBuenas`()
BEGIN
  SELECT
    `Folio` AS 'FOLIO',
    `Fecha_Genera` AS 'FECHA GENERADA',
    `Trabajador`,
    CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'EXPIDE',
    `No_Oficio` AS 'NO. OFICIO'
  FROM
    `Personal`,
    (SELECT
      `Folio`,
      `Fecha_Genera`,
      CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'TRABAJADOR',
      `Generada`,
      `No_Oficio`
    FROM
      `Personal`,
      `NotasBuenas`
    WHERE
      `Num_emp` = `Trabajador`) P
  WHERE
    `Generada` = `Num_Emp`;
END;

#
# Procedure "TodasNotasMalas"
#

CREATE PROCEDURE `TodasNotasMalas`()
BEGIN
  SELECT
    `Folio` AS 'FOLIO',
    `Fecha_Genera` AS 'FECHA GENERADA',
    `Trabajador`,
    CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'EXPIDE',
    `No_Oficio` AS 'NO.OFICIO'
  FROM
    `Personal`,
    (SELECT
      `Folio`,
      `Fecha_Genera`,
      CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'TRABAJADOR',
      `Generada`,
      `No_Oficio`
    FROM
      `Personal`,
      `NotasMalas`
    WHERE
      `Num_emp` = `Trabajador`) P
  WHERE
    `Generada` = `Num_Emp`;
END;

#
# Procedure "Tramites"
#

CREATE PROCEDURE `Tramites`()
BEGIN
  SELECT
    `No_Tramite` AS '# Tramite', `Nombre`, IF(`Tramite_Local`, 'SI', 'NO') AS 'Tramite Local'
  FROM
    `Tramites`;
END;

#
# Procedure "VerNotaBuena"
#

CREATE PROCEDURE `VerNotaBuena`(Foli int)
BEGIN
  SELECT
    `Folio`,
    `Fecha_Genera`,
    `Trabajador`,
    CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'Generada',
    `No_Oficio`
  FROM
    `Personal`,
    (SELECT
      `Folio`,
      `Fecha_Genera`,
      CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'Trabajador',
      `Generada`,
      `No_Oficio`
    FROM
      `Personal`,
      `NotasBuenas`
    WHERE
      `Folio` = Foli AND `Num_emp` = `Trabajador`) P
  WHERE
    `Generada` = `Num_Emp`;
END;

#
# Procedure "VerNotaMala"
#

CREATE PROCEDURE `VerNotaMala`(Foli int)
BEGIN
  SELECT
    `Folio`,
    `Fecha_Genera`,
    `Trabajador`,
    CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'Generada',
    `No_Oficio`
  FROM
    `Personal`,
    (SELECT
      `Folio`,
      `Fecha_Genera`,
      CONCAT(`personal`.`Nombre`, ' ', `personal`.`Ap_Paterno`, ' ', `personal`.`Ap_Materno`) AS 'Trabajador',
      `Generada`,
      `No_Oficio`
    FROM
      `Personal`,
      `NotasMalas`
    WHERE
      `Folio` = Foli AND `Num_emp` = `Trabajador`) P
  WHERE
    `Generada` = `Num_Emp`;
END;

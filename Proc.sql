CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarSubCategoria`(nombre varchar(100), idcat int, idempmod int)
BEGIN
  INSERT
    INTO `subcategoria`
    (`nombre`, `idcat`, `idempmod`)
  VALUES
    (nombre, idcat, idempmod);
END;

CREATE TRIGGER `AgregarSubCategoria`
  AFTER INSERT ON `SubCategoria`
  FOR EACH ROW
INSERT
  INTO `modificacionsubcategoria`
  (`ID`, `Nombre`, `IDCat`, `Activo`, `FechaMod`, `IDEmpMod`, `Tipo`, `Comentario`)
VALUES
  (NEW.`ID`, NEW.`Nombre`, NEW.`IdCat`, NEW.`Activo`, NOW(), NEW.`IDEmpMod`, 'A', 'Alta de SubCategoria');

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCatalogo`(
_nombre varchar(100),
_IdEmpAlta int
)
Begin
Insert Into Categoria (nombre,IdEmpAlta) values (_nombre,_IdEmpAlta);
end;

CREATE TRIGGER `AgregarCategoria`
            AFTER INSERT ON `Categoria`
            FOR EACH ROW
          INSERT
            INTO `modificacioncategoria`
            (`ID`, `Nombre`, `Activo`, `FechaMod`, `IDEmpMod`, `Tipo`, `Comentario`)
          VALUES
            (NEW.`ID`, NEW.`Nombre`, NEW.`Activo`, NOW(), NEW.`IDEmpAlta`, 'A', 'Alta de Categoria');

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarCliente2`(
  email varchar(100),
  contrasena varchar(100),
  Nombre varchar(100),
  Apellidos varchar(100),
  Telefono varchar(10),
  NumExterior varchar(10),
  NumInterior varchar(10),
  Calle varchar(80),
  EntreCalle varchar(100),
  Referencia varchar(100),
  CP varchar(5),
  Colonia varchar(100),
  Municipio varchar(100),
  Estado varchar(100),
  FechaAlta varchar(100)
)
BEGIN
  INSERT
    INTO `cliente`
    (`email`, `contrasena`, `Nombre`, `Apellidos`, `Telefono`, `NumExterior`, `NumInterior`, `Calle`, `EntreCalles`, `Referencia`, `CP`, `Colonia`, `Municipio`, `Estado`,FechaAlta)
  VALUES
    (email, contrasena, Nombre, Apellidos, Telefono, NumExterior, NumInterior, Calle, EntreCalle, Referencia, CP, Colonia, Municipio, Estado,FechaAlta);
END;
--Parte nueva 
CREATE FUNCTION Id_cliente() RETURNS integer
  DETERMINISTIC
  NO SQL
RETURN @prmin_cliente;

CREATE
  VIEW `MostrarCarrito`
  AS
SELECT
  `articulo`.`ID` AS 'IDArt', `articulo`.`nombre` AS 'Nombre', `articulo`.`precio` AS 'Precio', `carrito`.`cantidad` AS 'Cantidad'
FROM
  `articulo`,
  `cliente`,
  `carrito`
WHERE
  `cliente`.`ID` = `carrito`.`ID` AND `articulo`.`ID` = `carrito`.`IDArt` AND `carrito`.`ID` = Id_cliente();
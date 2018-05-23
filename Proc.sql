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


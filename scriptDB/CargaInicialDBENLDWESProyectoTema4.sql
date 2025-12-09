/**
 * Author:  Enrique Nieto Lorenzo
 * Created: 03 nov. 2025
 */

USE DBENLDWESProyectoTema4;

INSERT INTO T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) VALUES
        ('INF','Departamento de Informática.',now(),1245.5,null),
        ('AUT','Departamento de Automoción.',now(),8735.7,null),
        ('ELE','Departamento de Electricidad.',now(),4375.2,null),
        ('MAT','Departamento de Matemáticas.',now(),345.2,null),
        ('ING','Departamento de Inglés.',now(),289.6,now()
);


/**
 * Author:  Enrique Nieto Lorenzo
 * Created: 30 oct. 2025
 */

CREATE DATABASE IF NOT EXISTS DBENLDWESProyectoTema4;

USE DBENLDWESProyectoTema4;

CREATE TABLE IF NOT EXISTS T02_Departamento(
T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
T02_DescDepartamento VARCHAR(255),
T02_FechaCreacionDepartamento DATETIME,
T02_VolumenNegocio FLOAT,
T02_FechaBajaDepartamento DATETIME
);

CREATE USER IF NOT EXISTS "userENLDWESProyectoTema4"@"%" IDENTIFIED BY "paso";
GRANT ALL PRIVILEGES ON *.* TO "userENLDWESProyectoTema4"@"%" WITH GRANT OPTION;

FLUSH PRIVILEGES;
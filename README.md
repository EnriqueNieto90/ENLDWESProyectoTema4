# ENLDWESProyectoTema4

## Descripción del Proyecto

Proyecto educativo de Desarrollo Web en Entorno Servidor centrado en técnicas de acceso a datos con PHP y MySQL. Este repositorio contiene ejercicios progresivos que implementan operaciones CRUD, consultas preparadas, transacciones, y manipulación de datos mediante PDO (PHP Data Objects).

El proyecto abarca desde la conexión básica a bases de datos hasta operaciones avanzadas como importación/exportación de datos en formatos XML, gestión de transacciones y consultas preparadas conBindParam. Se trabaja sobre una base de datos de departamentos con operaciones completas de mantenimiento.

**Tecnologías principales:** PHP 8.3, MySQL/MariaDB, PDO, Apache, XML

## Requisitos Técnicos

- **Servidor Web:** Apache 2.4+
- **PHP:** 8.3 o superior
- **Base de Datos:** MySQL 8.0+ / MariaDB 10.5+
- **Motor de BD:** InnoDB
- **Entorno:** LAMP (Linux, Apache, MySQL, PHP)
- **Extensiones PHP requeridas:**
  - PDO
  - pdo_mysql
  - SimpleXML
  - DateTime

## Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/EnriqueNieto90/ENLDWESProyectoTema4.git
```

### 2. Configurar en servidor local
Copiar el proyecto al directorio de publicación de Apache:
```bash
cp -r ENLDWESProyectoTema4 /var/www/html/httpdocs/
```

### 3. Configurar la base de datos
Ejecutar los scripts SQL en el siguiente orden:

**a) Crear base de datos y usuario:**
```bash
mysql -u adminsql -p < scriptDB/CreaDBENLDWESProyectoTema4.sql
```

**b) Carga inicial de datos:**
```bash
mysql -u UserENLDWESProyectoTema4 -p DBENLDWESProyectoTema4 < scriptDB/CargaInicialDBENLDWESProyectoTema4.sql
```

### 4. Configurar credenciales
Editar el archivo de configuración de base de datos:
```php
// config/confDB.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'DBENLDWESProyectoTema4');
define('DB_USER', 'userENLDWESProyectoTema4');
define('DB_PASS', 'paso');
```

### 5. Configurar permisos
```bash
chmod -R 755 /var/www/html/httpdocs/ENLDWESProyectoTema4
chmod -R 777 /var/www/html/httpdocs/ENLDWESProyectoTema4/tmp
```

### 6. Acceder a la aplicación
Abrir navegador web y acceder a:
```
http://localhost/httpdocs/ENLDWESProyectoTema4/indexProyectoTema4.php
```

## Estructura del Proyecto
```
ENLDWESProyectoTema4/
├── indexProyectoTema4.php      # Punto de entrada principal
├── .htaccess                   # Configuración Apache
├── /codigoPHP/                 # Ejercicios PHP (01-08)
│   ├── ejercicio01.php         # Conexión PDO y manejo de errores
│   ├── ejercicio02.php         # Mostrar contenido tabla Departamento
│   ├── ejercicio03.php         # Formulario alta departamento
│   ├── ejercicio04.php         # Búsqueda departamentos
│   ├── ejercicio05.php         # Transacciones con múltiples inserts
│   ├── ejercicio06.php         # Consultas preparadas con array
│   ├── ejercicio07.php         # Importación desde XML
│   └── ejercicio08.php         # Exportación a XML
├── /mostrarcodigo/             # Visualización de código fuente
│   ├── muestraEjercicio01.php
│   └── ...
├── /config/                    # Configuración de la aplicación
│   └── confDB.php              # Credenciales base de datos
├── /core/                      # Librerías y clases PHP
├── /doc/                       # Documentación técnica
├── /error/                     # Páginas de error personalizadas
├── /webroot/                   # Recursos estáticos
│   └── /css/                   # Hojas de estilo
├── /scriptDB/                  # Scripts SQL
│   ├── CreaDBENLDWESProyectoTema4.sql
│   ├── CargaInicialDBENLDWESProyectoTema4.sql
│   └── BorraDBENLDWESProyectoTema4.sql
└── /tmp/                       # Archivos temporales (XML import/export)
```

## Modelo de Datos

### Tabla: T02_Departamento

| Campo | Tipo | Descripción |
|-------|------|-------------|
| **T02_CodDepartamento** (PK) | CHAR(3) | Código departamento (3 letras mayúsculas) |
| T02_DescDepartamento | VARCHAR(255) | Descripción del departamento |
| T02_FechaCreacionDepartamento | DATETIME | Fecha creación (automática) |
| T02_VolumenDeNegocio | FLOAT | Volumen de negocio en euros |
| T02_FechaBajaDepartamento | DATETIME | Fecha baja lógica (nullable) |

### Credenciales de Base de Datos

- **Base de datos:** DBENLDWESProyectoTema4
- **Usuario aplicación:** UserENLDWESProyectoTema4
- **Contraseña:** paso
- **Usuario administrador:** adminsql / paso

## Ejercicios Implementados

### Ejercicio 01 - Conexión PDO
- Establecimiento de conexión con PDO
- Configuración de modo de errores con excepciones
- Manejo robusto de errores de conexión
- Configuración UTF-8

### Ejercicio 02 - Consulta SELECT
- Mostrar todos los departamentos de la tabla
- Conteo de registros
- Presentación tabular de resultados
- Formato de datos (fechas, números decimales)

### Ejercicio 03 - Formulario de Alta
- Formulario de inserción de departamentos
- Validación de campos obligatorios
- Validación de formato (código 3 letras mayúsculas)
- Control de duplicados (PK)
- Mensajes de confirmación y error

### Ejercicio 04 - Búsqueda por Descripción
- Formulario de búsqueda
- Consulta con LIKE para búsqueda parcial
- Mostrar todos los departamentos si campo vacío
- Presentación de resultados

### Ejercicio 05 - Transacciones
- Inserción de múltiples registros (3) en una transacción
- Commit si todo es correcto
- Rollback automático en caso de error
- Garantía de integridad de datos

### Ejercicio 06 - Consultas Preparadas
- Carga masiva desde array PHP
- Uso de prepared statements con bindParam
- Paso de parámetros mediante array en execute
- Protección contra SQL Injection

### Ejercicio 07 - Importación XML
- Lectura de archivo XML desde directorio /tmp/
- Parseo con SimpleXML
- Inserción de departamentos en base de datos
- Validación de datos importados
- Log de registros importados

### Ejercicio 08 - Exportación XML
- Extracción de departamentos desde base de datos
- Generación de archivo XML estructurado
- Guardado en directorio /tmp/
- Copia de seguridad de datos

## URLs de Acceso

### Página Principal
```
https://enriquenielor.ieslossauces.es/ENLDWESProyectoTema4/indexProyectoTema4.php
```

### Ejercicios Individuales
```
https://enriquenielor.ieslossauces.es/ENLDWESProyectoTema4/codigoPHP/ejercicio01.php
https://enriquenielor.ieslossauces.es/ENLDWESProyectoTema4/codigoPHP/ejercicio02.php
https://enriquenielor.ieslossauces.es/ENLDWESProyectoTema4/codigoPHP/ejercicio03.php
```

### Visualización de Código
```
https://enriquenielor.ieslossauces.es/ENLDWESProyectoTema4/mostrarcodigo/muestraEjercicio01.php
```

## Características Destacadas

- **PDO exclusivamente:** Uso de PHP Data Objects para máxima portabilidad
- **Prepared Statements:** Todas las consultas parametrizadas usan prepared statements
- **Manejo de excepciones:** Configuración PDO::ERRMODE_EXCEPTION en todas las conexiones
- **Transacciones:** Implementación de transacciones para operaciones múltiples
- **Importación/Exportación:** Sistema completo de backup y restauración XML
- **Validación robusta:** Validación de datos tanto en cliente como en servidor
- **Seguridad SQL Injection:** Protección total mediante consultas preparadas
- **Documentación PHPDoc:** Código documentado siguiendo estándares profesionales

## Gestión de Base de Datos

### Crear la base de datos
```bash
mysql -u adminsql -p < scriptDB/CreaDBENLDWESProyectoTema4.sql
```

### Cargar datos iniciales
```bash
mysql -u UserENLDWESProyectoTema4 -p DBENLDWESProyectoTema4 < scriptDB/CargaInicialDBENLDWESProyectoTema4.sql
```

### Eliminar base de datos
```bash
mysql -u adminsql -p < scriptDB/BorraDBENLDWESProyectoTema4.sql
```

## Tecnologías Utilizadas

- **Backend:** PHP 8.3 con PDO
- **Base de Datos:** MySQL 8.0 / MariaDB (Motor InnoDB)
- **Frontend:** HTML5, CSS3
- **Servidor:** Apache 2.4
- **Formato de datos:** XML para import/export
- **Control de versiones:** Git/GitHub

## Autor

**Enrique Nieto Lorenzo**

Estudiante de DAW2 (Desarrollo de Aplicaciones Web)  
IES Los Sauces - Curso 2025/2026  
Módulo: DWES (Desarrollo Web en Entorno Servidor)

GitHub: EnriqueNieto90  
Repositorio: ENLDWESProyectoTema4
```

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 | Enrique Nieto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../webroot/css/all.min.css">
    
    <link rel="stylesheet" href="webroot/css/estilos.css"> 
    <link rel="stylesheet" href="webroot/css/estilosTabla.css"> 
</head>
<body>

    <header class="cabecera-principal">
        <div class="contenedor contenido-cabecera">
            <div class="identidad">
                <a href="../index.html" style="text-decoration:none;">
                    <div class="logo-iniciales">EN</div>
                </a>
                <h1>Enrique Nieto Lorenzo</h1>
            </div>
            <div class="curso-badge" style="background-color: #777BB4; color: white;">
                Tema 4
            </div>
        </div>
    </header>

    <main class="contenedor-principal">
        
        <h2 class="titulo-pagina">Técnicas de Acceso a Datos en PHP</h2>
        
        <h3 class="subtitulo-tabla">Scripts de Configuración</h3>
        <div class="contenedor-tabla">
            <table class="tabla-ejercicios">
                <thead>
                    <tr>
                        <th>Descripción del Script</th>
                        <th class="col-centro">Ver Código</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Script creación de base de datos y usuario</td>
                        <td>
                            <a href="mostrarcodigo/muestrascript1.php" class="btn-accion btn-code" title="Ver Código">
                                <i class="fa-solid fa-file-code"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Script carga inicial de base de datos</td>
                        <td>
                            <a href="mostrarcodigo/muestrascript2.php" class="btn-accion btn-code" title="Ver Código">
                                <i class="fa-solid fa-file-code"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Script borrado de base de datos y usuario</td>
                        <td>
                            <a href="mostrarcodigo/muestrascript3.php" class="btn-accion btn-code" title="Ver Código">
                                <i class="fa-solid fa-file-code"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br><br>

        <h3 class="subtitulo-tabla">Ejercicios con PDO</h3>
        <div class="contenedor-tabla">
            <table class="tabla-ejercicios">
                <thead>
                    <tr>
                        <th class="col-centro">Nº</th>
                        <th>Descripción</th>
                        <th class="col-centro">Ejecutar PDO</th>
                        <th class="col-centro">Código PDO</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td class="col-num">1</td>
                        <td>Conexión a la base de datos.</td>
                        <td><a href="codigoPHP/ejercicio01pdo.php" class="btn-accion btn-play"><i class="fa-solid fa-play"></i></a></td>
                        <td><a href="mostrarcodigo/muestraejercicio01pdo.php" class="btn-accion btn-code"><i class="fa-solid fa-code"></i></a></td>
                    </tr>

                    <tr>
                        <td class="col-num">2</td>
                        <td>Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td><a href="codigoPHP/ejercicio02pdo.php" class="btn-accion btn-play"><i class="fa-solid fa-play"></i></a></td>
                        <td><a href="mostrarcodigo/muestraejercicio02pdo.php" class="btn-accion btn-code"><i class="fa-solid fa-code"></i></a></td>
                    </tr>

                    <tr>
                        <td class="col-num">3</td>
                        <td>Formulario para añadir un departamento a la tabla Departamento.</td>
                        <td><a href="codigoPHP/ejercicio03pdo.php" class="btn-accion btn-play"><i class="fa-solid fa-play"></i></a></td>
                        <td><a href="mostrarcodigo/muestraejercicio03pdo.php" class="btn-accion btn-code"><i class="fa-solid fa-code"></i></a></td>
                    </tr>

                    <tr>
                        <td class="col-num">4</td>
                        <td>Formulario de búsqueda de departamentos por descripción.</td>
                        <td><a href="codigoPHP/ejercicio04pdo.php" class="btn-accion btn-play"><i class="fa-solid fa-play"></i></a></td>
                        <td><a href="mostrarcodigo/muestraejercicio04pdo.php" class="btn-accion btn-code"><i class="fa-solid fa-code"></i></a></td>
                    </tr>

                    <tr>
                        <td class="col-num">5</td>
                        <td>Pagina web que añade tres registros a nuestra tabla Departamento.</td>
                        <td><a href="codigoPHP/ejercicio05pdo.php" class="btn-accion btn-play"><i class="fa-solid fa-play"></i></a></td>
                        <td><a href="mostrarcodigo/muestraejercicio05pdo.php" class="btn-accion btn-code"><i class="fa-solid fa-code"></i></a></td>
                    </tr>

                    <tr>
                        <td class="col-num">6</td>
                        <td>Pagina web que cargue registros en la tabla Departamento.</td>
                        <td></td> <td></td> </tr>

                    <tr>
                        <td class="col-num">7</td>
                        <td>Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla.</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="col-num">8</td>
                        <td>Página web que toma datos (código y descripción) de la tabla Departamento.</td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </main>

    <footer class="pie-pagina">
        <div class="contenedor contenido-footer">
            <div class="texto-legal">
                <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                <p class="autor">Enrique Nieto Lorenzo. Fecha de Actualización: 07-01-2026</p>
            </div>
            <div class="iconos-footer">
                <a href="https://github.com/EnriqueNieto90/ENLDWESProyectoTema4" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                <a href="../index.html" title="Inicio"><i class="fa-solid fa-house"></i></a> 
                <a href="../ENLDWESProyectoDWES/indexProyectoDWES.php" title="Volver a DWES"><i class="fa-solid fa-arrow-turn-up"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
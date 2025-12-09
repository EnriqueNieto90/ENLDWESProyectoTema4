<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TEMA 4 - TÉCNICAS DE ACCESO A DATOS EN PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: green;
            color: white;
            padding: 15px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #ecf0f1;
            margin: 10px 0;
            padding: 15px;
            border-left: 5px solid green;
            border-right: 5px solid green;
            transition: 0.3s;
	    border-radius:8px;
        }
        li:hover {
            background: #d6eaf8;
            border-left: 5px solid purple;
            border-right: 5px solid purple;
        }
        img {
            height: 25px;
        }

        footer{
            margin: auto;
            background-color: green;
            text-align: center;
            height: 150px;
	    color: white;
        }
	

    </style>
</head>
<body>
    <header>
        <h1><b>TEMA 4 - TÉCNICAS DE ACCESO A DATOS EN PHP</b></h1>
    </header>
    <main>
        <h2><b>ÍNDICE EJERCICIOS TEMA 4</b></h2>
        
        
        <table border solid black 2px>
            <thead>
            <th></th>
            <th>ED</th>
            <th colspan="2">EE</th>
            </thead>
            <tr>
                <td>Script creación de base de datos y usuario</td>
                <td><a href="mostrarcodigo/muestrascript1.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href=""></td>
                <td><a href=""></td>
            </tr>
            <tr>
                <td>Script carga inicial de base de datos</td>
                <td><a href="mostrarcodigo/muestrascript2.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href=""></td>
                <td></td>
            </tr>
            <tr>
                <td>Script borrado de base de datos y usuario</td>
                <td><a href="mostrarcodigo/muestrascript3.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href=""></td>
                <td></td>
            </tr>
        </table>
        <table border solid black 2px>
            <thead>
            <th>Num</th>
            <th>Descripción</th>
            <th colspan="2">PDO</th>
            <th colspan="2">MySQLi</th>
            </thead>
            <tr>
                <td>1</td>
                <td>Conexión a la base de datos.</td>
                <td><a href="codigoPHP/ejercicio01pdo.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio01pdo.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href=""><img src="" alt=""></a></td>
                <td><a href=""><img src="" alt=""></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                <td><a href="codigoPHP/ejercicio02pdo.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio02pdo.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href="codigoPHP/ejercicio02mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio02mysqli.php"></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Formulario para añadir un departamento a la tabla Departamento.</td>
                <td><a href="codigoPHP/ejercicio03pdo.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio03pdo.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href="codigoPHP/ejercicio03mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio03mysqli.php"></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Formulario de búsqueda de departamentos por descripción .</td>
                <td><a href="codigoPHP/ejercicio04pdo.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio04pdo.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href="codigoPHP/ejercicio04mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio04mysqli.php"></a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pagina web que añade tres registros a nuestra tabla Departamento.</td>
                <td><a href="codigoPHP/ejercicio05pdo.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio05pdo.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
                <td><a href="codigoPHP/ejercicio05mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio05mysqli.php"></a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Pagina web que cargue registros en la tabla Departamento.</td>
                <td><a href="codigoPHP/ejercicio06pdo.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio06pdo.php"></a></td>
                <td><a href="codigoPHP/ejercicio06mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio06mysqli.php"></a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla.</td>
                <td><a href="codigoPHP/ejercicio07pdo.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio07pdo.php"></a></td>
                <td><a href="codigoPHP/ejercicio07mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio07mysqli.php"></a></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Página web que toma datos (código y descripción) de la tabla Departamento.</td>
                <td><a href="codigoPHP/ejercicio08pdo.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio08pdo.php"></a></td>
                <td><a href="codigoPHP/ejercicio08mysqli.php"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio08mysqli.php"></a></td>
            </tr>
        </table>
    </main>
    <footer>
        <caption>
            <a href="/ENLDWESProyectoDWES/indexProyectoDWES.php">Enrique Nieto Lorenzo</a> | 03/10/2025
        </caption>
    </footer>
</body>
</html>
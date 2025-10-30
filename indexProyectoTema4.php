<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TEMA 3 - CARACTERÍSTICAS DEL LENGUAJE PHP</title>
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
            <tr>
                <td>0</td>
                <td>Hola mundo y phpinfo().</td>
                <td><a href="codigoPHP/ejercicio00.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio00.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump).</td>
                <td><a href="codigoPHP/ejercicio01.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio01.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Inicializar y mostrar una variable heredoc.</td>
                <td><a href="codigoPHP/ejercicio02.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio02.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mostrar en tu página index la fecha y hora actual formateada en castellano. (Utilizar cuando sea posible la clase DateTime)</td>
                <td><a href="codigoPHP/ejercicio03.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio03.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.</td>
                <td><a href="codigoPHP/ejercicio04.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio04.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</td>
                <td><a href="codigoPHP/ejercicio05.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio05.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</td>
                <td><a href="codigoPHP/ejercicio06.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio06.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Mostrar el nombre del fichero que se está ejecutando.</td>
                <td><a href="codigoPHP/ejercicio07.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio07.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Mostrar la dirección IP del equipo desde el que estás accediendo.</td>
                <td><a href="codigoPHP/ejercicio08.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio08.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            
        </table>
    </table>
            
        
    </main>
    <footer>
        <caption>
            <a href="/ENLDWESProyectoDWES/indexProyectoDWES.php">Enrique Nieto Lorenzo</a> | 03/10/2025
        </caption>
    </footer>
</body>
</html>
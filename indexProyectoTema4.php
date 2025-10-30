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
            <tr>
                <td>9</td>
                <td>Mostrar el path donde se encuentra el fichero que se está ejecutando.</td>
                <td><a href="codigoPHP/ejercicio09.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio09.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Mostrar el contenido del fichero que se está ejecutando.</td>
                <td><a href="codigoPHP/ejercicio10.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio10.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Mostrar el documento PHPDoc del proyecto que se está ejecutando generado con PHP Documentor o ApiGen.</td>
<!--                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>-->
            </tr>
<!--            <tr>
                <td>12</td>
                <td>Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</td>
                <td><a href="codigoPHP/ejercicio12.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio12.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr> -->
<!--            <tr>
                <td>13</td>
                <td>Crear una función que cuente el número de visitas a la página actual desde una fecha concreta.</td>
                <td><a href="codigoPHP/ejercicio13.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="codigoPHP/muestraejercicio13.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>14</td>
                <td>Comprobar las librerías que estás utilizando en tu entorno de desarrollo y explotación. Crear tu propia librería de funciones y estudiar la forma de usarla en el entorno de desarrollo y en el de explotación.</td>
                <td><a href="codigoPHP/ejercicio14.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="muestraejercicio14.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>-->
            <tr>
                <td>15</td>
                <td>Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana. (Array asociativo con los nombres de los días de la semana).</td>
                <td><a href="codigoPHP/ejercicio15.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio15.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>16</td>
                <td>Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</td>
                <td><a href="codigoPHP/ejercicio16.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio16.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
<!--       <tr>
                <td>17</td>
                <td>Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.</td>
                <td><a href="codigoPHP/ejercicio17.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="muestraejercicio17.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>18</td>
                <td>Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</td>
                <td><a href="codigoPHP/ejercicio18.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="muestraejercicio18.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>19</td>
                <td>Construir una librería de funciones de validación de campos de formularios (LibreríaValidacionFormularios.php) para utilizarla en los siguientes ejercicios. Discusión: diferencia entre librería de funciones y clase.</td>
                <td><a href="codigoPHP/ejercicio19.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="muestraejercicio19.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>20</td>
                <td>Convertir la LibreriaValidacionFormularios.php en una clase ValidacionFormularios.php. El profesor facilitará a los alumnos la clase AAMMDDValidacionFormularios.php desarrollada en el curso anterior como punto de partida.</td>
                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>-->
            <tr>
                <td>21</td>
                <td>Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas.</td>
                <td><a href="codigoPHP/ejercicio21.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio21.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>22</td>
                <td>Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.</td>
                <td><a href="codigoPHP/ejercicio22.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href="mostrarcodigo/muestraejercicio22.php"><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
 <!--            <tr>
                <td>23</td>
                <td>Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.</td>
                <td><a href="codigoPHP/ejercicio23.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>24</td>
                <td>Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la  misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.</td>
                <td><a href="codigoPHP/ejercicio24.php"><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>25</td>
                <td>Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.</td>
                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>26</td>
                <td>Probar la plantilla anterior desarrollando un formulario que recoja la temperatura y la presión atmosférica en una serie de fechas y (cuando el usuario lo decida) genere un informe con los datos recibidos y un promedios, mínimos y máximos de temperatura y presión atmosférica.</td>
                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>27</td>
                <td>Ejercicio extra para probar la plantilla del formulario que ha ganado el concurso</td>
                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>
            <tr>
                <td>28</td>
                <td> Ejercicio extra para probar la habilidad del alumno en en manejo de arrays multidimensionales.</td>
                <td><a href=""><img src="webroot/media/images/botonplay.png" alt="boton_play"></a></td>
                <td><a href=""><img src="webroot/media/images/botoncode.png" alt="boton_code"></a></td>
            </tr>-->
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
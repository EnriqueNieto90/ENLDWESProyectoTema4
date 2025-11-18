<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 1 PDO</title>
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
            max-width: 1400px;
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

        footer{
            margin: auto;
            background-color: green;
            text-align: center;
            height: 150px;
	    color: white;
        }
	main{
	justify-content:center;
	}

    </style>
</head>
<body>
    <header>
        <h1><b>EJERCICIO 1 PDO</b></h1>
    </header>
    <main>   
        <section>
            <?php
            /**
            * @author: Enrique Nieto Lorenzo
            * @since: 03/11/2025
            * 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.
            */

            
            //Enlace a los datos de conexión
                require_once '../config/confDBPDO.php';
         
            //Array de los atributos de la conexión
            
            $aAtributosConexion = [
                'AUTOCOMMIT', 'ERRMODE', 'CASE', 'CLIENT_VERSION', 'CONNECTION_STATUS',
                'ORACLE_NULLS', 'PERSISTENT', 'PREFETCH', 'SERVER_INFO', 'SERVER_VERSION',
                'TIMEOUT'
            ];

            echo '<h3>Conexión correcta a la Base de datos: </h3>';
            
            try {
                $miDB = new PDO(DSN,USERNAME,PASSWORD);
                echo 'Conectado a la base de datos con éxito';
                echo '<br><br>';

                echo '<p><b>Los atributos de la conexión son: </b></p>';
                
                foreach ($aAtributosConexion as $atributo) {
                    echo "PDO::ATTR_$atributo: ";
                    try {
                        echo $miDB->getAttribute( constant( "PDO::ATTR_$atributo" ) ) . "<br>";
                    } catch ( PDOException $exceptionPDO ) {
                        echo $exceptionPDO->getMessage() . "<br>";
                    }
                }

            } catch (PDOException $miExceptionPDO) {
                echo 'Error: '.$miExceptionPDO->getMessage();
                echo '<br>';
                echo 'Código de error: '.$miExceptionPDO->getCode();
            } finally {
                unset($miDB);
            }
            ?>
        </section>
    </main>

    <footer>
        <caption>
            <a href="/ENLDWESProyectoTema4/indexProyectoTema4.php">Enrique Nieto Lorenzo</a> | 03/11/2025
        </caption>
    </footer>
</body>
</html>

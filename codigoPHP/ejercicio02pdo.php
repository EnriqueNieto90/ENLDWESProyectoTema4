<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 2 PDO</title> 
        <link rel="stylesheet" href="../webroot/css/estiloGeneral.css">
</head>
<body>
    <header>
        <h1><b>EJERCICIO 2 PDO</b></h1>
    </header>
    <main>   
        <section>
            <?php
            /**
             * @author: Enrique Nieto Lorenzo
             * @since: 07/11/2025
             * 2. Mostrar el contenido de la tabla Departamento y el número de registros.
             */
             //Preparamos datos de conexión (instituto)
            
//            const DSN = "mysql:host=10.199.9.184; dbname=DBENLDWESProyectoTema4";
//            const USERNAME = 'userENLDWESProyectoTema4';
//            const PASSWORD = 'paso';
            
            //Preparamos datos de conexión (casa)
            
            const DSN = "mysql:host=192.168.1.131; dbname=DBENLDWESProyectoTema4";
            const USERNAME = 'userENLDWESProyectoTema4';
            const PASSWORD = 'paso';
             

             echo '<h3>Tabla usando consultas preparadas</h3>';
             // variable para contar el numero de registros recuperados de la BBDD
             $numRegistros = 0;
             try {
                 $miDB = new PDO(DSN,USERNAME,PASSWORD);

                 $consulta = $miDB->prepare("select * from T02_Departamento");
                 $consulta->execute();

                 echo '<table>';
                 echo '<tr>';
                 echo '<th>T02_CodDepartamento</th>';
                 echo '<th>T02_DescDepartamento</th>';
                 echo '<th>T02_FechaCreacionDepartamento</th>';
                 echo '<th>T02_VolumenDeNegocio</th>';
                 echo '<th>T02_FechaBajaDepartamento</th>';
                 echo '</tr>';

                 while ($registro = $consulta->fetch()) {
                     echo '<tr>';
                     echo '<td>'.$registro['T02_CodDepartamento'].'</td>';
                     echo '<td>'.$registro["T02_DescDepartamento"].'</td>';
                     echo '<td>'.$registro["T02_FechaCreacionDepartamento"].'</td>';
                     // formateamos el float para que se vea en €
                     echo '<td>'.number_format($registro["T02_VolumenDeNegocio"],2,',','.').' €</td>';
                     echo '<td>'.$registro["T02_FechaBajaDepartamento"].'</td>';
                     echo '</tr>';
                     $numRegistros++;
                 }
                 echo '</table>';

                 echo '<h3>Número de registros: '.$numRegistros.'</h3>';

             } catch (PDOException $miExceptionPDO) {
                 echo 'Error: '.$miExceptionPDO->getMessage();
                 echo '<br>';
                 echo 'Código de error: '.$miExceptionPDO->getCode();
             } finally {
                 unset($miDB);
             }

             echo '<h3>Tabla usando consultas con query</h3>';
             try {
                 $miDB = new PDO(DSN,USERNAME,PASSWORD);

                 // No se puede usar exec para consultas de select https://www.php.net/manual/es/pdo.exec.php
                 // $numRegistros = $miDB->exec('select * from T02_Departamento');
                 $numRegistros = 0;
                 $consulta = $miDB->query("select * from T02_Departamento");

                 echo '<table>';
                 echo '<tr>';
                 echo '<th>T02_CodDepartamento</th>';
                 echo '<th>T02_DescDepartamento</th>';
                 echo '<th>T02_FechaCreacionDepartamento</th>';
                 echo '<th>T02_VolumenDeNegocio</th>';
                 echo '<th>T02_FechaBajaDepartamento</th>';
                 echo '</tr>';

                 while ($registro = $consulta->fetch()) {
                     echo '<tr>';
                     echo '<td>'.$registro['T02_CodDepartamento'].'</td>';
                     echo '<td>'.$registro["T02_DescDepartamento"].'</td>';
                     echo '<td>'.$registro["T02_FechaCreacionDepartamento"].'</td>';
                     // formateamos el float para que se vea en €
                     echo '<td>'.number_format($registro["T02_VolumenDeNegocio"],2,',','.').' €</td>';
                     echo '<td>'.$registro["T02_FechaBajaDepartamento"].'</td>';
                     echo '</tr>';
                     $numRegistros++;
                 }
                 echo '</table>';
                 echo '<h3>Número de registros: '.$numRegistros.'</h3>';

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






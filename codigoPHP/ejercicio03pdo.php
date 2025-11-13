<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 3 PDO</title>
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
            
        #codDepartamento, #descripcion {
            background-color: lightgoldenrodyellow;
        }
        
        form {
            max-width: 600px; 
            margin: 20px auto;
        }

        
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block; 
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }
        
        /* Efecto visual al seleccionar un campo */
        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: green;
            outline: none;
            box-shadow: 0 0 5px rgba(0,128,0,0.2);
        }
        
        input[readonly]{
            background-color: #d3d3d3ff;
            color: #6e6e6eff;
        }

        /* Estilo para los mensajes de error */
        .error {
            color: red;
            font-size: 0.9em;
            display: block;
            margin-top: 5px;
        }
        
        /* Estilo unificado para botones */
        input[type="submit"],
        a button 
        .cancelar {
            padding: 12px 20px;
            margin-top: 10px;
            border-radius: 5px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover,
        a button:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    <header>
        <h1><b>EJERCICIO 3 PDO</b></h1>
    </header>
    <main>    
       <?php
       /**
        * @author: Enrique Nieto Lorenzo
        * @since: 09/11/2025
        * 3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.
        */
        include_once "../core/231018libreriaValidacion.php";
        
        // preparación de los datos de conexión para luego usarlos en el PDO
        define('DSN', 'mysql:host=' . $_SERVER['SERVER_ADDR'] . '; dbname=DBENLDWESProyectoTema4');
        define('USERNAME','userENLDWESProyectoTema4');
        define('PASSWORD','paso');
       
        $entradaOK = true; //Variable que nos indica que todo va bien
        $aErrores = [  //Array donde recogemos los mensajes de error
            'T02_CodDepartamento' => '', 
            'T02_DescDepartamento' => '',
            'T02_FechaCreacionDepartamento' => '',
            'T02_VolumenDeNegocio' => '',
            'T02_FechaBajaDepartamento' => ''
        ];
        $aRespuestas=[ //Array donde recogeremos la respuestas correctas (si $entradaOK)
            'T02_CodDepartamento' => '', 
            'T02_DescDepartamento' => '',
            'T02_FechaCreacionDepartamento' => '',
            'T02_VolumenDeNegocio' => '',
            'T02_FechaBajaDepartamento' => ''
        ]; 
        
        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
        if (isset($_REQUEST["enviar"])) {//Código que se ejecuta cuando se envía el formulario

            // Validamos los datos del formulario
            $aErrores['T02_CodDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['T02_CodDepartamento'],3,0,1,);
            $aErrores['T02_DescDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['T02_DescDepartamento'],255,0,1);

            // Reemplazar la coma por un punto para estandarizar el formato numérico
            $volumenNegocioPunto = str_replace(',', '.', $_REQUEST['T02_VolumenDeNegocio']);
            $aErrores['T02_VolumenDeNegocio']= validacionFormularios::comprobarFloat($volumenNegocioPunto);
            
            foreach($aErrores as $campo => $valor){
                if(!empty($valor)){ // Comprobar si el valor es válido
                    $entradaOK = false;
                } 
            }

            // Validación de la parte de la bbdd, comprobar si existe el código en ella
            if (empty($aErrores['T02_CodDepartamento'])) {
                
                try {
                    $miDB = new PDO(DSN,USERNAME,PASSWORD);
                    $sql = <<<sql
                        select * from T02_Departamento 
                        where T02_CodDepartamento=?
                    sql;
                    
                    $consulta = $miDB->prepare($sql);
                    $consulta->bindParam(1,$_REQUEST['T02_CodDepartamento']);
                    $consulta->execute();
                    
                    $registro = $consulta->fetch();
                    if ($registro!=false) {// si no devuelve nada que no compruebe el código
                        // Comprobamos si existe el T02_CodDepartamento en la BBDD
                        if($registro[0]==$_REQUEST['T02_CodDepartamento']){
                            $aErrores['T02_CodDepartamento']='El código ya existe un la BBDD';
                            $entradaOK = false;
                        } // si existe guardamos un error para mostrarlo en el formulario
                    }
                    
                } catch (PDOException $miExceptionPDO) {
                    // temporalmente ponemos estos errores para que se muestren en pantalla
                    $aErrores['T02_CodDepartamento']= 'Error: '.$miExceptionPDO->getMessage().'con código de error: '.$miExceptionPDO->getCode();
                    $entradaOK = false;
                } finally {
                    unset($miDB);
                }
            }
            
        } else {//Código que se ejecuta antes de rellenar el formulario
            $entradaOK = false;
        }


        //Tratamiento del formulario
        if($entradaOK){ //Cargar la variable $aRespuestas y tratamiento de datos OK
            
            // Recuperar los valores del formulario
            $aRespuestas['T02_CodDepartamento'] = $_REQUEST['T02_CodDepartamento'];
            $aRespuestas['T02_DescDepartamento'] = "Departamento de ".$_REQUEST['T02_DescDepartamento'];
            $aRespuestas['T02_VolumenDeNegocio'] = str_replace(',', '.', $_REQUEST['T02_VolumenDeNegocio']);
            
            try {
                    $miDB = new PDO(DSN,USERNAME,PASSWORD);
                    $sql = <<<sql
                        insert into T02_Departamento 
                        values (?,?,now(),?,null)
                    sql;

                    // conexion a la BBDD e insertar un registro
                    $consulta = $miDB->prepare($sql);
                    $consulta->bindParam(1,$aRespuestas['T02_CodDepartamento']);
                    $consulta->bindParam(2,$aRespuestas['T02_DescDepartamento']);
                    $consulta->bindParam(3,$aRespuestas['T02_VolumenDeNegocio']);
                    
                    if($consulta->execute()){
                        echo 'Nuevo departamento creado con éxito';
                    } else {
                        echo 'Error al crear el departamento';
                    }
                    
                    
                } catch (PDOException $miExceptionPDO) {
                    // temporalmente ponemos estos errores para que se muestren en pantalla
                    $aErrores['T02_CodDepartamento']= 'Error: '.$miExceptionPDO->getMessage().'con código de error: '.$miExceptionPDO->getCode();
                    $entradaOK = false;
                } finally {
                    unset($miDB);
                }

            // Botón para volver a recargar el formulario inicial
            echo '<a href="' . $_SERVER['PHP_SELF'] . '"><button>Volver</button></a>';
            
        } else { //Mostrar el formulario hasta que lo rellenemos correctamente
            //Mostrar formulario
            //Mostrar los datos tecleados correctamente en intentos anteriores
            //Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
            $oFechaHoy = new DateTime();
            ?>
                
                <h2>NUEVO DEPARTAMENTO</h2>
                <hr>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> 
                    <div class="form-group">
                        <label for="codDepartamento">Código de Dpto:</label>
                        <input type="text" id="codDepartamento" name="T02_CodDepartamento" 
                               value="<?php echo $_REQUEST['T02_CodDepartamento'] ?? '' ?>"
                               style="text-transform: uppercase;" 
                               oninput="this.value = this.value.toUpperCase()">
                        <span class="error"><?php echo $aErrores['T02_CodDepartamento'] ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripcion Dpto:</label>
                        <input type="text" id="descripcion" name="T02_DescDepartamento" value="<?php echo $_REQUEST['T02_DescDepartamento'] ?? '' ?>">
                        <span class="error"><?php echo $aErrores['T02_DescDepartamento'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="fecha_creacion">Fecha creación Dpto: </label>
                        <input type="date" id="fecha_creacion" name="T02_FechaCreacionDepartamento" value="<?php echo $oFechaHoy ?>" readonly>
                        <span class="error"><?php echo $aErrores['T02_FechaCreacionDepartamento'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="volumenNegocio">Volumen de negocio:</label> 
                        <input type="text" id="volumenNegocio" name="T02_VolumenDeNegocio" value="<?php echo $_REQUEST['T02_VolumenDeNegocio'] ?? '' ?>">
                        <span class="error"><?php echo $aErrores['T02_VolumenDeNegocio'] ?></span>
                    </div>
                    
                    <input type="submit" value="Aceptar" name="enviar">
                    <a href="../indexProyectoTema4.php" class="cancelar">Cancelar</a>
                </form>

            <?php
            
        }
       ?>
    </main>
    <section>
    <?php 
        try {
            $miDB = new PDO(DSN,USERNAME,PASSWORD);
            $sql = "select * from T02_Departamento";
            
            $consulta = $miDB->prepare($sql);
            $consulta->execute();

            echo '<table>';
            echo '<tr>';
            echo '<th>Código</th>';
            echo '<th>Departamento</th>';
            echo '<th>Fecha de Creacion</th>';
            echo '<th>Volumen de Negocio</th>';
            echo '<th>Fecha de Baja</th>';
            echo '</tr>';

            while ($registro = $consulta->fetch()) {
                echo '<tr>';
                echo '<td>'.$registro['T02_CodDepartamento'].'</td>';
                echo '<td>'.$registro["T02_DescDepartamento"].'</td>';
                // construimos la fecha a partir de la que hay en la bbdd y luego mostramos sólo dia mes y año
                $oFecha = new DateTime($registro["T02_FechaCreacionDepartamento"]);
                echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                // formateamos el float para que se vea en €
                echo '<td>'.number_format($registro["T02_VolumenDeNegocio"],2,',','.').' €</td>';
                if (is_null($registro["T02_FechaBajaDepartamento"])) {
                    echo '<td></td>';
                } else {
                    $oFecha = new DateTime($registro["T02_FechaBajaDepartamento"]);
                    echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

        } catch (PDOException $miExceptionPDO) {
            echo 'Error: '.$miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: '.$miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }
    ?>
    </section>
    <footer>
        <caption>
            <a href="/ENLDWESProyectoTema4/indexProyectoTema4.php">Enrique Nieto Lorenzo</a> | 10/11/2025
        </caption>
    </footer>
</body>
</html>


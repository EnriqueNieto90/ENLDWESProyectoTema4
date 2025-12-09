<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 3 PDO</title>
    <link rel="stylesheet" href="../webroot/css/estiloGeneral.css">
    <link rel="stylesheet" href="../webroot/css/estiloFormularioTabla.css">
</head>
<body>
    <header>
        <h1><b>EJERCICIO 3 PDO</b></h1>
    </header>
    <main>  
        <?php
        // Incluye la librería de validación de formularios, que contiene funciones reutilizables.
        include_once "../core/231018libreriaValidacion.php";
        
        //Enlace a los datos de conexión
                require_once '../config/confDBPDO.php';


        //--- Inicialización de variables de estado y almacenamiento ---

        // Flag para controlar si el formulario ha sido enviado y si los datos son correctos.
        $bEntradaOK = true;
        // Array para almacenar los mensajes de error de cada campo del formulario.
        $aErrores = [
            'T02_CodDepartamento' => '',
            'T02_DescDepartamento' => '',
            'T02_VolumenDeNegocio' => '',
        ];
        // Array para almacenar los datos válidos y limpios del formulario.
        $aRespuestas=[
            'T02_CodDepartamento' => '',
            'T02_DescDepartamento' => '',
            'T02_VolumenDeNegocio' => '',
        ];

        // Comprueba si el formulario ha sido enviado para iniciar el proceso de validación.
        if (isset($_REQUEST["enviar"])) {

            // --- Validación de los campos del formulario ---
            $aErrores['T02_CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_CodDepartamento'],3,0,1);
            $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_DescDepartamento'],255,0,1);

            // Normaliza el separador decimal a un punto para una correcta validación de tipo float.
            $sVolumenNegocioNormalizado = str_replace(',', '.', $_REQUEST['T02_VolumenDeNegocio']);
            $aErrores['T02_VolumenDeNegocio'] = validacionFormularios::comprobarFloat($sVolumenNegocioNormalizado);

            // Recorre el array de errores. Si encuentra alguno, marca la entrada como no válida.
            foreach($aErrores as $sNombreCampo => $sMensajeError){
                if(!empty($sMensajeError)){
                    $bEntradaOK = false;
                }
            }

            // --- Verificación de unicidad del código de departamento en la BBDD ---
            if (empty($aErrores['T02_CodDepartamento'])) {
                try {
                    $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
                    $sConsultaSQL = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?";

                    $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
                    $oSentenciaPreparada->bindParam(1, $_REQUEST['T02_CodDepartamento']);
                    $oSentenciaPreparada->execute();

                    if ($oSentenciaPreparada->rowCount() > 0) {
                        $aErrores['T02_CodDepartamento'] = 'El código ya existe en la BBDD';
                        $bEntradaOK = false;
                    }
                } catch (PDOException $oExcepcionPDO) {
                    $aErrores['T02_CodDepartamento'] = 'Error: ' . $oExcepcionPDO->getMessage();
                    $bEntradaOK = false;
                } finally {
                    unset($oConexionPDO);
                }
            }

        } else {
            // Si el formulario no se ha enviado (primera visita), se fuerza a que se muestre.
            $bEntradaOK = false;
        }
        ?>

        <?php
        // --- Tratamiento de la lógica principal: Inserción o Visualización del Formulario ---
        if($bEntradaOK){
            // Si la entrada es válida, prepara los datos y los inserta en la BBDD.
            $aRespuestas['T02_CodDepartamento'] = strtoupper($_REQUEST['T02_CodDepartamento']);
            $aRespuestas['T02_DescDepartamento'] = "Departamento de ".$_REQUEST['T02_DescDepartamento'];
            $aRespuestas['T02_VolumenDeNegocio'] = str_replace(',', '.', $_REQUEST['T02_VolumenDeNegocio']);
            
            try {
                $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
                $sConsultaSQL = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) VALUES (?,?,now(),?)";

                $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
                $oSentenciaPreparada->bindParam(1, $aRespuestas['T02_CodDepartamento']);
                $oSentenciaPreparada->bindParam(2, $aRespuestas['T02_DescDepartamento']);
                $oSentenciaPreparada->bindParam(3, $aRespuestas['T02_VolumenDeNegocio']);
                $oSentenciaPreparada->execute();
                
            } catch (PDOException $oExcepcionPDO) {
                echo '<p class="error">Error al crear el departamento: ' . $oExcepcionPDO->getMessage() . '</p>';
            } finally {
                unset($oConexionPDO);
            }

            // Muestra un mensaje de éxito y un botón para añadir otro departamento.
            echo '<div style="text-align: center; margin: 40px 0;">';
            echo '<h2>¡Éxito!</h2>';
            echo '<p><b>El nuevo departamento se ha creado correctamente.</b></p>';
            echo '<a href="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" class="boton">Añadir otro departamento</a>';
            echo '</div>';
            
        } else { // Si la entrada no es válida (o es la primera carga), muestra el formulario.
            $oFechaActual = new DateTime();
            ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                    <h2>Añadir Nuevo Departamento</h2>
                    
                    <div class="form-group">
                        <label for="T02_CodDepartamento">Código (3 letras):</label>
                        <input type="text" id="T02_CodDepartamento" class="obligatorio" name="T02_CodDepartamento" value="<?php echo $_REQUEST['T02_CodDepartamento'] ?? '' ?>" style="text-transform: uppercase;">
                        <?php if($aErrores['T02_CodDepartamento']) echo "<span class='error'>{$aErrores['T02_CodDepartamento']}</span>"; ?>
                    </div>

                    <div class="form-group">
                        <label for="T02_DescDepartamento">Descripción:</label>
                        <input type="text" id="T02_DescDepartamento" name="T02_DescDepartamento" class="obligatorio" value="<?php echo $_REQUEST['T02_DescDepartamento'] ?? '' ?>" placeholder="Ej: Marketing">
                        <?php if($aErrores['T02_DescDepartamento']) echo "<span class='error'>{$aErrores['T02_DescDepartamento']}</span>"; ?>
                    </div>

                    <div class="form-group">
                        <label for="T02_FechaCreacionDepartamento">Fecha de Alta:</label>
                        <input type="text" id="T02_FechaCreacionDepartamento" value="<?php echo $oFechaActual->format("d/m/Y") ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="T02_VolumenDeNegocio">Volumen de Negocio:</label>
                        <input type="text" id="T02_VolumenDeNegocio" name="T02_VolumenDeNegocio" value="<?php echo $_REQUEST['T02_VolumenDeNegocio'] ?? '' ?>" placeholder="Ej: 15000.50">
                        <?php if($aErrores['T02_VolumenDeNegocio']) echo "<span class='error'>{$aErrores['T02_VolumenDeNegocio']}</span>"; ?>
                    </div>
                    
                    <div class="form-actions">
                        <input type="submit" value="Aceptar" name="enviar">
                        <a href="#" class="boton cancelar">Cancelar</a>
                    </div>
                </form>
            <?php
        }

        // --- Bloque para mostrar la tabla de departamentos existentes (se ejecuta siempre) ---
        echo "<h2>Listado Actual de Departamentos</h2>";
        try {
            $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
            $sConsultaSQL = "SELECT * FROM T02_Departamento";
            $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
            $oSentenciaPreparada->execute();
            
            echo '<table>';
            echo '<tr><th>Código</th><th>Departamento</th><th>Fecha de Creación</th><th>Volumen de Negocio</th><th>Fecha de Baja</th></tr>';

            while ($aFilaDepartamento = $oSentenciaPreparada->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>'.$aFilaDepartamento['T02_CodDepartamento'].'</td>';
                echo '<td>'.$aFilaDepartamento["T02_DescDepartamento"].'</td>';
                
                $oFecha = new DateTime($aFilaDepartamento["T02_FechaCreacionDepartamento"]);
                echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                
                echo '<td>'.number_format($aFilaDepartamento["T02_VolumenDeNegocio"], 2, ',', '.').' €</td>';
                
                if (is_null($aFilaDepartamento["T02_FechaBajaDepartamento"])) {
                    echo '<td></td>';
                } else {
                    $oFecha = new DateTime($aFilaDepartamento["T02_FechaBajaDepartamento"]);
                    echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

        } catch (PDOException $oExcepcionPDO) {
            echo '<p class="error">Error al mostrar la tabla: '.$oExcepcionPDO->getMessage().'</p>';
        } finally {
            unset($oConexionPDO);
        }
        ?>
    </main>
    <footer>
        <caption>
            <a href="/ENLDWESProyectoTema4/indexProyectoTema4.php">Enrique Nieto Lorenzo</a> | 10/11/2025
        </caption>
    </footer>
</body>
</html>


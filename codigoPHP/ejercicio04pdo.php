<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 4 PDO - Búsqueda</title>
    <link rel="stylesheet" href="../webroot/css/estiloGeneral.css">
    <link rel="stylesheet" href="../webroot/css/estiloFormularioTabla.css">
</head>
<body>
    <header>
        <h1><b>EJERCICIO 4 PDO</b></h1>
    </header>
    <main>  
        <?php
        // Incluye la librería de validación de formularios, que contiene funciones reutilizables.
        include_once "../core/231018libreriaValidacion.php";
        
        //Enlace a los datos de conexión
                require_once '../config/confDBPDO.php';


        //--- Inicialización de variables de estado y almacenamiento ---

        // Variable para el término de búsqueda. Por defecto, '%%' para mostrar todos los departamentos.
        $sTerminoBusqueda = '%%'; 
        
        $bEntradaOK = true; // Flag para controlar si la entrada de búsqueda es válida.
        // Array para almacenar los mensajes de error. Solo necesitamos uno para la búsqueda.
        $aErrores = [
            'DescDepartamentoBuscado' => ''
        ];
        
        // Comprueba si el formulario ha sido enviado para iniciar el proceso de validación.
        if (isset($_REQUEST["enviar"])) {

            // --- Validación del campo de búsqueda (solo si no está vacío) ---
            if (!empty($_REQUEST['DescDepartamentoBuscado'])) {
                $aErrores['DescDepartamentoBuscado'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescDepartamentoBuscado'], 255, 0, 1);
                
                // Si hay algún error en la validación, marcamos la entrada como no válida.
                if (!empty($aErrores['DescDepartamentoBuscado'])) {
                    $bEntradaOK = false;
                }
            }

            // Si la entrada es válida, preparamos el término de búsqueda para la consulta SQL.
            if($bEntradaOK){
                // Construimos el término con comodines '%' para una búsqueda LIKE.
                // Usamos strtolower para que la búsqueda no distinga entre mayúsculas y minúsculas.
                $sTerminoBusqueda = '%' . strtolower($_REQUEST['DescDepartamentoBuscado']) . '%';
            }
        }
        ?>
        
        <!-- El formulario ahora es para buscar, no para añadir -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <h2>Buscar Departamento por Descripción</h2>
            
            <div class="form-group">
                <label for="DescDepartamentoBuscado">Descripción del Departamento:</label>
                <input type="text" id="DescDepartamentoBuscado" name="DescDepartamentoBuscado" value="<?php echo $_REQUEST['DescDepartamentoBuscado'] ?? '' ?>" placeholder="Deje en blanco para ver todos">
                <?php if($aErrores['DescDepartamentoBuscado']) echo "<span class='error'>{$aErrores['DescDepartamentoBuscado']}</span>"; ?>
            </div>
            
            <div class="form-actions">
                <input type="submit" value="Buscar" name="enviar">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="boton cancelar">Limpiar Búsqueda</a>
            </div>
        </form>

        <?php
        // --- Bloque para mostrar la tabla de departamentos (ahora filtrada por la búsqueda) ---
        echo "<h2>Listado de Departamentos</h2>";
        try {
            $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
            // La consulta ahora incluye una cláusula WHERE para filtrar por descripción.
            // Usamos LOWER() en la BBDD para que coincida con nuestro término en minúsculas.
            $sConsultaSQL = "SELECT * FROM T02_Departamento WHERE LOWER(T02_DescDepartamento) LIKE ?";
            
            $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
            // Vinculamos el término de búsqueda al parámetro de la consulta.
            $oSentenciaPreparada->bindParam(1, $sTerminoBusqueda);
            $oSentenciaPreparada->execute();
            
            if ($oSentenciaPreparada->rowCount() > 0) {
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
            } else {
                echo '<p style="text-align: center; margin-top: 20px;">No se encontraron departamentos que coincidan con la búsqueda.</p>';
            }

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


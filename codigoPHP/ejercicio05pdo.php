<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 5 PDO - Transacciones</title>
    <link rel="stylesheet" href="../webroot/css/estiloGeneral.css">
    <link rel="stylesheet" href="../webroot/css/estiloFormularioTabla.css">
    <style>
        .mensaje-transaccion {
            padding: 15px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
            font-weight: bold;
        }
        .mensaje-transaccion.exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .mensaje-transaccion.error-tx {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .info-sql {
            font-family: 'Courier New', Courier, monospace;
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            margin: 10px auto;
            max-width: 800px;
        }
    </style>
</head>
<body>
    <header>
        <h1><b>EJERCICIO 5 PDO</b></h1>
    </header>
    <main>  
        <?php
        
        //Enlace a los datos de conexión
                require_once '../config/confDBPDO.php';

        // --- Lógica de la transacción ---

        $aNuevosDepartamentos = [
            ['T02_CodDepartamento' => 'TRX', 'T02_DescDepartamento' => 'Departamento Transacción 1', 'T02_VolumenDeNegocio' => 1000.00],
            ['T02_CodDepartamento' => 'TRY', 'T02_DescDepartamento' => 'Departamento Transacción 2', 'T02_VolumenDeNegocio' => 2000.00],
            ['T02_CodDepartamento' => 'TRZ', 'T02_DescDepartamento' => 'Departamento Transacción 3', 'T02_VolumenDeNegocio' => 3000.00]
        ];
        
        $aNuevosDepartamentosConError = [
            ['T02_CodDepartamento' => 'DUP', 'T02_DescDepartamento' => 'Departamento Duplicado 1', 'T02_VolumenDeNegocio' => 1000.00],
            ['T02_CodDepartamento' => 'OKK', 'T02_DescDepartamento' => 'Departamento Correcto', 'T02_VolumenDeNegocio' => 2000.00],
            ['T02_CodDepartamento' => 'DUP', 'T02_DescDepartamento' => 'Departamento Duplicado 2', 'T02_VolumenDeNegocio' => 3000.00]
        ];

        // --- Intento de Transacción Exitosa ---
        echo "<h2>Intento de Transacción Exitosa</h2>";
        try {
            $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
            $oConexionPDO->beginTransaction();
            echo '<p>Iniciando transacción...</p>';

            // La consulta ahora usa marcadores con nombre (:nombre)
            $sConsultaSQL = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) VALUES (:codDepto, :descDepto, now(), :volNegocio)";
            $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
            
            $codDepto;
            $descDepto;
            $volNegocio;

            // Vinculamos las variables a los marcadores por su nombre
            $oSentenciaPreparada->bindParam(':codDepto', $codDepto);
            $oSentenciaPreparada->bindParam(':descDepto', $descDepto);
            $oSentenciaPreparada->bindParam(':volNegocio', $volNegocio);

            foreach ($aNuevosDepartamentos as $aDepto) {
                echo "<div class='info-sql'><b>Intentando insertar:</b> Código={$aDepto['T02_CodDepartamento']}, Desc.={$aDepto['T02_DescDepartamento']}</div>";
                
                $codDepto = $aDepto['T02_CodDepartamento'];
                $descDepto = $aDepto['T02_DescDepartamento'];
                $volNegocio = $aDepto['T02_VolumenDeNegocio'];

                $oSentenciaPreparada->execute();
            }

            $oConexionPDO->commit();
            echo '<div class="mensaje-transaccion exito">¡ÉXITO! Transacción completada y cambios guardados (COMMIT).</div>';

        } catch (PDOException $oExcepcionPDO) {
            $oConexionPDO->rollBack();
            echo '<div class="mensaje-transaccion error-tx">¡ERROR! Transacción fallida. Se han deshecho todos los cambios (ROLLBACK).<br><b>Detalle:</b> ' . $oExcepcionPDO->getMessage() . '</div>';
        } finally {
            unset($oConexionPDO);
        }
        
        // --- Intento de Transacción Fallida ---
        echo "<h2>Intento de Transacción Fallida (con clave duplicada)</h2>";
        try {
            $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
            $oConexionPDO->beginTransaction();
            echo '<p>Iniciando transacción...</p>';
            
            // La consulta ahora usa marcadores con nombre (:nombre)
            $sConsultaSQL = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) VALUES (:codDepto, :descDepto, now(), :volNegocio)";
            $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);

            $codDepto;
            $descDepto;
            $volNegocio;

            // Vinculamos las variables a los marcadores por su nombre
            $oSentenciaPreparada->bindParam(':codDepto', $codDepto);
            $oSentenciaPreparada->bindParam(':descDepto', $descDepto);
            $oSentenciaPreparada->bindParam(':volNegocio', $volNegocio);
            
            foreach ($aNuevosDepartamentosConError as $aDepto) {
                echo "<div class='info-sql'><b>Intentando insertar:</b> Código={$aDepto['T02_CodDepartamento']}, Desc.={$aDepto['T02_DescDepartamento']}</div>";

                $codDepto = $aDepto['T02_CodDepartamento'];
                $descDepto = $aDepto['T02_DescDepartamento'];
                $volNegocio = $aDepto['T02_VolumenDeNegocio'];
                
                $oSentenciaPreparada->execute();
            }

            $oConexionPDO->commit();
            echo '<div class="mensaje-transaccion exito">¡ÉXITO! Transacción completada y cambios guardados (COMMIT).</div>';

        } catch (PDOException $oExcepcionPDO) {
            $oConexionPDO->rollBack();
            echo '<div class="mensaje-transaccion error-tx">¡ERROR! Transacción fallida. Se han deshecho todos los cambios (ROLLBACK).<br><b>Detalle:</b> ' . $oExcepcionPDO->getMessage() . '</div>';
        } finally {
            unset($oConexionPDO);
        }

        // --- Bloque para mostrar la tabla de departamentos existentes (se ejecuta siempre) ---
        echo "<h2>Listado Actual de Departamentos</h2>";
        try {
            $oConexionPDO = new PDO(DSN, USERNAME, PASSWORD);
            $sConsultaSQL = "SELECT * FROM T02_Departamento ORDER BY T02_CodDepartamento";
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
<?php
class ControlRepresentVisual_Indicador
{
    var $objFuente_Indicador;
    function __construct($objFuente_Indicador)
    {
        $this->objFuente_Indicador = $objFuente_Indicador;
    }

|
    function guardar()
    {
        $fkidfuente = this->objFuente_Indicador->getFkidFuente();
        $fkidindicador = this->objRepresentVisual_Indicador->getFkindicador();

        $comandoSql = "INSERT INTO fuente_indicador(fkidfuente,fkidindicador) VALUES ( '$fkidfuente','$fkidindicador')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $fkidfuente = $this->objFuente_Indicador->getFkidfuente();
        $comandoSql = "SELECT * FROM fuente_indicador WHERE fkidfuente = '$fkidfuente'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objFuente_Indicador->setfkidfuente($row['fuente']);
        }
        $objControlConexion->cerrarBd();
        return $this->objFuente_Indicador;
    }

    function modificar()
    {
        $fkidfuente = this->objFuente_Indicador->getFkidfuente();
        $fkidindicador; = this->objFuente_Indicador->getFkidindicador();

        $comandoSql = "UPDATE variable SET fkidindicador='$fkidindicador',fkidfuente='$fkidfuente' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $fkidfuente = this->objFuente_Indicador->getFkidfuente();
        $comandoSql = "DELETE FROM fuente_indicador WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM fuente_indicador";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        
        $arregloFuente_Indicador = array();
        
        if (mysqli_num_rows($recordSet) > 0) {
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objFuente_Indicador = new RepresentVisual_Indicador("", "");
                $objFuente_Indicador->setFkidfuente($row['fkidfuente']);
                $objFuente_Indicador->setFkidindicador($row['fkidindicador']);
                $arregloFuente_Indicador[$i] = $objFuente_Indicador;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloFuente_Indicador;
    }
}
?>

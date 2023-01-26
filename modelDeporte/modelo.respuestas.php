<?php
require_once('conexionDeporte.php');

class mdlRespuestas extends Conexion
{

   public function subirRespuestas($nombre, $apellido, $cuil, $telefono, $sangre, $peso, $talle, $uno, $dos, $tres, $cuatro, $cinco, $seis, $siete, $ocho, $nueve, $diez, $once, $doce, $trece, $catorce, $quince, $nombre_tutor, $dni_tutor, $telEmergencia, $centro_asistencial, $archivo)
    {
        $sql = "INSERT INTO resultado (nombre, apellido, cuil, telefono, sangre, peso, talle, 
        uno, dos, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once, doce, trece, catorce, quince, 
        nombre_tutor, dni_tutor, telEmergencia, centro_asistencial, archivo)
        VALUES ('$nombre', '$apellido', '$cuil', '$telefono', '$sangre', '$peso', '$talle', 
        '$uno', '$dos', '$tres', '$cuatro', '$cinco', '$seis', '$siete', '$ocho', '$nueve', '$diez', '$once', '$doce', '$trece', '$catorce', '$quince',
        '$nombre_tutor', '$dni_tutor', '$telEmergencia', '$centro_asistencial', '$archivo')";
        // return $sql;
        try {
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function mostrarRespuestas()
    {
        $sql = "SELECT nombre, apellido, cuil, telefono, sangre, peso, talle, uno, dos, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once, doce, trece, catorce, quince, nombre_tutor, telEmergencia, archivo FROM resultado";
        $resultado = $this->conexion->query($sql);
        $listaRespuestas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaRespuestas;
    }

    
}

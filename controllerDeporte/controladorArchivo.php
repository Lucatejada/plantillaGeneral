
<?php
session_start();
class controladorArchivo
{
    
    public static function ctrRespuestas()
    {
        require_once("../modelDeporte/modelo.respuestas.php");
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cuil = $_POST['cuil'];
        $telefono = $_POST["telefono"];
        $sangre = $_POST["sangre"];
        $peso = $_POST["peso"];
        $talle = $_POST["talle"];
        $uno = $_POST["uno"];
        $dos = $_POST["dos"];
        $tres = $_POST["tres"];
        $cuatro = $_POST["cuatro"];
        $cinco = $_POST["cinco"];
        $seis = $_POST["seis"];
        $siete = $_POST["siete"];
        $ocho = $_POST["ocho"];
        $nueve = $_POST["nueve"];
        $diez = $_POST["diez"];
        $once = $_POST["once"];
        // $doce = $_POST["12"];
        $trece = $_POST["trece"];
        $catorce = $_POST["catorce"];
        $quince = $_POST["quince"];
        $nombre_tutor = $_POST["nombre_tutor"];
        $dni_tutor = $_POST["dni_tutor"];
        $telEmergencia = $_POST["telEmergencia"];
        $centro_asistencial = $_POST["centro_asistencial"];


        if ($uno == "si") {
            $respuesta1 = "si ";
        } else {
            $respuesta1 = "no ";
        }

        if ($dos == "si") {
            $respuesta2 = "si ";
        } else {
            $respuesta2 = "no ";
        }

        if ($tres == "si") {
            $respuesta3 = "si ";
        } else {
            $respuesta3 = "no ";
        }

        if ($cuatro == "si") {
            $respuesta4 = "si ";
        } else {
            $respuesta4 = "no ";
        }

        $respuesta5 = "";
        $respuesta6 = "";
        $respuesta7 = "";
        $respuesta8 = "";
        $respuesta9 = "";
        $respuesta10 = "";
        $respuesta11 = "";
        $respuesta12 = "";
        $respuesta13 = "";
        $respuesta14 = "";
        $respuesta15 = "";


        foreach ($cinco as $respuesta) {
            $respuesta5 .= $respuesta . " - ";
        }
        foreach ($seis as $respuesta) {
            $respuesta6 .= $respuesta . " - ";
        }
        foreach ($siete as $respuesta) {
            $respuesta7 .= $respuesta . " - ";
        }
        foreach ($ocho as $respuesta) {
            $respuesta8 .= $respuesta . " - ";
        }
        foreach ($nueve as $respuesta) {
            $respuesta9 .= $respuesta . " - ";
        }
        foreach ($diez as $respuesta) {
            $respuesta10 .= $respuesta . " - ";
        }
        foreach ($once as $respuesta) {
            $respuesta11 .= $respuesta . " -  ";
        }
        // foreach ($doce as $respuesta) {
        //     $respuesta .= $respuesta . ", ";
        // }
        foreach ($trece as $respuesta) {
            $respuesta13 .= $respuesta . " - ";
        }
        foreach ($catorce as $respuesta) {
            $respuesta14 .= $respuesta . "  - ";
        }
        foreach ($quince as $respuesta) {
            $respuesta15 .= $respuesta . "  - ";
        }


        // // print_r($_FILES['archivo']);
        $nombre = $_FILES['archivo']['name'];
        $guardado = $_FILES['archivo']['tmp_name'];

        if (!file_exists('archivos')) {
            mkdir('archivos', 0777, true);
            if (file_exists('archivos')) {
                if (move_uploaded_file($guardado, '../../archivos/' . $nombre)) {
                    echo "Archivo guardado exitosamente";
                } else {
                    echo "Archivo no guardado ";
                }
            }
        } else {
            if (move_uploaded_file($guardado, '../../archivos/' . $nombre)) {
                echo "Archivo guardado exitosamente";
            } else {
                echo "Archivo no guardado ";
            }
        }

        $mdlRespuestas = new mdlRespuestas();
        if ($mdlRespuestas->subirRespuestas(
            $nombre,
            $apellido,
            $cuil,
            $telefono,
            $sangre,
            $peso,
            $talle,
            $respuesta1,
            $respuesta2,
            $respuesta3,
            $respuesta4,
            $respuesta5,
            $respuesta6,
            $respuesta7,
            $respuesta8,
            $respuesta9,
            $respuesta10,
            $respuesta11,
            $respuesta12,
            $respuesta13,
            $respuesta14,
            $respuesta15,
            $nombre_tutor,
            $dni_tutor,
            $telEmergencia,
            $centro_asistencial, 
            $archivo
        )) {
            session_start();
            $_SESSION['formEnviado'] = true;
            header("Location: ../index.php?c=DistritosController&a=index");
        } else {
            session_start();
            $_SESSION['formError'] = true;
            header("Location: ../index.php?c=DistritosController&a=index");
        }
    }
}

?>
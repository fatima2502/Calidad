<?php


function buscar_historia($HC)
{
    include 'serv.php';
    $log = mysqli_query($conect,"SELECT * FROM historia_clinica WHERE hc_codigo='$HC' ");
    if(mysqli_num_rows($log)>0){
        $row = mysqli_fetch_array($log);
        $_SESSION["hc_codigo"] = $row['hc_codigo'];
        $_SESSION["hc_cod_pac"] = $row['hc_cod_pac'];
        $_SESSION["hc_peso"] = $row['hc_peso'];
        $_SESSION["hc_talla"] = $row['hc_talla'];
        $_SESSION["hc_alergia"] = $row['hc_alergia'];
        $_SESSION["hc_tipo_sangre"] = $row['hc_tipo_sangre'];
        $_SESSION["hc_adicional"] = $row['hc_adicional'];
        return 1;
    }
    return 0;
}

function buscar_historia_by_codpac($codpac)
{
    include 'serv.php';
    $log = mysqli_query($conect,"SELECT * FROM historia_clinica WHERE hc_cod_pac='$codpac' ");
    if(mysqli_num_rows($log)>0){
        $row = mysqli_fetch_array($log);
        $_SESSION["hc_codigo"] = $row['hc_codigo'];
        $_SESSION["hc_cod_pac"] = $row['hc_cod_pac'];
        $_SESSION["hc_peso"] = $row['hc_peso'];
        $_SESSION["hc_talla"] = $row['hc_talla'];
        $_SESSION["hc_alergia"] = $row['hc_alergia'];
        $_SESSION["hc_tipo_sangre"] = $row['hc_tipo_sangre'];
        $_SESSION["hc_adicional"] = $row['hc_adicional'];
        return 1;
    }
    return 0;
}

function buscar_paciente_by_dni($dni)
{
    include 'serv.php';
    $log = mysqli_query($conect,"SELECT * FROM paciente WHERE pa_DNI='$dni'");
    if(mysqli_num_rows($log)>0){
        $row = mysqli_fetch_array($log);
        $_SESSION["pa_codigo"] = $row['pa_codigo'];
        $_SESSION["pa_DNI"] = $row['pa_DNI'];
        return 1;
    }
    return 0;
}

function buscar_paciente($codigo)
{
    include 'serv.php';
    $log1 = mysqli_query($conect,"SELECT * FROM paciente WHERE pa_codigo='$codigo'");
    if(mysqli_num_rows($log1)>0){
        $row = mysqli_fetch_array($log1);
        $_SESSION["pa_DNI"] = $row['pa_DNI'];
        $_SESSION["pa_codigo"] = $row['pa_codigo'];
        return 1;
    }
    return 0;
}

function buscar_persona($DNI)
{
    include 'serv.php';
    $log2 = mysqli_query($conect,"SELECT * FROM persona WHERE p_DNI=$DNI ");
    if(mysqli_num_rows($log2)>0){
        $row = mysqli_fetch_array($log2);
        $_SESSION["p_nombre"] = $row['p_nombre'];
        $_SESSION["p_apellido"] = $row['p_apellido'];
        $_SESSION["p_genero"] = $row['p_genero'];
        $_SESSION["p_fecha_nac"] = $row['p_fecha_nac'];
        return 1;
    }
    return 0;
}   

function listar_resultados($nrohistoria)
{
    include 'serv.php';
    $log3 = mysqli_query($conect,"SELECT * FROM resultado WHERE res_cod_hc = '$nrohistoria' ORDER BY res_codigo ASC");
    $i=0;
    if(mysqli_num_rows($log3)>0){
     while($row = mysqli_fetch_array($log3) ){
        $_SESSION["res_codigo"][$i] = $row['res_codigo'];
        $_SESSION["res_diagnostico"][$i] = $row['res_diagnostico'];
        $_SESSION["res_sintomas"][$i] = $row['res_sintomas'];
        $_SESSION["res_cod_cita"][$i] = $row['res_cod_cita'];
        $i++;
    }
}
return $i;
}

function detalle_resultado($cod_res)
{
    include 'serv.php';
    $log4 = mysqli_query($conect,"SELECT * FROM resultado WHERE res_codigo = '$cod_res'");
    if(mysqli_num_rows($log4)>0){
        $row = mysqli_fetch_array($log4);
        $_SESSION["res_codigo"] = $row['res_codigo'];
        $_SESSION["res_diagnostico"] = $row['res_diagnostico'];
        $_SESSION["res_sintomas"] = $row['res_sintomas'];
        $_SESSION["res_cod_cita"] = $row['res_cod_cita'];
        return 1;
    }
    return 0;
}

function buscar_receta($cod_res)
{
    include 'serv.php';
    $log4 = mysqli_query($conect,"SELECT * FROM receta WHERE r_cod_res = '$cod_res'");
    if(mysqli_num_rows($log4)>0){
        $row = mysqli_fetch_array($log4);
        $_SESSION["r_codigo"] = $row['r_codigo'];
        $_SESSION["r_medicamento"] = $row['r_medicamento'];
        $_SESSION["r_dosis"] = $row['r_dosis'];
        $_SESSION["r_cod_res"] = $row['r_cod_res'];
        return 1;
    }
    return 0;
}

function crear_historia($DNI,$nombre,$apellidos, $genero, $fecha, $direccion, $telefono)
{
    include 'serv.php';
    $log = mysqli_query($conect,"INSERT INTO persona (p_DNI, p_nombre, p_apellido, p_genero, p_fecha_nac, p_direccion, p_telefono, p_estado)
        VALUES ($DNI, '$nombre', '$apellidos', '$genero', '$fecha', '$direccion', $telefono, 'Activo')");
    if($log>0){
        $log1 = mysqli_query($conect,"INSERT INTO paciente (pa_codigo,pa_DNI) VALUES ('PA',$DNI)");
        $log2 = mysqli_query($conect,"SELECT pa_codigo FROM paciente WHERE pa_DNI=$DNI");
        if(mysqli_num_rows($log2)>0){
            $row = mysqli_fetch_array($log2);
            $codigo = $row['pa_codigo'];
        }
        if($log1>0){
            $log3 = mysqli_query($conect,"INSERT INTO historia_clinica (hc_cod_pac) VALUES ($codigo)");
            if($log3>0){
                return 1;
            }
        }
        return 0;
    }
    return 0;
}

function listar_citas($dni,$estado)
{
    include 'serv.php';
    $log = mysqli_query($conect,"SELECT * FROM paciente WHERE pa_DNI= $dni");
    $i=0;
    if(mysqli_num_rows($log)>0){
        $row = mysqli_fetch_array($log);
        $codigo=$row['pa_codigo'];
        $log1 = mysqli_query($conect,"SELECT * FROM cita WHERE c_cod_pac = '$codigo' and c_estado='$estado'");
        if(mysqli_num_rows($log1)>0){
            while($row = mysqli_fetch_array($log1) ){
                $_SESSION["pa_dni"][$i] = $dni;
                $_SESSION["c_estado"][$i] = $row['c_estado'];
                $_SESSION["c_fecha"][$i] = $row['c_fecha'];
                $_SESSION["c_hora"][$i] = $row['c_hora'];
                $log2 = mysqli_query($conect,"SELECT * FROM historia_clinica WHERE hc_cod_pac='$codigo' ");
                if(mysqli_num_rows($log2)>0){
                    $row = mysqli_fetch_array($log2);
                    $_SESSION["hc_codigo"][$i] = $row['hc_codigo'];
                }
                $log3 = mysqli_query($conect,"SELECT * FROM persona WHERE p_dni='$dni' ");
                if(mysqli_num_rows($log3)>0){
                    $row = mysqli_fetch_array($log3);
                    $_SESSION["p_nombre"][$i] = $row['p_nombre'];
                    $_SESSION["p_apellido"][$i] = $row['p_apellido'];
                }
                $i++;
            }
        }
        return $i;
    }
    return $i;
}

function listar_citas_by_dni($dni)
{
    include 'serv.php';
    $log = mysqli_query($conect,"SELECT * FROM paciente WHERE pa_DNI= $dni");
    $i=0;
    if(mysqli_num_rows($log)>0){
        $row = mysqli_fetch_array($log);
        $codigo=$row['pa_codigo'];
        $log1 = mysqli_query($conect,"SELECT * FROM cita WHERE c_cod_pac = '$codigo' ");
        if(mysqli_num_rows($log1)>0){
            while($row = mysqli_fetch_array($log1) ){
                $_SESSION["pa_dni"][$i] = $dni;
                $_SESSION["c_estado"][$i] = $row['c_estado'];
                $_SESSION["c_fecha"][$i] = $row['c_fecha'];
                $_SESSION["c_hora"][$i] = $row['c_hora'];
                $log2 = mysqli_query($conect,"SELECT hc_codigo FROM historia_clinica WHERE hc_cod_pac='$codigo' ");
                if(mysqli_num_rows($log2)>0){
                    $row = mysqli_fetch_array($log2);
                    $_SESSION["hc_codigo"][$i] = $row['hc_codigo'];
                }
                $log3 = mysqli_query($conect,"SELECT p_nombre,p_apellido FROM persona WHERE p_dni='$dni' ");
                if(mysqli_num_rows($log3)>0){
                    $row = mysqli_fetch_array($log3);
                    $_SESSION["p_nombre"][$i] = $row['p_nombre'];
                    $_SESSION["p_apellido"][$i] = $row['p_apellido'];
                }
                $i++;
            }
        }
        return $i;
    }
    return $i;
}

function listar_citas_by_estado($estado)
{
    include 'serv.php';
    $i=0;
    $log1 = mysqli_query($conect,"SELECT * FROM cita WHERE c_estado='$estado' ");
    if(mysqli_num_rows($log1)>0){
        while($row = mysqli_fetch_array($log1) ){
            $_SESSION["c_cod_pac"][$i] = $row['c_cod_pac'];
            $_SESSION["c_estado"][$i] = $row['c_estado'];
            $_SESSION["c_fecha"][$i] = $row['c_fecha'];
            $_SESSION["c_hora"][$i] = $row['c_hora'];
            $codigo=$_SESSION["c_cod_pac"][$i];
            $log2 = mysqli_query($conect,"SELECT hc_codigo FROM historia_clinica WHERE hc_cod_pac='$codigo' ");
            if(mysqli_num_rows($log2)>0){
                $row = mysqli_fetch_array($log2);
                $_SESSION["hc_codigo"][$i] = $row['hc_codigo'];
            }
            $log3 = mysqli_query($conect,"SELECT pa_DNI FROM paciente WHERE pa_codigo='$codigo' ");
            if(mysqli_num_rows($log3)>0){
                $row = mysqli_fetch_array($log3);
                $_SESSION["pa_dni"][$i] = $row['pa_DNI'];
                $dni=$_SESSION["pa_dni"][$i];
            }
            $log4 = mysqli_query($conect,"SELECT p_nombre,p_apellido FROM persona WHERE p_dni='$dni' ");
            if(mysqli_num_rows($log4)>0){
                $row = mysqli_fetch_array($log4);
                $_SESSION["p_nombre"][$i] = $row['p_nombre'];
                $_SESSION["p_apellido"][$i] = $row['p_apellido'];
            }
            $i++;
        }
    }
    return $i;
}

?>
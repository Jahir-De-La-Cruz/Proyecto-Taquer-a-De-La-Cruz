<?php

    //Incluir la conexión a la base de datos
    include 'conexion.php';

    //Declarar las variables
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $detalle = $_POST['detalle'];
    $fecha = date("d/m/y");

    //Verificar que no exista el correo o numero mas de una vez
    $verificar_solicitud = mysqli_query($conexion, "SELECT * FROM solicitudes_empleo WHERE Correo = '$correo' 
    AND Telefono = '$telefono' ");
    if (mysqli_num_rows($verificar_solicitud) > 0) {
        echo '<script>
                alert("Este correo y/o numero, ya estan siendo revisados, intente de nuevo");
                window.location = "../solicitud.php";
            </script>';
        exit();
    }

    //Consulta para insertar registros
    $consulta = "INSERT INTO solicitudes_empleo (Nombres, Apellidos, Telefono, Correo, Direccion, Detalle, Fecha) 
    VALUES ('$nombres','$apellidos','$telefono','$correo','$direccion','$detalle','$fecha')";

    //Comprobar que funcione correctamente mediante la variable resultado
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
      echo '<script> window.location = "/Taqueria-De-La-Cruz/paginas/solicitud.php"; </script>';
    } else {
      $error_message = "Ocurrió un error al enviar la solicitud.";
      echo '<script> 
              var errorMessage = "' . $error_message . '";
            </script>';
      echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    }

?>
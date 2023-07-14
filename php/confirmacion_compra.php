<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluir la conexión a la base de datos
    include 'conexion.php';

    // Verificar si los datos requeridos se enviaron correctamente
    if (isset($_POST['nombre'], $_POST['direccion'], $_POST['metodo_pago'], $_POST['producto'], $_POST['precio'])) {
        // Obtener los valores del formulario
        $Nombre = $_POST['nombre'];
        $Direccion = $_POST['direccion'];
        $Metodo_Pago = $_POST['metodo_pago'];
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $Fecha_compra = date("d/m/y");

        // Consulta preparada para insertar los registros en la base de datos
        $consulta = "INSERT INTO compra_de_productos (Nombre, Direccion, Metodo_pago, Producto, Costo, Fecha_compra)
                     VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = mysqli_prepare($conexion, $consulta);

        // Vincular los parámetros a la consulta
        mysqli_stmt_bind_param($stmt, "ssssss", $Nombre, $Direccion, $Metodo_Pago, $producto, $precio, $Fecha_compra);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Verificar si la consulta se ejecutó correctamente
        $filasAfectadas = mysqli_stmt_affected_rows($stmt);
        if ($filasAfectadas > 0) {
            // Los registros se insertaron correctamente
            echo '<script> window.location = "/Taqueria-De-La-Cruz/paginas/ver-menu.html"; </script>';
        } else {
            // No se pudo insertar el registro
            $error_message = "Ocurrió un problema al procesar el pedido, intenta de nuevo.";
            echo '<script> 
                    var errorMessage = "' . $error_message . '";
                  </script>';
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);
        } else {
            // Los datos requeridos no se enviaron correctamente
            echo "Falta uno o más campos obligatorios en el formulario.";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
        } else {
            // Redirigir al formulario si no se recibió una solicitud POST
            // header("Location: ../paginas/ver-menu.html");
            exit();
        }

    print_r($_POST);

?>

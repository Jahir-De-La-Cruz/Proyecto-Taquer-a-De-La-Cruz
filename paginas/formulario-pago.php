<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por comprar en TaqueríaDLC, en unos momentos se te entregara tu producto</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/formularios.css?v1234567">
    <link rel="shortcut icon" href="../img/logo-taqueria.png" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    
    <header>
        <div class="container">
            <div class="logo">
                <img src="../img/logo-taqueria.png" alt="logo" class="logo-img">
                <h2 class="logo-title">Taquería De La Cruz</h2>
            </div>
        </div>
    </header>

    <?php
        // Obtener los valores de producto y precio desde el formulario POST
        $producto = $_POST['producto'] ?? '';
        $precio = $_POST['precio'] ?? '';
    ?>

    <section class="formulario">
        <div class="formulario-titulo">
            <h2>Confirmación de tu Compra</h2>
            <h3>(Por el momento solo aceptamos efectivo)</h3>
        </div>
        <div class="formulario-contenedor">
            <form id="formulario-compra" action="../php/confirmacion_compra.php" method="POST" autocomplete="off">
                <img src="../img/logo-didi-food.png" alt="DiDi-Food" class="img-repartidor">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <input type="text" name="metodo_pago" placeholder="Método de Pago" required>
                <label class="titulo-compra">Detalle de la Compra</label>
                <label class="labels">Producto:</label>
                <input type="text" name="producto" value="<?php echo htmlspecialchars($producto); ?>" required>
                <label class="labels">Precio:</label>
                <input type="text" name="precio" value="<?php echo htmlspecialchars($precio); ?> pesos" required>
                <input type="submit" value="Comprar" class="btnEnviar">
            </form>
        </div>
    </section>

    <footer>
        <div class="contenedor-footer">
            <div class="footer-titulo">
                <h2>Taquería De La Cruz</h2>
            </div>
            <div class="footer-contacto">
                <h2>Contacto</h2>
                <p>Teléfono: (123) 456-7890</p>
                <p>Email: taqueriadlc@gmail.com</p>
                <p>Dirección: 123 Calle Principal, México</p>
              </div>
            <div class="enlaces-frecuentes">
                <h2>Enlaces Frecuentes</h2>
                <ul>
                    <li><a href="#">Política de privacidad</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Aviso legal</a></li>
                </ul>
            </div>
            <div class="redes-sociales">
                <h2>Redes Sociales</h2>
                <a class="fab fa-facebook-f footer__icon" href="#"></a>
                <a class="fab fa-instagram footer__icon" href="#"></a>
                <a class="fab fa-twitter footer__icon" href="#"></a>
            </div>
        </div>
        <span></span>
        <h3 class="end-title">&copy;TaqueríaDLC | Todos los derechos reservados</h3>
    </footer>

    <!-- <script>
        document.getElementById("formulario-compra").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

            // Aquí puedes agregar tu lógica de validación del formulario antes de mostrar el SweetAlert

            Swal.fire({
            title: "¡Gracias por tu compra!",
            text: "tu producto llegará entre 20-30 minutos.",
            confirmButtonText: 'OK',
            icon: "success"
            }).then(function() {
            // Aquí puedes redirigir al usuario a otra página o realizar otras acciones después de que se muestre el SweetAlert
            document.getElementById("formulario-compra").submit();
            // window.location.href = "/Taqueria-De-La-Cruz/paginas/ver-menu.html" // Envía el formulario después de mostrar el SweetAlert
            });
        });
    </script> -->
    <script>
        document.getElementById("formulario-compra").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

            // Aquí puedes agregar tu lógica de validación del formulario antes de mostrar el SweetAlert

            if (typeof errorMessage !== 'undefined') {
                Swal.fire({
                    title: "Error",
                    text: errorMessage,
                    confirmButtonText: "OK",
                    icon: "error"
                });
            } else {
                Swal.fire({
                    title: "¡Gracias por tu compra!",
                    text: "tu producto llegará entre 15 y 30 minutos.",
                    confirmButtonText: 'OK',
                    icon: "success"
                }).then(function() {
                    // Aquí puedes redirigir al usuario a otra página o realizar otras acciones después de que se muestre el SweetAlert
                    document.getElementById("formulario-compra").submit();
                    // window.location.href = "/ruta-a-otra-pagina.html"; // Redirige al usuario a otra página después de mostrar el SweetAlert
                });
            }
        });
    </script>

</body>
</html>
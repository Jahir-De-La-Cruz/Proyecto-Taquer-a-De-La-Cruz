<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Empleo</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <nav>
                <ul class="links">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="ver-menu.html">Ver Menu</a></li>
                    <li><a href="bebidas.html">Bebidas</a></li>
                    <li><a href="solicitud.php">Solicitud de Empleo</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="formulario">
        <div class="formulario-titulo">
            <h2>Quieres trabajo? Tenemos vacantes disponibles!</h2>
        </div>
        <div class="formulario-contenedor">
            <form action="../php/solicitud_empleo.php" method="POST" autocomplete="off" id="formulario-solicitud">
                <img src="../img/logo-taqueria.png" alt="logo-negocio" class="img-negocio">
                <input type="text" name="nombres" placeholder="Nombres" required>
                <input type="text" name="apellidos" placeholder="Apellidos" required>
                <input type="tel" name="telefono" placeholder="Télefono" required>
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <textarea name="detalle" placeholder="Porque desea un puesto?" required></textarea>
                <input type="submit" value="Enviar" class="btnEnviar">
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
        document.getElementById("formulario-solicitud").addEventListener("submit", function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

            // Aquí puedes agregar tu lógica de validación del formulario antes de mostrar el SweetAlert

            Swal.fire({
                title: "¡Gracias por enviar tu solicitud!",
                text: "Nos pondremos en contacto contigo pronto.",
                confirmButtonText: 'OK',
                icon: "success"
            }).then(function() {
                // Aquí puedes redirigir al usuario a otra página o realizar otras acciones después de que se muestre el SweetAlert
                document.getElementById("formulario-solicitud").submit();
                // window.location.href = "/ruta-a-otra-pagina.html"; // Redirige al usuario a otra página después de mostrar el SweetAlert
            });
        });
    </script> -->
    <script>
        document.getElementById("formulario-solicitud").addEventListener("submit", function(event) {
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
                    title: "¡Gracias por enviar tu solicitud!",
                    text: "Nos pondremos en contacto contigo pronto.",
                    confirmButtonText: 'OK',
                    icon: "success"
                }).then(function() {
                    // Aquí puedes redirigir al usuario a otra página o realizar otras acciones después de que se muestre el SweetAlert
                    document.getElementById("formulario-solicitud").submit();
                    // window.location.href = "/ruta-a-otra-pagina.html"; // Redirige al usuario a otra página después de mostrar el SweetAlert
                });
            }
        });
    </script>

</body>
</html>
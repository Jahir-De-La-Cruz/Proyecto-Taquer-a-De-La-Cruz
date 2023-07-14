// Obtener referencia al contenedor de productos
const contenedorProductos = document.getElementById('contenedor-productos');

// Obtener todos los botones de productos
const botonesProductos = contenedorProductos.getElementsByClassName('btnComprar');

// Agregar evento de clic a cada botón de producto
Array.from(botonesProductos).forEach(boton => {
  boton.addEventListener('click', function () {
    // Obtener el nombre del producto y su precio
    const nombreProducto = this.getAttribute('data-nombre');
    const precioProducto = this.getAttribute('data-precio');

    // Mostrar el mensaje de confirmación con SweetAlert
    Swal.fire({
      title: `<span class="swal-custom-title">¿Deseas comprar ${nombreProducto} por $${precioProducto} pesos?</span>`,
      showCancelButton: true,
      confirmButtonText: 'Comprar',
      cancelButtonText: 'Cancelar',
      icon: 'question',
      customClass: {
        popup: 'swal-custom-popup',
        confirmButton: 'swal-custom-button',
        cancelButton: 'swal-custom-button'
      },
      buttonsStyling: false,
      confirmButtonClass: 'swal-custom-confirm-button',
      cancelButtonClass: 'swal-custom-cancel-button'
    }).then((result) => {
      if (result.isConfirmed) {
        // Construir la URL de redirección
        const urlRedireccion = "/Taqueria-De-La-Cruz/paginas/formulario-pago.php";

        // Crear un formulario dinámico
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = urlRedireccion;
        document.body.appendChild(form);

        // Agregar los parámetros de producto y precio como campos ocultos
        const inputProducto = document.createElement('input');
        inputProducto.type = 'text';
        inputProducto.name = 'producto';
        inputProducto.value = nombreProducto;
        form.appendChild(inputProducto);

        const inputPrecio = document.createElement('input');
        inputPrecio.type = 'text';
        inputPrecio.name = 'precio';
        inputPrecio.value = precioProducto;
        form.appendChild(inputPrecio);

        // Enviar el formulario
        form.submit();
      }
    });
  });
});

// Obtener referencia al formulario de confirmación
const formulario = document.getElementById('formulario-compra');

// Agregar evento de envío al formulario
formulario.addEventListener('submit', function (event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtener el nombre del producto y su precio
  const nombreProducto = document.getElementById('producto').value;
  const precioProducto = document.getElementById('precio').value;

  // Actualizar los valores de los campos ocultos
  const inputProducto = document.getElementById('producto');
  const inputPrecio = document.getElementById('precio');
  inputProducto.value = nombreProducto;
  inputPrecio.value = precioProducto;

  // Enviar el formulario por POST
  this.method = 'POST';
  this.submit();
});
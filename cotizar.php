<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recoge los datos y límpialos
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $tipo_cancha = htmlspecialchars(trim($_POST['tipo_cancha']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));
    
    // Valida que no esté vacío
    if(empty($nombre) || empty($telefono) || empty($tipo_cancha)) {
        die("Por favor completa todos los campos obligatorios.");
    }
    
    // TU CORREO - ya lo tienes puesto
    $para = "johan.zambrano.ti@gmail.com";
    
    $asunto = "Nueva Cotización - MallasPro";
    
    // Cuerpo del correo
    $cuerpo = "Tienes una nueva solicitud de cotización:\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Teléfono/WhatsApp: $telefono\n";
    $cuerpo .= "Tipo de Cancha: $tipo_cancha\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";
    
    // Headers
    $headers = "From: no-reply@mallaspro.com\r\n";
    $headers .= "Reply-To: $telefono\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Envía el correo
    if(mail($para, $asunto, $cuerpo, $headers)) {
        echo "<script>
                alert('¡Cotización enviada! Te contactaremos en menos de 24 horas.');
                window.location.href='index.php#cotizador';
              </script>";
    } else {
        echo "<script>
                alert('Hubo un error al enviar. Intenta de nuevo.');
                window.location.href='index.php#cotizador';
              </script>";
    }
    
} else {
    header("Location: index.php");
    exit();
}
?>
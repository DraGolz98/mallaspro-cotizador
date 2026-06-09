<?php
session_start();
$conn = new mysqli("localhost", "root", "", "mallas_db");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$upload_dir = "img/";

// LOGIN SIMPLE
if (!isset($_SESSION['admin'])) {
    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($user === 'admin' && $pass === 'admin123') {
            $_SESSION['admin'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error = "Usuario o contraseña incorrectos";
        }
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
        <style>
            body {font-family: Arial; background: #0f172a; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;}
            .login-box {background: white; padding: 40px; border-radius: 12px; width: 350px;}
            h2 {text-align: center; margin-bottom: 30px;}
            input {width: 100%; padding: 12px; margin-bottom: 15px; border: 2px solid #e2e8f0; border-radius: 8px; box-sizing: border-box;}
            button {width: 100%; padding: 12px; background: #22c55e; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer;}
            .error {background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 8px; margin-bottom: 15px; text-align: center;}
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>Admin Panel</h2>
            <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
            <form method="POST">
                <input type="text" name="user" placeholder="Usuario" required>
                <input type="password" name="pass" placeholder="Contraseña" required>
                <button type="submit" name="login">Entrar</button>
            </form>
            <p style="text-align:center; color:#64748b; font-size:0.9rem; margin-top:20px;">
                Usuario: admin<br>Contraseña: admin123
            </p>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// CERRAR SESIÓN
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

// ELIMINAR REGISTRO
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $tabla = $_GET['tabla'];
    $conn->query("DELETE FROM $tabla WHERE id=$id");
    header("Location: admin.php");
    exit;
}

// FUNCIÓN PARA SUBIR IMAGEN
function subirImagen($file, $prefix) {
    global $upload_dir;
    if ($file['error'] == 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nombre = time() . '_' . $prefix . '.' . $ext;
        $ruta = $upload_dir . $nombre;
        if (move_uploaded_file($file['tmp_name'], $ruta)) {
            return $nombre;
        }
    }
    return null;
}

// EDITAR REGISTRO
if (isset($_POST['update'])) {
    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    
    if ($tabla == 'mallas_deportivas') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio_m2'];
        $calibre = $_POST['calibre'];
        $hueco = $_POST['hueco'];
        $conn->query("UPDATE mallas_deportivas SET nombre='$nombre', precio_m2='$precio', calibre='$calibre', hueco='$hueco' WHERE id=$id");
    }
    
    if ($tabla == 'trabajos') {
        $titulo = $_POST['titulo'];
        
        // Subir imagen antes si se seleccionó una nueva
        if (!empty($_FILES['img_antes_file']['name'])) {
            $img_antes = subirImagen($_FILES['img_antes_file'], 'antes');
        } else {
            $img_antes = $_POST['img_antes_old'];
        }
        
        // Subir imagen después si se seleccionó una nueva
        if (!empty($_FILES['img_despues_file']['name'])) {
            $img_despues = subirImagen($_FILES['img_despues_file'], 'despues');
        } else {
            $img_despues = $_POST['img_despues_old'];
        }
        
        $conn->query("UPDATE trabajos SET titulo='$titulo', img_antes='$img_antes', img_despues='$img_despues' WHERE id=$id");
    }
    
    header("Location: admin.php");
    exit;
}

// AGREGAR REGISTRO
if (isset($_POST['add'])) {
    $tabla = $_POST['tabla'];
    
    if ($tabla == 'mallas_deportivas') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio_m2'];
        $calibre = $_POST['calibre'];
        $hueco = $_POST['hueco'];
        $conn->query("INSERT INTO mallas_deportivas (nombre, precio_m2, calibre, hueco) VALUES ('$nombre', '$precio', '$calibre', '$hueco')");
    }
    
    if ($tabla == 'trabajos') {
        $titulo = $_POST['titulo'];
        $img_antes = subirImagen($_FILES['img_antes_file'], 'antes');
        $img_despues = subirImagen($_FILES['img_despues_file'], 'despues');
        $conn->query("INSERT INTO trabajos (titulo, img_antes, img_despues) VALUES ('$titulo', '$img_antes', '$img_despues')");
    }
    
    header("Location: admin.php");
    exit;
}

$mallas = $conn->query("SELECT * FROM mallas_deportivas ORDER BY id DESC");
$trabajos = $conn->query("SELECT * FROM trabajos ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Mallas Deportivas</title>
    <style>
        * {margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif;}
        body {background: #f1f5f9; padding: 20px;}
        .header {background: #0f172a; color: white; padding: 20px; border-radius: 12px; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;}
        .header a {color: white; text-decoration: none; background: #dc2626; padding: 10px 20px; border-radius: 8px;}
        .section {background: white; padding: 30px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);}
        h2 {margin-bottom: 20px; color: #0f172a;}
        table {width: 100%; border-collapse: collapse;}
        th {background: #0f172a; color: white; padding: 15px; text-align: left;}
        td {padding: 15px; border-bottom: 1px solid #e2e8f0; vertical-align: middle;}
        input, select {width: 100%; padding: 10px; border: 2px solid #e2e8f0; border-radius: 8px;}
        input[type="file"] {padding: 8px;}
        .btn {padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;}
        .btn-add {background: #22c55e; color: white;}
        .btn-edit {background: #3b82f6; color: white; text-decoration: none; padding: 8px 15px; border-radius: 6px; display: inline-block;}
        .btn-delete {background: #dc2626; color: white; text-decoration: none; padding: 8px 15px; border-radius: 6px; display: inline-block;}
        .form-row {display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;}
        .edit-form {background: #f0fdf4; padding: 20px; border-radius: 8px; margin-top: 10px; border: 2px solid #22c55e;}
        .btn-save {background: #22c55e; color: white; margin-right: 10px;}
        .btn-cancel {background: #64748b; color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px; display: inline-block;}
        .thumb {width: 80px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;}
        label {font-size: 0.85rem; color: #64748b; margin-bottom: 5px; display: block;}
    </style>
</head>
<body>
    <div class="header">
        <h1>Panel de Administración</h1>
        <a href="?logout=1">Cerrar Sesión</a>
    </div>

    <!-- GESTIONAR MALLAS -->
    <div class="section">
        <h2>Gestionar Mallas Deportivas</h2>
        
        <form method="POST" style="margin-bottom: 30px;">
            <input type="hidden" name="tabla" value="mallas_deportivas">
            <div class="form-row">
                <input type="text" name="nombre" placeholder="Nombre de la malla" required>
                <input type="number" name="precio_m2" placeholder="Precio por m²" required>
                <input type="text" name="calibre" placeholder="Calibre" required>
                <input type="text" name="hueco" placeholder="Hueco" required>
            </div>
            <button type="submit" name="add" class="btn btn-add">Agregar Malla</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio/m²</th>
                    <th>Calibre</th>
                    <th>Hueco</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($m = $mallas->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $m['id']; ?></td>
                    <td><?php echo htmlspecialchars($m['nombre']); ?></td>
                    <td>$<?php echo number_format($m['precio_m2']); ?></td>
                    <td><?php echo $m['calibre']; ?></td>
                    <td><?php echo $m['hueco']; ?></td>
                    <td>
                        <a href="?edit=malla&id=<?php echo $m['id']; ?>" class="btn-edit">Editar</a>
                        <a href="?delete=<?php echo $m['id']; ?>&tabla=mallas_deportivas" class="btn-delete" onclick="return confirm('¿Eliminar esta malla?')">Eliminar</a>
                    </td>
                </tr>
                
                <?php if(isset($_GET['edit']) && $_GET['edit'] == 'malla' && $_GET['id'] == $m['id']): ?>
                <tr>
                    <td colspan="6">
                        <form method="POST" class="edit-form">
                            <input type="hidden" name="tabla" value="mallas_deportivas">
                            <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                            <div class="form-row">
                                <input type="text" name="nombre" value="<?php echo htmlspecialchars($m['nombre']); ?>" required>
                                <input type="number" name="precio_m2" value="<?php echo $m['precio_m2']; ?>" required>
                                <input type="text" name="calibre" value="<?php echo $m['calibre']; ?>" required>
                                <input type="text" name="hueco" value="<?php echo $m['hueco']; ?>" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-save">Guardar</button>
                            <a href="admin.php" class="btn-cancel">Cancelar</a>
                        </form>
                    </td>
                </tr>
                <?php endif; ?>
                
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- GESTIONAR TRABAJOS -->
    <div class="section">
        <h2>Gestionar Trabajos Realizados</h2>
        
        <!-- Formulario Agregar con subida de imágenes -->
        <form method="POST" enctype="multipart/form-data" style="margin-bottom: 30px;">
            <input type="hidden" name="tabla" value="trabajos">
            <div class="form-row">
                <input type="text" name="titulo" placeholder="Título del trabajo" required>
                <div>
                    <label>Imagen Antes</label>
                    <input type="file" name="img_antes_file" accept="image/*" required>
                </div>
                <div>
                    <label>Imagen Después</label>
                    <input type="file" name="img_despues_file" accept="image/*" required>
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-add">Agregar Trabajo</button>
        </form>

        <!-- Tabla -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen Antes</th>
                    <th>Imagen Después</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($t = $trabajos->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $t['id']; ?></td>
                    <td><?php echo htmlspecialchars($t['titulo']); ?></td>
                    
                    <td>
                        <img src="img/<?php echo $t['img_antes']; ?>" class="thumb" alt="Antes" onerror="this.style.display='none'">
                        <br><small><?php echo $t['img_antes']; ?></small>
                    </td>
                    
                    <td>
                        <img src="img/<?php echo $t['img_despues']; ?>" class="thumb" alt="Después" onerror="this.style.display='none'">
                        <br><small><?php echo $t['img_despues']; ?></small>
                    </td>
                    
                    <td>
                        <a href="?edit=trabajo&id=<?php echo $t['id']; ?>" class="btn-edit">Editar</a>
                        <a href="?delete=<?php echo $t['id']; ?>&tabla=trabajos" class="btn-delete" onclick="return confirm('¿Eliminar este trabajo?')">Eliminar</a>
                    </td>
                </tr>
                
                <!-- Formulario Editar con subida de imágenes -->
                <?php if(isset($_GET['edit']) && $_GET['edit'] == 'trabajo' && $_GET['id'] == $t['id']): ?>
                <tr>
                    <td colspan="5">
                        <form method="POST" enctype="multipart/form-data" class="edit-form">
                            <input type="hidden" name="tabla" value="trabajos">
                            <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
                            <input type="hidden" name="img_antes_old" value="<?php echo $t['img_antes']; ?>">
                            <input type="hidden" name="img_despues_old" value="<?php echo $t['img_despues']; ?>">
                            <div class="form-row">
                                <input type="text" name="titulo" value="<?php echo htmlspecialchars($t['titulo']); ?>" required>
                                <div>
                                    <label>Imagen Antes - Actual: <?php echo $t['img_antes']; ?></label>
                                    <input type="file" name="img_antes_file" accept="image/*">
                                </div>
                                <div>
                                    <label>Imagen Después - Actual: <?php echo $t['img_despues']; ?></label>
                                    <input type="file" name="img_despues_file" accept="image/*">
                                </div>
                            </div>
                            <button type="submit" name="update" class="btn btn-save">Guardar</button>
                            <a href="admin.php" class="btn-cancel">Cancelar</a>
                        </form>
                    </td>
                </tr>
                <?php endif; ?>
                
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
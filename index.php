<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MallasPro - Instalación de Mallas Deportivas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HEADER */
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            color: #0f172a;
        }

        .logo span {
            color: #22c55e;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #334155;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #22c55e;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            padding: 100px 0;
            overflow: hidden;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-text h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #cbd5e1;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: #22c55e;
            color: white;
        }

        .btn-primary:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .btn-outline:hover {
            background: white;
            color: #0f172a;
        }

        .hero-img {
            flex: 1;
            text-align: right;
        }

        .hero-img img {
            max-width: 100%;
            height: auto;
            max-height: 420px;
            mix-blend-mode: screen;
            opacity: 0.85;
            filter: drop-shadow(0 0 40px rgba(59, 130, 246, 0.5));
        }

        /* SECCIONES GENERALES */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #0f172a;
            margin-bottom: 15px;
        }

        .section-title p {
            color: #64748b;
            font-size: 1.1rem;
        }

        /* SERVICIOS */
        .servicios {
            background: white;
        }

        .servicios-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .servicio-card {
            padding: 40px 30px;
            border-radius: 16px;
            background: #f8fafc;
            transition: 0.3s;
            text-align: center;
            border: 2px solid transparent;
        }

        .servicio-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            border-color: #22c55e;
        }

        .servicio-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.5rem;
        }

        .servicio-card h3 {
            color: #0f172a;
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .servicio-card p {
            color: #64748b;
            line-height: 1.7;
        }

        /* TRABAJOS - ARREGLADO */
        #trabajos {
            background: #f8fafc;
        }

        .trabajos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .trabajo-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }

        .trabajo-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

   .trabajo-imgs {
    display: flex;
    flex-wrap: wrap; /* Esto hace que bajen a la siguiente línea */
    gap: 10px;
    padding: 15px;
    background: #f1f5f9;
}

.trabajo-imgs img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    background: white;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    padding: 5px;
    flex-shrink: 0; /* Evita que se encojan */
}

/* Responsive */
@media (max-width: 768px) {
    .trabajo-imgs img {
        width: 100px;
        height: 100px;
    }
}
        .trabajo-card:hover .trabajo-imgs img {
            transform: scale(1.03);
        }

        .trabajo-info {
            padding: 20px;
        }

        .trabajo-info h3 {
            color: #0f172a;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .trabajo-badge {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* COTIZADOR */
        .cotizador {
            background: white;
        }

        .cotizador-box {
            background: #f8fafc;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            max-width: 700px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #334155;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #22c55e;
        }

        /* CONTACTO */
        .contacto {
            background: #0f172a;
            color: white;
        }

        .contacto .section-title h2,
        .contacto .section-title p {
            color: white;
        }

        .contacto-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            text-align: center;
        }

        .contacto-card {
            padding: 30px;
        }

        .contacto-icon {
            width: 70px;
            height: 70px;
            background: #22c55e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
        }

        .contacto-card h3 {
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .contacto-card p,
        .contacto-card a {
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.3s;
        }

        .contacto-card a:hover {
            color: #22c55e;
        }

        /* FOOTER */
        footer {
            background: #020617;
            color: #64748b;
            text-align: center;
            padding: 25px 0;
            font-size: 0.9rem;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .servicios-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .contacto-grid {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                display: none;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }

            .trabajo-imgs {
                height: 140px;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <nav class="container">
            <div class="logo">Mallas<span>Pro</span></div>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#trabajos">Trabajos</a></li>
                <li><a href="#cotizador">Cotizar</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero" id="inicio">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>Instalación de Mallas Deportivas</h1>
                <p>Calidad profesional, instalación rápida, garantía real. Cotiza tu proyecto en 30 segundos.</p>
                <div class="hero-btns">
                    <a href="#cotizador" class="btn btn-primary">Cotizar Ahora</a>
                    <a href="#trabajos" class="btn btn-outline">Ver Trabajos</a>
                </div>
            </div>
            <div class="hero-img">
                <img src="img/sin-fondo.png" alt="Malla Deportiva">
            </div>
        </div>
    </section>

    <!-- SERVICIOS -->
    <section class="servicios" id="servicios">
        <div class="container">
            <div class="section-title">
                <h2>Nuestros Servicios</h2>
                <p>Soluciones completas para canchas deportivas</p>
            </div>
            <div class="servicios-grid">
                <div class="servicio-card">
                    <div class="servicio-icon">🏟️</div>
                    <h3>Cerramientos de Canchas Sintéticas</h3>
                    <p>Instalación de mallas de alta resistencia para delimitar y proteger tu cancha. Mallas nylon, polipropileno y galvanizadas con diferentes calibres y huecos.</p>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icon">🔧</div>
                    <h3>Estructura de Canchas</h3>
                    <p>Diseño y montaje de estructura metálica completa. Postes, tensores y anclajes con pintura electrostática anticorrosiva para máxima durabilidad.</p>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icon">🌱</div>
                    <h3>Grama Sintética</h3>
                    <p>Suministro e instalación de grama sintética deportiva de 40mm a 60mm. Drenaje eficiente, resistencia UV y superficie ideal para el juego.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TRABAJOS REALIZADOS - ARREGLADO -->
    <section id="trabajos">
        <div class="container">
            <div class="section-title">
                <h2>Trabajos Realizados</h2>
                <p>Algunos de nuestros proyectos recientes</p>
            </div>
            <div class="trabajos-grid">
                <?php
                $conn = new mysqli("localhost", "root", "", "mallas_db");
                if ($conn->connect_error) {
                    echo "<p style='text-align:center; color:#64748b;'>No hay trabajos para mostrar</p>";
                } else {
                    $trabajos = $conn->query("SELECT * FROM trabajos ORDER BY id DESC LIMIT 6");
                    if($trabajos->num_rows > 0){
                        while($t = $trabajos->fetch_assoc()):
                ?>
                <div class="trabajo-card">
                    <div class="trabajo-imgs">
                        <img src="img/<?php echo $t['img_antes']; ?>" alt="Antes" onerror="this.style.display='none'">
                        <img src="img/<?php echo $t['img_despues']; ?>" alt="Después" onerror="this.style.display='none'">
                    </div>
                    <div class="trabajo-info">
                        <h3><?php echo htmlspecialchars($t['titulo']); ?></h3>
                        <span class="trabajo-badge">Antes / Después</span>
                    </div>
                </div>
                <?php 
                        endwhile;
                    } else {
                        echo "<p style='text-align:center; color:#64748b;'>Aún no hay trabajos registrados</p>";
                    }
                    $conn->close();
                }
                ?>
            </div>
        </div>
    </section>

    <!-- COTIZADOR -->
    <section class="cotizador" id="cotizador">
        <div class="container">
            <div class="section-title">
                <h2>Cotiza tu Proyecto</h2>
                <p>Llena el formulario y te enviamos el precio en menos de 24 horas</p>
            </div>
            <div class="cotizador-box">
                <form action="cotizar.php" method="POST">
                    <div class="form-group">
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono / WhatsApp</label>
                        <input type="tel" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo de Cancha</label>
                        <select name="tipo_cancha" required>
                            <option value="">Selecciona</option>
                            <option value="Fútbol 5">Fútbol 5</option>
                            <option value="Fútbol 7">Fútbol 7</option>
                            <option value="Fútbol 11">Fútbol 11</option>
                            <option value="Tenis">Tenis</option>
                            <option value="Baloncesto">Baloncesto</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea name="mensaje" rows="4" placeholder="Cuéntanos más detalles de tu proyecto"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Cotización</button>
                </form>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="container">
            <div class="section-title">
                <h2>Contáctanos</h2>
                <p>Estamos listos para atenderte</p>
            </div>
            <div class="contacto-grid">
                <div class="contacto-card">
                    <div class="contacto-icon">📞</div>
                    <h3>Teléfono</h3>
                    <p><a href="tel:+573157888535">315 788 8535 </a></p>
                    <p><a href="tel:+573167532969"> 316 753 2969 </a></p>
                </div>
                <div class="contacto-card">
                    <div class="contacto-icon">📧</div>
                    <h3>Email</h3>
                    <p><a href="mailto:info@mallaspro.com">zambranodiazronald@gmail.com</a></p>
                    
                </div>
                <div class="contacto-card">
                    <div class="contacto-icon">📍</div>
                    <h3>Ubicación</h3>
                    <p>Cali, Colombia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <p>&copy; 2026 MallasPro. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
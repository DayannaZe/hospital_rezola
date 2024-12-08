<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Rezola</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Titan+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h1>HOSPITAL REZOLA</h1>

            <nav class="navbar">
                <a href="#" class="logo">Logo</a>
                <input type="checkbox" id="menu-toggle">
                <label for="menu-toggle" class="menu-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                <ul class="menu">
                    <li><a href="paciente/paciente.php">Registro</a></li>
                    <li><a href="especialidades/administracion.php">Administracion</a></li>
                    <li><a href="#">Ver Historial Médico</a></li>
                    <li><a href="horario/ver_horarios.php">Horarios</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="content">
            <h2>Bienvenido al Hospital Rezola</h2>
            <p>Cuidando de su salud con excelencia y compromiso</p>
        </div>
    </main>

    <video id="background-video" autoplay muted loop playsinline>

        <source src="video/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>

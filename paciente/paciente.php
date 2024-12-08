<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas - Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<style>
    body {
    background-image: url('imagenes/consultorio.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    font-family: 'Arial', sans-serif;
}

.background-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: -1;
}

.container {
    padding-top: 2rem;
    padding-bottom: 2rem;
}

.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border: none;
    border-radius: 15px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.card-body {
    padding: 2rem;
}

.btn {
    border-radius: 30px;
    padding: 0.5rem 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: scale(1.05);
}

h1, .lead {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

footer {
    margin-top: 3rem;
    padding: 1rem 0;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

@media (max-width: 768px) {
    .container {
        padding-top: 1rem;
    }

    h1 {
        font-size: 2rem;
    }

    .lead {
        font-size: 1rem;
    }
}


</style>
<body>
    <div class="background-overlay"></div>
    <div class="container">
        <header class="text-center py-5">
            <h1 class="display-4 text-white">Sistema de Citas Hospitalarias</h1>
            <p class="lead text-white">Gestión eficiente de pacientes y citas médicas</p>
        </header>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-user-friends fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Ver Pacientes</h5>
                        <p class="card-text">Acceda a la lista completa de pacientes y sus detalles.</p>
                        <a href="pacientes.php" class="btn btn-primary">Ir a Pacientes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-calendar-plus fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Crear Citas</h5>
                        <p class="card-text">Programe nuevas citas para los pacientes.</p>
                        <a href="#" class="btn btn-success">Nueva Cita</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-heartbeat fa-3x mb-3 text-danger"></i>
                        <h5 class="card-title">Registrar Triaje</h5>
                        <p class="card-text">Ingrese los datos de triaje de los pacientes.</p>
                        <a href="#" class="btn btn-danger">Ir a Triaje</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-prescription fa-3x mb-3 text-info"></i>
                        <h5 class="card-title">Recetas Emitidas</h5>
                        <p class="card-text">Visualice y gestione las recetas médicas emitidas.</p>
                        <a href="#" class="btn btn-info">Ver Recetas</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center text-white mt-5">
            <p>&copy; 2023 Sistema de Citas Hospitalarias. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    body {
    background-image: url('imagenes/hospital_admin.jpg');
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
    background-color: rgba(0, 0, 0, 0.7);
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
    background-color: rgba(255, 255, 255, 0.9);
    }

     .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

     .card-body {
    padding: 2.5rem;
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

      .fa-stethoscope {
      color: #007bff;
       }

      .fa-user-md {
      color: #28a745;
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

    .card-body {
        padding: 1.5rem;
    }
   }


</style>
<body>
    <div class="background-overlay"></div>
    <div class="container">
        <header class="text-center py-5">
            <h1 class="display-4 text-white">Administración del Hospital</h1>
            <p class="lead text-white">Gestión de especialidades y médicos</p>
        </header>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-stethoscope fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Agregar Nueva Especialidad</h5>
                        <p class="card-text">Registre una nueva especialidad médica en el sistema.</p>
                        <a href="../especialidades/especialidades.php" class="btn btn-primary">Agregar Especialidad</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-user-md fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Registrar Nuevo Médico</h5>
                        <p class="card-text">Añada un nuevo médico al personal del hospital.</p>
                        <a href="../medico/ver_medicos.php" class="btn btn-success">Registrar Médico</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="../index.html" class="btn btn-light btn-lg">Volver al Inicio</a>
        </div>

        <footer class="text-center text-white mt-5">
            <p>&copy; 2023 Administración del Hospital. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


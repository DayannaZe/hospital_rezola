<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Rezola </title>
    <link rel="stylesheet" href="Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titan+One&display=swap" rel="stylesheet">

</head>

<body>
        <header>
            <div class="absolute">
            <h1>HOSPITAL REZOLA</h1>
            </div>
        </header>
 
        <div class ="content">
            <div class="menu container">
                <a href="#" class="logo"> Logo </a>
                <input type="checkbox" id="menu" />
                <label for="menu" >
                <img src=imagenes/menu.png  class="menu-icono" alt="menu"/>
            </label>
    
           <nav class="navbar">
            <ul>
                <li><a href="paciente.php">Paciente</a></li>
                <li><a href="#">Sacar cita</a></li>
                <li><a href="#">Ver Historial medico</a></li>
                <li><a href="#">Horario</a></li>
               
          </ul>
    
           </nav> 
    
    
            </div>
             
       </div>
       <video id="background-video" autoplay muted loop preload="auto" width="100%" height="100%">
        <source src="video/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    
    </video>       
</body>
</html>
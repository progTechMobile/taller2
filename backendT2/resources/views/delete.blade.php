<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-item {
            margin-bottom: 15px;
        }

        .form-item label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-item">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="Juan">
        </div>

        <div class="form-item">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="Pérez">
        </div>
        
        <div class="form-item">
            <label for="email">Correo:</label>
            <input type="text" id="email" name="email" value="juanPerez@gmail.com">
        </div>

        <div class="form-item">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="30">
        </div>

        <div class="form-item">
            <label for="acompanantes">Cantidad de acompañantes:</label>
            <input type="number" id="acompanantes" name="acompanantes" value="2">
        </div>

        <div class="form-item">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="2022-03-15">
        </div>

        <div class="form-item">
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" value="1">
        </div>
    </div>  
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Agregar - Alumnos</title>
    <style>
       body {
            background-color: #121212;
            color: #ffffff;
        }
        .row {
            padding: 10px;
            border: 2px solid #444;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.28);
            margin-bottom: 20px;
            transition: all 0.3s;
            max-width: 40vw; /* Tamaño reducido */
            background-color: #1e1e1e;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control:focus {
            background-color: #444;
            color: #fff;
        }
        .btn-primary {
            background-color: #3a3a3a;
            border-color: #555;
        }
        .btn-primary:hover {
            background-color: #555;
            border-color: #666;
        }
        .btn-secondary {
            background-color: #555;
            border-color: #666;
        }
        .btn-secondary:hover {
            background-color: #666;
            border-color: #777;
        }
        h1 {
            color: #FFFFFF;
            text-shadow: 0 0 10px #0000FF, 0 0 20px #0000FF, 0 0 30px #0000FF;
        }
        legend {
            color: #0000FF;
            text-shadow: 0 0 10px #0000FF, 0 0 20px #0000FF, 0 0 30px #0000FF;
        }
        .text {
            color:rgb(255, 255, 255);
            text-shadow: 0 0 5px #0000FF, 0 0 10px #0000FF;
        }
        .form-label, .form-control, .close {
            color: #0000ff;
            text-shadow: 0 0 5px #0000FF, 0 0 10px #0000FF;
        }
        .alert-danger {
            background-color: #b71c1c;
            color: #fff;
        }
        .close {
            color: #fff;
        }
        /* Otros estilos necesarios */
        html, body {
            font-size: 20px;
            font-family: sans-serif;
            margin: 0px;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }
        .center {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .rotate {
            margin-left: auto;
            margin-right: auto;
            transform-style: preserve-3d;
            transition: all 0.3s;
        }
        .rotate.rotated {
            transform: rotateZ(40deg) rotateX(40deg) rotateY(-28deg);
        }

    </style>
</head>
<body>
    <script src="main.js"></script>
    <div class="center">
        <div class="rotate rotated">
            <div class="row">
                <h1 class="text"><center>Nuevo Alumno</center></h1> <span class="close">×</span>
            </div>
            <div class="row">
                <fieldset>
                    <legend class="text"></legend>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="index.php?action=insertar" method="POST">
                            <div class="mb-3">
                                <label for="idalumno" class="form-label">ID</label>
                                <input type="number" name="idalumno" id="idalumno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="alumno" class="form-label">Alumno</label>
                                <input type="text" name="alumno" id="alumno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="apaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" name="apaterno" id="apaterno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="amaterno" class="form-label">Apellido Materno</label>
                                <input type="text" name="amaterno" id="amaterno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-sm btn-secondary mb-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>

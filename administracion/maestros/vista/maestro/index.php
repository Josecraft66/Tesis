<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Maestros</title>
    <style>
        body {
        background-color: #121212;
        color: #ffffff;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start; /* Cambiado a flex-start para que la tabla esté más arriba */
        min-height: 100vh;
        padding: 2rem;
    }

    .container {
        margin-top: 2rem;
    }

    .table-container {
        background: rgba(255, 0, 0, 0.1); /* Fondo rojo claro */
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 32px 0 rgba(255, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 0, 0, 0.5); /* Borde rojo */
        width: 100%;
        max-width: 1200px;
        margin-top: 20px; /* Añadido margen superior */
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    th {
        background: linear-gradient(145deg, #1a1a1a, #2a2a2a);
        color: #fff;
        padding: 15px;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
        border-bottom: 2px solid #ff0000; /* Borde rojo */
    }

    td {
        padding: 15px;
        color: while;
        background: rgba(255, 255, 255, 0.03);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    tr:hover td {
        background: rgba(255, 0, 0, 0.1); /* Fondo rojo al pasar el mouse */
    }

    .arrow {
    text-decoration: none;
    color: #ff0000;
    font-size: 3em; /* Aumentar el tamaño de la flecha */
    transition: transform 0.3s ease, color 0.3s ease;
    display: inline-block; /* Para que la animación funcione correctamente */
}

.arrow:hover {
    color: #0000FF; /* Cambiar color al pasar el mouse */
}

@keyframes fly {
    0% {
        transform: translate(0, 0) rotate(0deg);
    }
    50% {
        transform: translate(100vw, -50vh) rotate(30deg); /* Volar hacia la esquina superior derecha */
    }
    100% {
        transform: translate(200vw, -100vh) rotate(60deg); /* Fuera de la pantalla */
    }
}
    h1 {
        font-family: 'Staatliches', sans-serif;
        color: #f0f0f0;
        text-align: center;
        margin-bottom: 20px;
        font-size: 2.5em;
        text-shadow: 0 0 10px rgba(255, 0, 0, 0.7), /* Sombra roja */
                    0 0 20px rgba(255, 0, 0, 0.5), /* Sombra más difusa */
                    0 0 30px rgba(255, 0, 0, 0.3); /* Sombra aún más difusa */
        letter-spacing: 2px;
        text-transform: uppercase;
        border-radius: 10px; /* Bordes redondeados para un efecto más suave */
    }

    </style>
<body>
<div class="col-md-12">
        <h1>Maestros de Administracion</h1>
    <div class="col-md-10 text-end">
        <a href="../../../../proyecto/index.html" class="btn btn-dark">Regresar</a>
                <a href="index.php?action=insertar" class="btn btn-primary">Registrar</a>
    </div>
    </div>
    <div class="table-container">
        <table>
            <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Maestro</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($maestros)): ?>
                        <?php foreach($maestros as $maestro): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($maestro['idmaestro']); ?></td>
                                <td><?php echo htmlspecialchars($maestro['maestro']); ?></td>
                                <td><?php echo htmlspecialchars($maestro['apaterno']); ?></td>
                                <td><?php echo htmlspecialchars($maestro['amaterno']); ?></td>
                                <td><?php echo htmlspecialchars($maestro['direccion']); ?></td>
                                <td><?php echo htmlspecialchars($maestro['telefono']); ?></td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="index.php?action=editar&id=<?php echo $maestro['idmaestro']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="index.php?action=eliminar&id=<?php echo $maestro['idmaestro']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este maestro?');">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No hay maestros registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

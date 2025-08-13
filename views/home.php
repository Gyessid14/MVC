<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Tareas</h1>
            <a href="index.php?accion=crear" class="btn btn-primary">Crear Nueva Tarea</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

               <?php
               while ($row = $tareas->fetch(PDO::FETCH_ASSOC)): ?>
                                                 
                <tr>
                    <td><?php echo ($row['titulo']) ?></td>
                    <td><?php echo ($row['descripcion']) ?></td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Editar</a>
                        <a href="" class="btn btn-danger btn-sm" onclick="">Eliminar</a>
                    </td>
                </tr>
               <?php endwhile; ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>
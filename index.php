<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Título de la tarea"
                            autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control"
                            placeholder="Descripcion de la tarea"></textarea>
                    </div>

                    <input type="submit" class="btn btn-secondary btn-block" name="guardar" value="Guardar Respuesta">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered table-secondary">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tarea";
                    $resultado = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($resultado)){ ?>
                    <tr>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['fecha_creada'] ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square" style="color: #152e41;"></i>
                            </a>
                            <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fa-regular fa-trash-can" style="color: #152e41;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
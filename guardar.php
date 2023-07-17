<?php

include("db.php");

if(isset($_POST['guardar'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Query Fallido");
    }

    $_SESSION['message'] = "Tarea guardada satisfactoriamente";
    $_SESSION['message_type'] = 'primary';

    header("Location: index.php");
}

?>
<?php 

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tarea WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    if(!$resultado){
        die("Consulta Fallida");
    }

    $_SESSION['message'] = 'Tarea Eliminada Satisfactoriamente';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}

?>
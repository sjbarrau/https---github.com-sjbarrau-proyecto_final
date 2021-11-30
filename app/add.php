<?php

if(isset($_POST['titulo'])) {
    require '../db_conn.php';

    $titulo = $_POST['titulo'];

    if(empty($titulo)) {
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO tareas(titulo) VALUE (?)");
        $res = $stmt->execute([$titulo]);

        if($res) {
            header("Location: ../index.php?mess=success");
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
};

?>
<?php

if(isset($_POST['id'])) {
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($id)) {
        echo 'error';
    }else {
        $tareas = $conn->prepare("SELECT id,checked FROM tareas WHERE id=?");
        $tareas->execute([$id]);

        $tarea = $tareas->fetch();
        $uId = $tarea['id'];
        $checked = $tarea['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE tareas SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        } else {
            echo "error";
        };

        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
};

?>
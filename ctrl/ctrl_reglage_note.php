<?php
    include "./utils/connecteBDD.php";
    include "./utils/function.php";


    echo "<section class='regl-form regl-note'>";
    include './view/view_reglage_note.html';
    echo "</section>";

    if(!isset($_GET['id'])){
        echo 'Une date est séléctionner';
        $data = voirDerniereNote($bdd, $_SESSION['id']);
        var_dump($data);
    }
?>
<?php
    include "./utils/connecteBDD.php";
    include "./utils/function.php";


    echo "<section class='regl-form regl-note'>";
    include './view/view_reglage_note.html';
    echo "</section>";

    if(isset($_GET['date'])){
        echo 'Une date est séléctionner';
        $data = voirDerniereNote($bdd, $_GET['date']);
        echo 
        "<script>
            let modifNote = document.querySelector('#modifNote');
            modifNote.value = '$data->contenu_note';
        </script>";
    }
?>
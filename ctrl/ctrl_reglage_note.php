<?php

    echo "<section class='regl-form regl-note'>";
    include './view/view_reglage_note.html';
    echo "</section>";


    echo 
    "<script>
        let modifNote = document.querySelector('#modifNote');
        modifNote.value = '$data->contenu_note';
    </script>";
    

    if(isset($_POST['valider'])){
        echo "modification note enregistré !";
    }
?>
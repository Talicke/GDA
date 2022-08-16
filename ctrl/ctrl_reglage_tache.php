<?php

    echo "<div class='regl-form regl-tache'>";
    include './view/view_reglage_tache.html';
    echo "</div>";

    echo 
    "<script>
        let modifNote = document.querySelector('#modifTache');
        modifNote.value = '$data->contenu_note';
    </script>";

?>
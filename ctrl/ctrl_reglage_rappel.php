<?php
    include "./Model/model_rappel.php";

    echo "<div class='regl-form regl-rappel'>";
    include "./view/view_reglage_rappel.html";
    echo "</div>";

    echo 
    "<script>
        let modifNote = document.querySelector('#modifRappel');
        modifNote.value = '$data->contenu_note';
    </script>";

?>
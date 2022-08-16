<?php

    echo "<div class='regl-form regl-RDV'>";
    include "./view/view_reglage_RDV.html";
    echo "</div>";

    echo 
    "<script>
        let modifNote = document.querySelector('#modifRDV');
        modifNote.value = '$data->contenu_note';
    </script>";
?>
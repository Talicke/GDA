<?php
    include "./view/view_reglage.html";



    if(isset($_POST['regl-note'])){
        include './ctrl/ctrl_reglage_note.php';
    }elseif(isset($_POST['regl-tache'])){
            include './ctrl/ctrl_reglage_tache.php';
    }elseif(isset($_POST['regl-rappel'])){
            include './ctrl/ctrl_reglage_rappel.php';
    }elseif(isset($_POST['regl-RDV'])){
            include './ctrl/ctrl_reglage_RDV.php';
    }else{
        include './ctrl/ctrl_reglage_note.php';
    }
?>
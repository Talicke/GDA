<?php

    include './view/view_compte.html';

    if(isset($_POST['regl-acti'])){
        include './ctrl/ctrl_gest_act.php';
    }
    
    else if(isset($_POST['regl-proj'])){
        include './ctrl/ctrl_gest_proj.php';
    }

?>
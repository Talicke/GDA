<?php


    if(isset($_POST['regl-acti'])){
        include './ctrl/ctrl_gest_act.php';
    }
    
    else if(isset($_POST['regl-proj'])){
        include './ctrl/ctrl_gest_proj.php';
    }
    else{
        include './ctrl/ctrl_gest_act.php';
    }

    echo $twig->render('compte.html.twig', [
        'titre' => 'Mon compte',
        'freqs' => $freqs,
        'activites' => $activites,
    ]);

?>
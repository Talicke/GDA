<?php
include "./Model/model_tache.php";
include "./manager/manager_tache.php";

echo $twig->render('reglageTache.html.twig', [
    'titre' => 'Reglage tache',
    'valueNote' => $contenuNote
]);

?>
<?php
include "./Model/model_tache.php";
include "./manager/manager_tache.php";

echo $twig->render('reglagesTache.html.twig', [
    'titre' => 'Reglage tache',
    'valueNote' => $contenuNote
]);

?>
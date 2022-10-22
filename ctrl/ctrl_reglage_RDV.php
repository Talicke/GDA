<?php
include "./Model/model_RDV.php";
include "./manager/manager_RDV.php";

echo $twig->render('reglageRDV.html.twig', [
    'titre' => 'Reglage RDV',
    'valueNote' => $contenuNote
]);

?>
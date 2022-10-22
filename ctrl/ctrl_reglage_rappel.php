<?php
include "./Model/model_rappel.php";
include "./manager/manager_rappel.php";

echo $twig->render('reglageRappel.html.twig', [
    'titre' => 'Reglage rappel',
    'valueNote' => $contenuNote
]);

?>
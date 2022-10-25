<?php



    echo $twig->render('liste_note.html.twig', [
        'titre' => 'Inscription',
        'inscription' => $inscription,
        'message' => $message
    ]);



?>
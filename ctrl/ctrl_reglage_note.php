<?php
$contenuNote = $note->getContenuNote();

    // echo "<section class='regl-form regl-note'>
    // <div class='form-regl-sup'>
    // <div class='dropdown'>
    //     <h3>Activités :</h3>
    //     <form action='' method='post' class=''>
    //     <select name='activite' id='select-acti'>
    //         <option value='aucune'>Choisissez une activité</option>
    //         <option value='acti-choix1'>valeur 1</option>
    //         <option value='acti-choix2'>valeur 2</option>
    //         <option value='acti-choix3'>valeur 3</option>
    //     </select>
    // </div>

    // <div class='dropdown'>
    //     <h3>Projets :</h3>
    //     <select name='projet' id='select-proj'>
    //         <option value='aucune'>Choisissez un projet</option>
    //         <option value='proj-valeur 1'>valeur 1</option>
    //         <option value='proj-valeur 2'>valeur 2</option>
    //         <option value='proj-valeur 3'>valeur 3</option>
    //     </select>
    // </div>";
    // include './view/view_reglage_note.html';
    // echo "</section>";


    if(isset($_POST['valider'])){
        // var_dump($note);
        $note->setContenuNote($_POST['modifNote']);
        $note->modifierNote($bdd);
        echo "modification note enregistré !";
    }

    echo $twig->render('reglageNote.html.twig', [
        'titre' => 'Reglage note',
        'valueNote' => $contenuNote
    ]);
?>
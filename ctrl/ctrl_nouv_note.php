<?php
    include "./utils/connecteBDD.php";
    include "./Model/model_note.php";
    include "./manager/manager_note.php";
    // include "./view/view_accueil.html";

      /*------------------------------------------------
                        VARIABLES
    ------------------------------------------------*/
    $message = "";
    

    if(isset($_POST['valider'])){
        if(!empty($_POST['addNote'])){
            $date =  date('d-m-y H:i:s');
            $note = new ManagerNote($_POST['addNote'],$date, 0, 1, null, null, $_SESSION['id']);
            $note->ajoutNote($bdd);
            header('Location: ./reglages');
        }else{
            $message = "<div class='error'>Aucune note à enregistrer</div>";
        }
    }

    echo $twig->render('nouvNote.html.twig', [
        'titre' => 'Nouvelle note',
        "message" => $message
    ])

?>
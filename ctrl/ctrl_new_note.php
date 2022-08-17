<?php
    include "./utils/connecteBDD.php";
    include "./Model/model_note.php";
    include "./view/view_accueil.html";
    

    if(isset($_POST['valider'])){
        if(!empty($_POST['addNote'])){
            $date =  date('d-m-y H:i:s');
            $note = new Note($_POST['addNote'],$date, 0, 1, null, null, $_SESSION['id']);
            $note->ajoutNote($bdd);
            header('Location: ./reglages');
        }else{
            echo "Aucune note à enregistrer";
        }
    }

?>
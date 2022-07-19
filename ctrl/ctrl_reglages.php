<?php
    include "./view/view_reglage.html";
    include "./utils/connecteBDD.php";
    include "./utils/function.php";
    include "./Model/model_note.php";

    if(!isset($_GET['id'])){
        echo "Aucune id n'est dans l'url";
        $data = voirDerniereNote($bdd, $_SESSION['id']);
        $note = new Note($data->contenu_note, $data->date_note, $data->estTerminer, $data->id_cat, $data->id_activite, $data->id_projet, $data->id_compte, $data->id_rdv, $data->id_rappel);
        $note->setIdNote($data->id_note);
        var_dump($note);
    }


    if(isset($_POST['regl-note'])){
        include './ctrl/ctrl_reglage_note.php';
    }elseif(isset($_POST['regl-tache'])){
        $note->changerCatNote($bdd, 2);
        include './ctrl/ctrl_reglage_tache.php';
    }elseif(isset($_POST['regl-rappel'])){
            include './ctrl/ctrl_reglage_rappel.php';
    }elseif(isset($_POST['regl-RDV'])){
            include './ctrl/ctrl_reglage_RDV.php';
    }else{
        include './ctrl/ctrl_reglage_note.php';
    }
    echo '</form>'; 
    echo ' <button type="submit" name="valider" class="submit-button">Valider</button>';
?>
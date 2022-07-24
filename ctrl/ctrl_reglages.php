<?php
    include "./view/view_reglage.html";
    include "./utils/connecteBDD.php";
    include "./utils/function.php";
    include "./Model/model_note.php";
    include "./Model/model_tache.php";

    if(!isset($_GET['id'])){
        echo "Aucune id n'est dans l'url";
        $data = voirDerniereNote($bdd, $_SESSION['id']);
        $note = new Note($data->contenu_note, $data->date_note, $data->estTerminer, $data->id_cat, $data->id_activite, $data->id_projet, $data->id_compte, $data->id_rdv, $data->id_rappel);
        $note->setIdNote($data->id_note);
    }
    // var_dump($note);
    $cat = $note->getIdCat();

    

    if(isset($_POST['regl-note'])){
        $note->changerCatNote($bdd, 1);
        include './ctrl/ctrl_reglage_note.php';
    }elseif(isset($_POST['regl-tache'])){
        $note->changerCatNote($bdd, 2);
        include './ctrl/ctrl_reglage_tache.php';
    }elseif(isset($_POST['regl-rappel'])){
        $note->changerCatNote($bdd, 3);
        include './ctrl/ctrl_reglage_rappel.php';
    }elseif(isset($_POST['regl-RDV'])){
        $note->changerCatNote($bdd, 4);
        include './ctrl/ctrl_reglage_RDV.php';
    }else{
        switch($cat){
            case $cat === '1' : 
                include './ctrl/ctrl_reglage_note.php';
                break ;
            case $cat === '2':
                include './ctrl/ctrl_reglage_tache.php';
                break;
            case $cat === '3':
                include './ctrl/ctrl_reglage_rappel.php';
                break;
            case $cat === '4':
                include './ctrl/ctrl_reglage_RDV.php';
                break;
        }
    }

    echo '</form>'; 
    echo ' <button type="submit" name="valider" class="submit-button">Valider</button>';
?>
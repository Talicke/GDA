<?php
    // include "./view/view_reglage.html";
    include "./utils/connecteBDD.php";
    include "./Model/model_note.php";
    include "./manager/manager_note.php";

    include "./Model/model_activite.php";
    include "./manager/manager_activite.php";

    include "./Model/model_projet.php";
    include "./manager/manager_projet.php";

    //recupération de la note
    $note = new ManagerNote(null, null, null, null, null, null, $_SESSION['id']);
    if(!isset($_GET['id'])){
        $data = $note->voirDerniereNoteDuCompte($bdd);
        $note->setIdNote($data->id_note);
        $note->setContenuNote($data->contenu_note);
        $note->setDateNote($data->date_note);
        $note->setEstTerminer($data->estTerminer);
        $note->setIdCat($data->id_cat);
        $note->setIdActivite($data->id_activite);
        $note->setIdProjet($data->id_projet);
    }else if(isset($_GET['id'])){
        $note->setIdNote($_GET['id']);
        $data = $note->voirNoteDuCompteParId($bdd);
        $note->setContenuNote($data->contenu_note);
        $note->setDateNote($data->date_note);
        $note->setEstTerminer($data->estTerminer);
        $note->setIdCat($data->id_cat);
        $note->setIdActivite($data->id_activite);
        $note->setIdProjet($data->id_projet);
    }

    // var_dump($note);

    $cat = $note->getIdCat();

    $contenuNote = $note->getContenuNote();

    $act = new ManagerActivite (null, null, $_SESSION['id'], null);
    $activites = $act->voirToutActiviteParCompte($bdd);

    $proj = new ManagerProjet(null, $_SESSION['id'], null);
    $projets = $proj->voirToutProjetParCompte($bdd);

    if($note->getIdActivite() == null){
        $selectedActi='';
    }else{
        $actiOfNote = new ManagerActivite(null, null, $_SESSION['id'], null);
        $actiOfNote->setIdActivite($note->getIdActivite());
        $retour = $actiOfNote->voirActiviteParId($bdd);
        $actiOfNote->setNomActivite($retour->nom_activite);
        $selectedActi= '#'.$actiOfNote->getNomActivite().'';
    }

    if($note->getIdProjet() == null){
        $selectedProj ="";
    }else{
        $projOfNote = new ManagerProjet(null, null, $_SESSION['id'], null);
        $projOfNote->setIdProjet($note->getIdProjet());
        $retour = $projOfNote->voirProjetParId($bdd);
        $projOfNote->setNomProjet($retour->nom_projet);
        $selectedProj= '#'.$projOfNote->getNomProjet().'';
    }

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
            case $cat === 1: 
                include './ctrl/ctrl_reglage_note.php';
                break ;
            case $cat === 2:
                include './ctrl/ctrl_reglage_tache.php';
                break;
            case $cat === 3:
                include './ctrl/ctrl_reglage_rappel.php';
                break;
            case $cat === 4:
                include './ctrl/ctrl_reglage_RDV.php';
                break;
        }
    };

    


?>
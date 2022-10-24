<?php
    include "./utils/connecteBDD.php";
    include './Model/model_frequence.php';
    include './manager/manager_frequence.php';
    include './Model/model_activite.php';
    include './manager/manager_activite.php';
    include './Model/model_projet.php';
    include './manager/manager_projet.php';

    $freq = new managerFrequence(null, null);
    $freqs = $freq->voirToutFreq($bdd);

    $act = new ManagerActivite(null, null, $_SESSION['id'], null);
    $activites = $act->voirToutActiviteParCompte($bdd);

    if(isset($_POST['nouvActi'])){
        $activite = new ManagerActivite($_POST['nomActivite'], $_POST['tempsActivite'], $_SESSION['id'], $_POST['selectFreq']);
        $activite -> ajoutActivite($bdd);
    }


    $projet = new ManagerProjet(null, $_SESSION['id'], null);
    $projets = $projet->voirToutProjetParCompte($bdd);

    if(isset($_POST['nouvProj'])){
        $projet = new ManagerProjet($_POST['nomNouvProj'], $_SESSION['id'], $_POST['selectAct']);
        $projet->ajoutProjet($bdd);
    }



    $showActivite = true;
    $showProjet = false;

    if(isset($_POST['regl-acti'])){
        // include './ctrl/ctrl_gest_act.php';
        $showActivite = true;
        $showProjet = false;
    }
    
    else if(isset($_POST['regl-proj'])){
        // include './ctrl/ctrl_gest_proj.php';
        $showActivite = false;
        $showProjet = true;
    }
    // else{
    //     include './ctrl/ctrl_gest_act.php';
    // }

    echo $twig->render('compte.html.twig', [
        'titre' => 'Mon compte',
        'showActivite' => $showActivite,
        'showProjet' => $showProjet,
        'freqs' => $freqs,
        'activites' => $activites,
        'projets' => $projets,
    ]);

?>
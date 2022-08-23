<?php
    include './utils/twig.php';
    include './utils/function.php';

    session_start();

    /*------------------------------------------------
                        VARIABLES
    ------------------------------------------------*/

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';


    /*------------------------------------------------
                        ROUTEUR
    ------------------------------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource

    switch($path){

        case $path === '/' :
            include "./ctrl/ctrl_connexion.php";
            break;
        
        case $path === '/reglages' : 
            include './ctrl/ctrl_reglages.php';
            $titre = "Réglages";
            break ;

        case $path === '/verifCompte':
            include './ctrl/ctrl_verifCompte.php';
            $titre = 'Vérification du compte';
            break;

        case $path === '/newNote' : 
            include "./ctrl/ctrl_new_note.php";
            $titre = "Prise de note";
            break ;

        case $path === '/newMail' :
            include "./view/view_newMail.html";
            $titre = "Vérification de votre e-mail";
            break;
        
        case $path === '/inscription' :
            include "./ctrl/ctrl_inscription.php";
            $tire = "Inscription";
            break;

        case $path === '/compte' :
            include "./ctrl/ctrl_compte.php";
            $titre = "votre compte";
            break;

        case $path === '/activites' :
            include "./ctrl/ctrl_activites.php";
            $titre = "Vos activités";
            break;
        
        case $path === '/projets' :
            include "./ctrl/ctrl_projets.php";
            $titre = "Vos projets";
            break;

        case $path === '/rendez-vous' :
            include "./ctrl/ctrl_liste_RDV.php";
            $titre = "Vos rendez-vous";
            break;
        
        case $path === '/rappels' :
            include "./ctrl/ctrl_liste_rappel.php";
            $titre = "Vos rappels";
            break;

        case $path === '/taches' :
            include "./ctrl/ctrl_liste_tache.php";
            $titre = "Vos taches";
            break;

        case $path === '/notes' :
            include "./ctrl/ctrl_liste_note.php";
            $titre = "Vos notes";
            break;
    }

    if(isset($_POST['compte'])){
        header('Location: ./compte');
    }

    if(isset($_POST['activites'])){
        header('Location: ./activites');
    }

    if(isset($_POST['projets'])){
        header('Location: ./projets');
    }

    if(isset($_POST['rdv'])){
        header('Location: ./rendez-vous');
    }

    if(isset($_POST['rappel'])){
        header('Location: ./rappels');
    }

    if(isset($_POST['tache'])){
        header('Location: ./taches');
    }

    if(isset($_POST['note'])){
        header('Location: ./notes');
    }

?>
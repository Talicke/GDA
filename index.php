<?php
    include './utils/twig.php';

    echo $twig->render('main.html.twig');

    session_start();
    if($_SESSION['estConnecter']){
        include "./ctrl/ctrl_header.php";
    }
    
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';


    /*------------------------------------------------
                        ROUTEUR
    ------------------------------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        
        case $path === '/reglages' : 
            include './ctrl/ctrl_reglages.php';
            break ;

        case $path === '/verifCompte':
            include './ctrl/ctrl_verifCompte.php';
            break;

        case $path === '/newNote' : 
            include "./ctrl/ctrl_new_note.php";
            break ;

        case $path === '/newMail' :
            include "./view/view_newMail.html";
            break;
        
        case $path === '/' :
            include "./ctrl/ctrl_connection.php";
            break;
        
        case $path === '/inscription' :
            include "./ctrl/ctrl_inscription.php";
            break;

        case $path === '/compte' :
            include "./ctrl/ctrl_compte.php";
            break;

        case $path === '/activites' :
            include "./ctrl/ctrl_activites.php";
            break;
        
        case $path === '/projets' :
            include "./ctrl/ctrl_projets.php";
            break;

        case $path === '/rendez-vous' :
            include "./ctrl/ctrl_liste_RDV.php";
            break;
        
        case $path === '/rappels' :
            include "./ctrl/ctrl_liste_rappel.php";
            break;

        case $path === '/taches' :
            include "./ctrl/ctrl_liste_tache.php";
            break;

        case $path === '/notes' :
            include "./ctrl/ctrl_liste_note.php";
            break;
    }

    
?>
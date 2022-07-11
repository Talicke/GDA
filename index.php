<?php

    include "./view/view_header.html";
    // include "./view/view_accueil.html";

    //session start
    session_start();
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
    }

    
?>
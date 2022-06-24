<?php

    include "./view/view_header.html";
    // include "./view/view_accueil.html";

    //session start
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';


    if(isset($_POST['valider'])){
        // echo("powet");
        header('Location: ./reglages');
    }



    /*------------------------------------------------
                        ROUTEUR
    ------------------------------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        
        case $path === '/reglages' : 
            include './ctrl/ctrl_reglages.php';
            break ;

        case $path === '/newNote' : 
            include "./view/view_accueil.html";
            break ;
        
        case $path === '/' :
            include "./view/view_connection.html";
            break;
        
        case $path === '/inscription' :
            include "./ctrl/ctrl_inscription.php";
            break;
    }

    
?>
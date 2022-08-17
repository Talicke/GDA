<?php
    include "./view/view_header.html";


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
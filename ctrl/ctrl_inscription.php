<?php
    include "./view/view_inscription.html";

    if (isset($_POST["inscription"])){
        if(!empty($_POST['mail']) AND !empty($_POST['conf_mail']) AND !empty($_POST['mdp']) AND !empty($_POST['conf_mdp'])){
            echo "tout les champs sont remplis";
            if ($_POST["mail"] === $_POST["conf_mail"]){
                echo "les e-mails correspondent";
                if ($_POST["mdp"] === $_POST["conf_mdp"]){
                    echo "les mdp sont indentiques";
                }else{
                    echo "les mots de passe ne sont pas identiquent";
                }
            }else{
                echo "les e-mails sont differents";
            }
        }else{
            echo "Vous n'avez pas remplit tout les champs";
        }
    }
?>
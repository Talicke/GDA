<?php
    include "./utils/connecteBDD.php";
    include "./utils/keyGen.php";
    include "./model/model_compte.php";
    include "./view/view_inscription.html";


    if (isset($_POST["inscription"])){
        echo "vous avez appuyer sur inscription";
        if(!empty($_POST['mail']) AND !empty($_POST['conf_mail']) AND !empty($_POST['mdp']) AND !empty($_POST['conf_mdp'])){
            echo "tout les champs sont remplis";
            if ($_POST["mail"] === $_POST["conf_mail"]){
                $compte = New Compte($_POST["mail"], $_POST["mdp"], generateKey(), 0);
                $tabCompte = $compte->voirCompteParEmail($bdd);
                echo "les e-mails correspondent";
                if (empty($tabCompte)){
                    echo "mail jamais utiliser";
                    if ($_POST["mdp"] === $_POST["conf_mdp"]){
                        echo "les mdp sont indentiques";
                    
                        $compte->ajoutCompte($bdd);
                        Header('Location: ./newMail');
                        
                    }else{
                        echo "les mots de passe ne sont pas identiquent";
                    }
                }else{
                    echo "un compte avec cette e-mail est déja enregistrer";
                }
            }else{
                echo "les e-mails sont differents";
            }
        }else{
            echo "Vous n'avez pas remplit tout les champs";
        }
    }
?>
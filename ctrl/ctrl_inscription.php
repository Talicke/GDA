<?php
    include "./utils/connecteBDD.php";
    include "./utils/keyGen.php";
    include "./utils/auth_mail.php";
    include "./model/model_compte.php";
    // include "./view/view_inscription.html";


    if (isset($_POST["inscription"])){
        echo "vous avez appuyer sur inscription";
        if(!empty($_POST['mail']) AND !empty($_POST['conf_mail']) AND !empty($_POST['mdp']) AND !empty($_POST['conf_mdp'])){
            echo "tout les champs sont remplis";
            if ($_POST["mail"] === $_POST["conf_mail"]){
                $cle = generateKey();
                $compte = New Compte($_POST["mail"], $_POST["mdp"], $cle, 0);
                $tabCompte = $compte->voirCompteParEmail($bdd);
                echo "les e-mails correspondent";
                if (empty($tabCompte)){
                    echo "mail jamais utiliser";
                    if ($_POST["mdp"] === $_POST["conf_mdp"]){
                        echo "les mdp sont indentiques";
                    
                        $compte->ajoutCompte($bdd);
                        $compte->envoyerMail($login_smtp, $mdp_smtp, 'Vérification de votre compte GDA', 'Cet e-mail vous a été envoyer automatiquement afin de vérifier votre adresse e-mail.</br>Cliquez sur le lien ci-dessous pour vous authentifier</br><a href="http://gda/verifCompte?key='.$cle.'">Vérifier mon compte.</a>');
                        // Header('Location: ./newMail');
                        
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

echo $twig->render('inscription.html.twig', [
    'titre' => 'Inscription'
])
?>


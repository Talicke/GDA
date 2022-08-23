<?php
    include "./utils/connecteBDD.php";
    include "./utils/keyGen.php";
    include "./utils/auth_mail.php";
    include "./model/model_compte.php";
    include "./manager/manager_compte.php";
    // include "./view/view_inscription.html";

        /*------------------------------------------------
                        VARIABLES
        ------------------------------------------------*/
    $inscription = false;
    $message="";

    if (isset($_POST["inscription"])){
        //vérification que tout les champs sont remplient
        if(!empty($_POST['mail']) AND !empty($_POST['conf_mail']) AND !empty($_POST['mdp']) AND !empty($_POST['conf_mdp'])){
            //néttoyage des infos utilisateur
            $mail = netEntrer($_POST['mail']);
            $mailConf = netEntrer($_POST['conf_mail']);
            $mdp = netEntrer($_POST['mdp']);
            $mdpConf = netEntrer($_POST['conf_mdp']);
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            //création d'une clé d'authentification
            $cle = generateKey();
            
            //Verification des mails
            if ($mail === $mailConf){

                //Vérification des mots de passe
                if ($mdp === $mdpConf){
                    $compte = New ManagerCompte($mail, $mdpHash, $cle, 0);

                    //vérification que l'email n'est pas utiliser
                    $tabCompte = $compte->voirCompteParEmail($bdd);

                    if (empty($tabCompte)){

                        //ajout du compte à la bdd
                        $compte->ajoutCompte($bdd);
                        
                        //envoie d'un mail de verification d'un compte mail

                        $compte->envoyerMail($login_smtp, $mdp_smtp, utf8_decode('Vérification de votre compte 
                        GDA'), utf8_decode('Cet e-mail vous a été envoyer automatiquement afin de vérifier votre
                        adresse e-mail.</br>Cliquez sur le lien ci-dessous pour vous authentifier</br>
                        <a href="http://gda/verifCompte?key='.$cle.'&mail='.$mail.'">Vérifier 
                        mon compte.</a>'));
                        
                        //création d'une variable de fin d'inscription
                        $inspription = true;
                    }else{
                            $message = "<div class='error'> les mots de passe ne sont pas identique.</div>";
                    }
                }else{
                    $message = "<div class='error'>un compte avec cette e-mail est déja enregistrer.</div>";
                }
            }else{
                $message = "<div class='error'>les e-mails sont differents.</div>";
            }
        }else{
            $message = "<div class='error'>Vous n'avez pas remplit tout les champs.</div>";
        }
    }

echo $twig->render('inscription.html.twig', [
    'titre' => 'Inscription',
    'inscription' => $inscription,
    'message' => $message
])
?>


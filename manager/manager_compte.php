<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class ManagerCompte extends Compte {
        public function ajoutCompte($bdd):void{
            try{
                $mail = $this->getMailCompte();
                $mdp = $this->getMdpCompte();
                $cle = $this->getCleCompte();
                $estValide = $this->getAuthCompte();

                $req = $bdd->prepare('INSERT INTO comptes(login_compte, password_compte, auth_compte, estValide) VALUES (?, ?, ?, ?)');

                $req->bindparam(1, $mail, PDO::PARAM_STR);
                $req->bindparam(2, $mdp, PDO::PARAM_STR);
                $req->bindparam(3, $cle, PDO::PARAM_STR);
                $req->bindparam(4, $estValide, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirCompteParEmail($bdd){
            try{
                $mail = $this->getMailCompte();

                $req = $bdd->prepare('SELECT id_compte, login_compte, password_compte, auth_compte, estValide FROM comptes WHERE login_compte = ?');

                $req->bindparam(1, $mail, PDO::PARAM_STR);
                $req->execute();

                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirCompteParId($bdd){
            try{
                $id = $this->getIdCompte();

                $req = $bdd->prepare('SELECT * FROM comptes WHERE id_compte = ?');

                $req->bindparam(1, $id, PDO::PARAM_INT);
                $req->execute();

                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur' .$e->getMessage());
            }
        }

        public function validerCompte($bdd){
            try{
                $mail = $this->getMailCompte();

                $req = $bdd->prepare('UPDATE comptes SET estValide = 1 WHERE login_compte = ?');
                
                $req->bindparam(1, $mail, PDO::PARAM_STR);
                $req->execute();
            }

            catch(Exception $e){
                die('Erreur' .$e->getMessage());
            }
        }

        public function envoyerMail($login_smtp, $mdp_smtp, $mail, $objet, $texte){
            require 'vendor/autoload.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $login_smtp;                     //SMTP username
                $mail->Password   = $mdp_smtp;                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom( $login_smtp, 'GDA');
                $mail->addAddress($mail, $mail);     //Add a recipient
        
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $objet;
                $mail->Body    = $texte;
            
                $mail->send();
                echo 'Nous vous avons envoyer un mail de vérification.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class ManagerCompte extends Compte {
        public function ajoutCompte($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO comptes(login_compte, password_compte, auth_compte, estValide) VALUES (:mail, :mdp, :auth, :isAuth)');
                $req->execute(array(
                    ':mail' => $this -> getMailCompte(),
                    ':mdp' => $this -> getMdpCompte(),
                    ':auth' => $this -> getCleCompte(),
                    ':isAuth' => $this -> getAuthCompte()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirCompteParEmail($bdd){
            try{
                $req = $bdd->prepare('SELECT * FROM comptes WHERE login_compte = :mail');
                $req->execute(array(
                    ':mail' => $this -> getMailCompte(),
                ));
                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirCompteParId($bdd, $id){
            try{
                $req = $bdd->prepare('SELECT * FROM comptes WHERE id_compte = :id');
                $req->execute(array(
                    ':id' => $id
                ));
                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur' .$e->getMessage());
            }
        }

        public function validerCompte($bdd){
            try{
                $req = $bdd->prepare('UPDATE comptes SET estValide = 1 WHERE login_compte = :mail');
                $req->execute(array(
                    ':mail' => $this->getMailCompte()
                ));
            }
            catch(Exception $e){
                die('Erreur' .$e->getMessage());
            }
        }

        public function envoyerMail($login_smtp, $mdp_smtp, $objet, $texte){
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
                $mail->addAddress($this->getMailCompte(), $this->getMailCompte());     //Add a recipient
        
            
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
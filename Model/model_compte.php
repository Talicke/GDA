<?php

    class Compte{
        private ?int $id_compte;
        private ?string $mail_compte;
        private ?string $mdp_compte;
        private ?string $cle_compte;
        private ?int $isAuth;

        public function __construct(?string $mail, ?string $mdp, ?string $cle, ?int $auth)
        {
            $this -> mail_compte = $mail;
            $this -> mdp_compte = $mdp;
            $this -> cle_compte = $cle;
            $this -> isAuth = $auth;
        }
        // GETTER
        public function getIdCompte():?int{
            return $this -> id_compte;
        }
        public function getMailCompte():?string{
            return $this -> mail_compte;
        }
        public function getMdpCompte():?string{
            return $this -> mdp_compte;
        }
        public function getCleCompte():?string{
            return $this -> cle_compte;
        }
        public function getAuthCompte():?int{
            return $this -> isAuth;
        }
        // SETTER
        public function setIdCompte($id):void{
            $this -> id_compte = $id;
        }
        public function setMailCompte($mail):void{
            $this -> mail_compte = $mail;
        }
        public function setMdpCompte($mdp):void{
            $this -> mdp_compte = $mdp;
        }
        public function setCleCompte($cle):void{
            $this -> cle_compte = $cle;
        }
        public function setAuthCompte($auth):void{
            $this -> isAuth = $auth;
        }
    }

?>
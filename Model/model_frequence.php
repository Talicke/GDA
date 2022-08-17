<?php
    class Frequence{
        private $id_freq;
        private $intituler_freq;

        // GETTER
        public function getIdFreq():int{
            return $this->id_freq;
        }
        public function getintitulerFreq():string{
            return $this->intituler_freq;
        }
        
        // SETTER
        public function setIdFreq($id):void{
            $this->id_freq = $id;
        }
        public function setIntitulerFreq($nom):void{
            $this->intituler_freq = $nom;
        }

        // Méthodes
        public function voirToutFreq($bdd){
            try{
                $req = $bdd->prepare('SELECT id_freq, intituler_freq FROM frequences');
                $req->execute();
                $data = $req -> fetchall(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
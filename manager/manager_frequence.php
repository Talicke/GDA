<?php
    class ManagerFrequence extends Frequence{

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
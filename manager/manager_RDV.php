<?php
    class ManagerRDV extends RDV{

        public function ajoutRDV($bdd):void{
            try{
                $date = $this->getDateRDV();
                $duree = $this->getHeureRDV();
                $lieu = $this->getLieuRDV();
                $note = $this->getIdNote();

                $req = $bdd->prepare('INSERT INTO RDV (date_RDV, heure_RDV, lieu_RDV, id_note)
                VALUES (?, ?, ?, ?)');

                $req->bindparam(1, $date, PDO::PARAM_STR);
                $req->bindparam(2, $duree, PDO::PARAM_STR);
                $req->bindparam(3, $lieu, PDO::PARAM_STR);
                $req->bindparam(4, $note, PDO::PARAM_INT);
                
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
?>
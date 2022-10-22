<?php
    class ManagerRappel extends Rappel{

        public function ajoutRappel($bdd):void{
            try{
                $date = $this->getDateRappel();
                $duree = $this->getHeureRappel();
                $note = $this->getIdNote();

                $req = $bdd->prepare('INSERT INTO rappels (date_rappel, heure_rappel, id_note)
                VALUES (?, ?, ?)');

                $req->bindparam(1, $date, PDO::PARAM_STR);
                $req->bindparam(2, $duree, PDO::PARAM_STR);
                $req->bindparam(3, $note, PDO::PARAM_INT);
                
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
?>
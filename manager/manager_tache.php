<?php
    class ManagerTache extends tache{

        public function ajoutTache($bdd):void{
            try{
                $date = $this->getDateTache();
                $duree = $this->getDureeTache();
                $note = $this->getIdNote();

                $req = $bdd->prepare('INSERT INTO taches (date_tache, duree_tache, id_note) 
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

        public function voirTacheParNote($bdd):obj{
            try{
                $note = $this->getIdNote();

                $req=$bdd->prepare('SELECT * FROM taches WHERE id_note = ?');

                $req->bindparam(1, $note, PDO::PARAM_INT);
                $req->execute();
                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
<?php

    class ManagerNote extends Note{
        
        public function ajoutNote($bdd):void{
            try{
                $contenu = $this->getContenuNote();
                $date = $this->getDateNote();
                $estTerminer = $this->getEstTerminer();
                $cat = $this->getIdCat();
                $activite = $this->getIdActivite();
                $projet = $this->getIdProjet();
                $compte = $this->getIdCompte();

                $req = $bdd->prepare('INSERT INTO notes(contenu_note, date_note, estTerminer, id_cat, id_activite, id_projet, id_compte)
                VALUES (?, ?, ?, ?, ?, ?, ?)');
                
                $req->bindparam(1, $contenu, PDO::PARAM_STR);
                $req->bindparam(2, $date, PDO::PARAM_STR);
                $req->bindparam(3, $estTerminer, PDO::PARAM_INT);
                $req->bindparam(4, $cat, PDO::PARAM_INT);
                $req->bindparam(5, $activite, PDO::PARAM_INT);
                $req->bindparam(6, $projet, PDO::PARAM_INT);
                $req->bindparam(7, $compte, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function changerCatNote($bdd, $cat_note){
            try{
                $cat = $cat_note;
                $id = $this->getIdNote();

                $req = $bdd->prepare('UPDATE notes SET id_cat = ? WHERE id_note = ?');
                
                $req->bindparam(1, $cat, PDO::PARAM_INT);
                $req->bindparam(2, $id, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
        
        public function modifierNote($bdd){
            try{
                $contenu = $this->getContenuNote();
                $activite = $this->getIdActivite();
                $projet = $this->getIdProjet();
                $note = $this->getIdNote();

                $req = $bdd->prepare('UPDATE notes SET contenu_note = ?, id_activite = ?, id_projet = ? WHERE id_note = ?');
                
                $req->bindparam(1, $contenu, PDO::PARAM_STR);
                $req->bindparam(2, $activite, PDO::PARAM_STR);
                $req->bindparam(3, $projet, PDO::PARAM_STR);
                $req->bindparam(4, $note, PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur' .$e->getMessage());
            }
        }

        function voirDerniereNoteDuCompte($bdd){
            try{
                $compte = $this->getIdCompte();

                $req = $bdd->prepare('SELECT id_note, contenu_note, date_note, estTerminer, id_cat, id_activite, id_projet FROM notes WHERE id_compte = ? ORDER BY id_note DESC LIMIT 1 ');
                
                $req->bindparam(1, $compte, PDO::PARAM_STR);
                $req->execute();

                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        function voirNoteDuCompteParId($bdd){
            try{
                $compte = $this->getIdCompte();
                $id = $this->getIdNote();

                $req = $bdd->prepare('SELECT contenu_note, date_note, estTerminer, id_cat, id_activite, id_projet FROM notes WHERE id_compte = ? AND id_note = ?');

                $req->bindparam(1, $compte, PDO::PARAM_INT);
                $req->bindparam(2, $id, PDO::PARAM_INT);

                $req->execute();
                $data = $req->fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
?>
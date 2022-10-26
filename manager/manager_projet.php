<?php
    class ManagerProjet extends Projet {
        public function ajoutProjet($bdd):void{
            try{
                $nom = $this->getNomProjet();
                $compte = $this->getCompteProjet();
                $activite = $this->getActiviteProjet();

                $req = $bdd->prepare('INSERT INTO projets(nom_projet, id_compte, id_activite)
                VALUES (?, ?, ?)');

                $req->bindParam(1, $nom, PDO::PARAM_STR);
                $req->bindParam(2, $compte, PDO::PARAM_INT);
                $req->bindParam(3, $activite, PDO::PARAM_INT);

                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
        
        public function voirToutProjetParCompte($bdd):array{
            try{
                $compte = $this->getCompteProjet();

                $req = $bdd->prepare('SELECT id_projet, nom_projet, id_activite
                FROM projets
                WHERE id_compte = ?');

                $req->bindParam(1, $compte, PDO::PARAM_INT);

                $req->execute();

                $data = $req->fetchall(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur'.$e->getMessage());
            }
        }

        public function voirProjetParId($bdd):object{
            try{
                $id = $this->getIdProjet();
                $req = $bdd->prepare('SELECT nom_projet
                FROM projets
                WHERE id_projet = ?');

                $req->bindParam(1, $id, PDO::PARAM_INT);

                $req->execute();

                $data = $req->fetch(PDO::FETCH_OBJ);
                return $data;
            } catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
<?php 
    class ManagerActivite extends Activite {
        public function ajoutActivite($bdd):void{
            try{
                $nom = $this->getNomActivite();
                $temps = $this->getTempsActivite();
                $compte = $this->getCompteActivite();
                $freq = $this->getFrequenceActivite();

                $req = $bdd->prepare('INSERT INTO activites(nom_activite, temps_activite, id_compte, id_freq)
                VALUES (?, ?, ?, ?)');

                $req->bindParam(1, $nom, PDO::PARAM_STR);
                $req->bindParam(2, $temps, PDO::PARAM_INT);
                $req->bindParam(3, $compte, PDO::PARAM_INT);
                $req->bindParam(4, $freq, PDO::PARAM_INT);

                $req->execute();
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirToutActiviteParCompte($bdd):array{
            try{
                $compte = $this->getCompteActivite();

                $req = $bdd->prepare('SELECT id_activite, nom_activite, temps_activite, id_compte, intituler_freq 
                FROM activites, frequences 
                WHERE activites.id_freq = frequences.id_freq 
                AND id_compte = ?');

                $req->bindParam(1, $compte, PDO::PARAM_INT);

                $req->execute();
                
                $data = $req->fetchall(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirActiviteParId($bdd):object{
            try{
                $id = $this->getIdActivite();
                $req = $bdd->prepare('SELECT nom_activite
                FROM activites
                WHERE id_activite = ?');

                $req->bindParam(1, $id, PDO::PARAM_INT);

                $req->execute();

                $data = $req->fetch(PDO::FETCH_OBJ);
                return $data;
            } catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }
?>
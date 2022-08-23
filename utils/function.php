<?php

function voirDerniereNote($bdd, $id_compte){
            try{
            $req = $bdd->prepare('SELECT * FROM notes WHERE id_compte = :id ORDER BY id_note DESC LIMIT 1 ');
            $req->execute(array(
                ':id' => $id_compte
            ));
            $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

function netEntrer($input){
    return htmlspecialchars(strip_tags(trim($input)));
}
?>
<?php
    include "./utils/connecteBDD.php";

function voirDerniereNote($bdd, $date){
            try{
            $req = $bdd->prepare('SELECT * FROM notes WHERE date_note = :date_note');
            $req->execute(array(
                ':date_note' => $date
            ));
            $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
?>
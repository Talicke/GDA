<?php
    class Compte{
        private $id_compte;
        private $mail_compte;
        private $mdp_compte;
        private $cle_compte;
        private $isAuth;
        public function __construct($id, $mail, $mdp, $cle)
        {
            $this -> id_compte = $id;
            $this -> mail_compte = $mail;
            $this -> mdp_compte = $mdp;
            $this -> cle_compte = $cle;
        }
        // GETTER
        public function getIdProd():int{
            return $this -> id_prod;
        }
        public function getNomProd():string{
            return $this -> nom_prod;
        }
        public function getIngredientProd():string{
            return $this -> ingredient_prod;
        }
        public function getPrixProd():float{
            return $this -> prix_prod;
        }
        public function getCatProd():string{
            return $this -> cat_prod;
        }
        // SETTER
        public function setIdProd($id):void{
            $this -> id_prod = $id;
        }
        public function setnomProd($nom):void{
            $this -> nom_prod = $nom;
        }
        public function setIngredientProd($ingredient):void{
            $this -> ingredient_prod = $ingredient;
        }
        public function setPrixProd($prix):void{
            $this -> prix_prod = $prix;
        }
        public function setCatProd($cat):void{
            $this -> cat_prod = $cat;
        }
        // Méthodes
        public function showProduitByCat($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM (produits) WHERE (cat_prod = :cat)');
                $req->execute(array(
                    ':cat' => $this -> getCatProd(),
                ));
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
        }
    }
}
?>
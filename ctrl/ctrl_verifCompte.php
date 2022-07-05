<?php 
include "./utils/connecteBDD.php";
include "./model/model_compte.php";

if (!isset($_GET['id']) && !isset($_GET['key'])){
    echo "aucun compte à vérifier";
}else{
    echo "je vérifie le compte";
}
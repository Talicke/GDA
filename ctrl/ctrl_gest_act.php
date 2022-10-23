<?php

include "./utils/connecteBDD.php";
include './Model/model_frequence.php';
include './manager/manager_frequence.php';
include './Model/model_activite.php';
include './manager/manager_activite.php';

$freq = new managerFrequence(null, null);
$freqs = $freq->voirToutFreq($bdd);

// foreach($freqs as $value){
//     echo '<option value='.$value->id_freq.'>'.$value->intituler_freq.'</option>';
// }

// echo "
// </select>
// <button type='submit' name='nouvActi'>+</button>
// </form>";

$act = new ManagerActivite(null, null, $_SESSION['id'], null);
$activites = $act->voirToutActiviteParCompte($bdd);
// var_dump($activites);
// foreach($activites as $value){
//     echo '<div>Nom : '.$value->nom_activite.' temps : '.$value->temps_activite.'H '.$value->intituler_freq.'</div>';
// }

// echo "</div>";

if(isset($_POST['nouvActi'])){
    $activite = new ManagerActivite($_POST['nomActivite'], $_POST['tempsActivite'], $_SESSION['id'], $_POST['selectFreq']);
    $activite -> ajoutActivite($bdd);
}

?>
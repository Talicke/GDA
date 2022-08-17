<?php

    include "./utils/connecteBDD.php";
    include './Model/model_frequence.php';
    include './Model/model_activite.php';
    include './view/view_compte.html';

    $freq = new Frequence(null, null);
    $freqs = $freq->voirToutFreq($bdd);
    

    echo "<div>
    <form method='POST' action = ''>
    <input type='text' name='nomActivite' id='' placeholder='Créez une nouvelle activité'>
    <input type='text' name='tempsActivite' id='' placeholder='En heure'>
    <select name='selectFreq' id='selectFreq'>";
    foreach($freqs as $value){
        echo '<option value='.$value->id_freq.'>'.$value->intituler_freq.'</option>';
    }

    echo "
    </select>
    <button type='submit' name='nouvActi'>+</button>
    </form>";

    $act = new Activite(null, null, null, null);
    $activites = $act->voirToutActivite($bdd);
    foreach($activites as $value){
        echo '<div>Nom : '.$value->nom_activite.' temps : '.$value->temps_activite.' freq : '.$value->id_freq.'</div>';
    }

    echo "</div>";

    if(isset($_POST['nouvActi'])){
        $activite = new Activite($_POST['nomActivite'], $_POST['tempsActivite'], $_SESSION['id'], $_POST['selectFreq']);
        $activite -> ajoutActivite($bdd);
    }
    
?>
<?php
    include './utils/connecteBDD.php';
    include './Model/model_activite.php';
    include './Model/model_projet.php';
    include './view/view_gest_proj.html';

    $activite = new Activite(null, null, $_SESSION['id'], null);
    $activites = $activite->voirToutActiviteParCompte($bdd);

    foreach($activites as $value){
        echo '<option value='.$value->id_activite.'>'.$value->nom_activite.'</option>';
    }

    echo "
    </select>
    <input type='submit' name='addProj' value='+'>
    </form>";

    if(isset($_POST['addProj'])){
        $projet = new Projet ($_POST['nomProj'], $_SESSION['id'], $_POST['selectAct']);
        $projet->ajoutProjet($bdd);
    }


?>
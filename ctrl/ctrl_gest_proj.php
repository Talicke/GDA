<?php
    include './utils/connecteBDD.php';
    // include './Model/model_activite.php';
    include './Model/model_projet.php';
    include './manager/manager_projet.php';
    // include './view/view_gest_proj.html';

    $projet = new ManagerProjet(null, null, $_SESSION['id'], null);
    $projets = $projet->voirToutProjetParCompte($bdd);

    // foreach($activites as $value){
    //     echo '<option value='.$value->id_activite.'>'.$value->nom_activite.'</option>';
    // }

    // echo "
    // </select>
    // <input type='submit' name='addProj' value='+'>
    // </form>";

    if(isset($_POST['addProj'])){
        $projet = new Projet ($_POST['nomProj'], $_SESSION['id'], $_POST['selectAct']);
        $projet->ajoutProjet($bdd);
    }


?>
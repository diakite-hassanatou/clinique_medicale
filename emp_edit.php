<?php
require_once 'data/_data.php';
require_once 'utils/_proc.php';
$emp_id = 102; // Employé "par défaut"
// TODO: Lire et mettre à jour l'id de l'employé en Query string
    if(array_key_exists(PARAM_EMP_ID,$_GET)){

        $emp_id = $_GET[PARAM_EMP_ID];

    }

$liste_employes = get_employes(); // Liste des noms de tous les employés
$emp_data = $liste_employes[$emp_id];
$agenda = get_agenda($emp_id);
$activites = get_activites();

if(array_key_exists('submit_form ', $_POST)) {

    $agenda['08'] = $activites[$_POST['08']];
    $agenda['09'] = $activites[$_POST['09']];
    $agenda['10'] = $activites[$_POST['10']];
    $agenda['11'] = $activites[$_POST['11']];
    $agenda['12'] = $activites[$_POST['12']];
    $agenda['13'] = $activites[$_POST['13']];
    $agenda['14'] = $activites[$_POST['14']];
    $agenda['15'] = $activites[$_POST['15']];
    set_agenda($emp_id, $agenda);
    header('Location: index.php?' . PARAM_EMP_ID . '=' . $emp_id);
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8" />
    <title>Agenda Cabinet Médical</title>
</head>
<body>
<?php require_once('view_bloc/_view_header.php') ?>
<h2>Activité de l'employé <?php echo $emp_data['emp_name'] ?> </h2>

<div id="form_agenda">
    <form name="agenda_form" method="post">
        <div>
            <label for="08">08H</label>
            <select id="08" name="08">
                <?= html_options_activites(get_activites(),$agenda['08'])?>
            </select>
         </div>

        <div>
            <label for="09">09H</label>
            <select id="09" name="09">
                <?= html_options_activites(get_activites(),$agenda['09'])?>
            </select>
        </div>

        <div>
            <label for="10">10H</label>
            <select id="10" name="10">
                <?= html_options_activites(get_activites(),$agenda['10'])?>
            </select>
        </div>

        <div>
            <label for="11">11H</label>
            <select id="11" name="11">
                <?= html_options_activites(get_activites(),$agenda['11'])?>
            </select>
        </div>

        <div>
            <label for="12">12H</label>
            <select id="12" name="12">
                <?= html_options_activites(get_activites(),$agenda['12'])?>
            </select>
        </div>

        <div>
            <label for="13">13H</label>
            <select id="13" name="13">
                <?= html_options_activites(get_activites(),$agenda['13'])?>
            </select>
        </div>

        <div>
            <label for="14">14H</label>
            <select id="14" name="14">
                <?= html_options_activites(get_activites(),$agenda['14'])?>
            </select>
        </div>

        <div>
            <label for="15">15H</label>
            <select id="15" name="15">
                <?= html_options_activites(get_activites(),$agenda['15'])?>
            </select>
        </div>

    </form>

        
</body>
</html>
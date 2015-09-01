<?php 
require_once 'data/_data.php';
$emp_id = 102; // Employé "par défaut"
// TODO: Lire et mettre à jour l'id de l'employé en Query string


$liste_employes = get_employes(); // Liste des noms de tous les employés
$emp_data = $liste_employes[$emp_id];
$agenda = get_agenda($emp_id);
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
	<div id="agenda">
		<table>
			<tr><th>Heure</th><th>Activité</th></tr>

<?php
	//var_dump($_GET);
// TODO: Afficher l'agenda de l'employé
foreach ( $agenda as $heure => $activite ) {
	echo '<tr><th>', $heure ,'</th><th>', $activite,'</th></tr>';
}
	echo $emp_data['emp_name'];

?>
		</table>
	</div>
    <?php require_once('view_bloc/_view_footer.php') ?>
</body>
</html>
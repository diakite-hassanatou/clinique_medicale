
<link


<header>
    <div id="logo"></div>
    <div id="nom_clinique"><span><?php echo 'Gestion agendas de la ' , NOM_CLINIQUE; ?></span></div>
    <div id="menu">
        <ul>
            <?php
            // TODO: Afficher le menu-liste des employés
            foreach ($liste_employes as $id => $data) {
                echo '<li><a href="?', PARAM_EMP_ID,'=', $id, '">', $data['emp_name'], '</a></li>';
            }
            ?>
        </ul>
    </div>

</header>
<?php
require_once 'data/_fileDB.php';

define('PARAM_EMP_ID',      'emp_id'); //
define('PARAM_EMP_NAME',    'emp_name'); //
define('PARAM_EMP_TYPE',    'emp_type'); //

define('NOM_CLINIQUE', 'Clinique médicale Tremblay-Zintohl-Müller');


define('EMPL_TYPE_MEDECIN', 'Médecin');
define('EMPL_TYPE_INFIRMIER', 'Infirmier');
define('EMPL_TYPE_ADMIN', 'Personnel administratif');
/**
 * Les activités de la clinique (les activités suivies de _MDC sont en lien avec les clients et leurs dossiers
 */
define('ACT_CONSULT_MDC', 'Consultation');          // Consulation
define('ACT_FORM_CONSEIL', 'Formation et conseil'); // Formation et conseil médical
define('ACT_REUNION_MDC', 'Réunion Médicale');      // Réunion médicale
define('ACT_PANNING', 'Planification');             // Planification clinique
define('ACT_DOSSIERS_MDC', 'Dossiers médicaux');    // Gestion des dossiers médicaux des clients
define('ACT_GESTION', 'Gestion clinique');          // Gestion clinique et comptabilité
define('ACT_HORS', 'Hors');                         // Hors clinique

function get_employes()
{
    return array(
        '102' => array('emp_name'=>'Bernard',   'emp_type' => EMPL_TYPE_INFIRMIER),
        '136' => array('emp_name'=>'Tremblay',  'emp_type' => EMPL_TYPE_MEDECIN),
        '025' => array('emp_name'=>'Zintohl',   'emp_type' => EMPL_TYPE_MEDECIN),
        '082' => array('emp_name'=>'Müller',    'emp_type' => EMPL_TYPE_MEDECIN),
        '045' => array('emp_name'=>'Abenassis', 'emp_type' => EMPL_TYPE_ADMIN),
    );
}

/*
 * Retourne la liste de toutes les activités possibles
 */
function get_activites() {
	return array(
        ACT_CONSULT_MDC,
        ACT_FORM_CONSEIL,
        ACT_REUNION_MDC,
        ACT_PANNING,
        ACT_DOSSIERS_MDC,
        ACT_GESTION,
        ACT_HORS,
	);
}


$fixture = array(
    '102' => array(
        '08' => ACT_CONSULT_MDC,
        '09' => ACT_CONSULT_MDC,
        '10' => ACT_DOSSIERS_MDC,
        '11' => ACT_DOSSIERS_MDC,
        '12' => ACT_HORS,
        '13' => ACT_FORM_CONSEIL,
        '14' => ACT_PANNING,
        '15' => ACT_PANNING,
    ),
    '136' => array(
        '08' => ACT_DOSSIERS_MDC,
        '09' => ACT_CONSULT_MDC,
        '10' => ACT_CONSULT_MDC,
        '11' => ACT_CONSULT_MDC,
        '12' => ACT_HORS,
        '13' => ACT_FORM_CONSEIL,
        '14' => ACT_CONSULT_MDC,
        '15' => ACT_PANNING,
    ),
    '025' => array(
        '08' => ACT_DOSSIERS_MDC,
        '09' => ACT_PANNING,
        '10' => ACT_CONSULT_MDC,
        '11' => ACT_CONSULT_MDC,
        '12' => ACT_HORS,
        '13' => ACT_FORM_CONSEIL,
        '14' => ACT_CONSULT_MDC,
        '15' => ACT_CONSULT_MDC,
    ),
    '082' => array(
        '08' => ACT_DOSSIERS_MDC,
        '09' => ACT_CONSULT_MDC,
        '10' => ACT_CONSULT_MDC,
        '11' => ACT_CONSULT_MDC,
        '12' => ACT_HORS,
        '13' => ACT_FORM_CONSEIL,
        '14' => ACT_CONSULT_MDC,
        '15' => ACT_PANNING,
    ),
    '045' => array(
        '08' => ACT_PANNING,
        '09' => ACT_PANNING,
        '10' => ACT_HORS,
        '11' => ACT_HORS,
        '12' => ACT_HORS,
        '13' => ACT_FORM_CONSEIL,
        '14' => ACT_DOSSIERS_MDC,
        '15' => ACT_DOSSIERS_MDC,
    ),
);


/*
 * Retourne un agenda d'un employé
 */
function get_agenda($emp_id) {
    $agendas = read_agendas();
    return $agendas[$emp_id];
}

/*
 * Écrit un agenda d'un employé
 */
function set_agenda($emp_id, $agenda) {
    $agendas = read_agendas();
    $agendas[$emp_id] = $agenda;
    write_agendas($agendas);
}
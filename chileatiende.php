<?php

/*
  Plugin Name: ChileAtiende
  Plugin URI: https://github.com/jdgarrido/chileatiende
  Description: Retorna las fichas de una institución publicadas en el portal Chileatiende.cl
  Author: José Damián Garrido
  Version: 1.0
  Author URI: http://www.josegarrido.net
  License: Copyleft
 */

function chileatiende_admin_action() {
    add_management_page("ChileAtiende", "ChileAtiende", 1, "chileatiende", "chileatiende_configuracion");
}

add_action('admin_menu', 'chileatiende_admin_action');

function chileatiende_configuracion() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    
    $msj = '';
    $msj_class = '';

    if ($_POST['chileatiende_update']) {
        ( $_POST[cha_access_token] ) ? update_option('cha_access_token', $_POST[cha_access_token]) : update_option('cha_access_token', '');
        if ($_POST[cha_access_token]) {
            ($_POST[cha_servicio]) ? update_option('cha_servicio', $_POST[cha_servicio]) : update_option('cha_servicio', 0);
            ($_POST[cha_fichas]) ? update_option('cha_fichas', $_POST[cha_fichas]) : update_option('cha_fichas', '');
            ($_POST[cha_nrofichas]) ? update_option('cha_nrofichas', $_POST[cha_nrofichas]) : update_option('cha_nrofichas', 0);
            
            $msj = 'Datos actualizados correctamente :)';
            $msj_class = 'updated';
        }
    }

    include "chileatiende-form-config.php";
}

function chileatiende_getServicios($access_token) {
    $aInstituciones = file_get_contents('https://www.chileatiende.cl/api/servicios/' . '?access_token=' . $access_token);
    $aInstituciones = json_decode($aInstituciones);

    return $aInstituciones;
}

function chileatiende_fichasportada() {
    $elServicio = (get_option('cha_servicio')) ? get_option('cha_servicio') : 0;
    $lasFichas = (get_option('cha_fichas')) ? get_option('cha_fichas') : '';
    $nroFichas = (get_option('cha_nrofichas')) ? get_option('cha_nrofichas') : 0;

    if (is_front_page()) {
        if ($elServicio) {
            //echo 'https://www.chileatiende.cl/api/servicios/' . $elServicio . '/fichas' . '?access_token=' . get_option('cha_access_token');
            $aFichasServicio = file_get_contents('https://www.chileatiende.cl/api/servicios/' . $elServicio . '/fichas' . '?access_token=' . get_option('cha_access_token'));
            $aFichasServicio = json_decode($aFichasServicio);
        }

        include "chileatiende-fichas-portada.php";
    }
}

<?php

/**
 * Plugin Name: Ritiro in Sede
 */

if(!defined('WPINC')){
     die;
 }

define('RIS_PLUGIN_MAIN_FILE', __FILE__);

define('RIS_PLUGIN_URL', plugin_dir_url(__FILE__));

define('RIS_PLUGIN_DIR', plugin_dir_path(__FILE__));

//base includes

include_once RIS_PLUGIN_DIR . 'inc/base/ris-activate-plugin.php';

include_once RIS_PLUGIN_DIR . 'inc/base/ris-deactivate-plugin.php';

//enqueue includes

include_once RIS_PLUGIN_DIR . 'inc/enqueue/ris_enqueue.php';

//wc checkouts

include_once RIS_PLUGIN_DIR . 'inc/wc-checkouts/ris_wc_checkouts.php';

//custom emails

include_once RIS_PLUGIN_DIR . 'inc/custom-emails/ris_custom_emails.php';


<?php

function ris_scripts_enqueue(){
    wp_enqueue_style('ris_style', RIS_PLUGIN_URL . '/css/ris_style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('ris_script',RIS_PLUGIN_URL . '/js/js_script.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'ris_scripts_enqueue');
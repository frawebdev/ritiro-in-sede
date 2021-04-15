<?php

add_filter( 'woocommerce_checkout_fields' , 'ritiro_in_sede_fields' );

// Our hooked in function – $fields is passed via the filter!
function ritiro_in_sede_fields( $fields ) {

	$sedi_di_ritiro = array(
		'Scegli'			=> 'Scegli la tua sede di ritiro',
		'Torino, Corso Filippo Turati, 15'				=> 'Torino, Corso Filippo Turati, 15',
		'Milano, Corso Sempione, 11'					=> 'Milano, Corso Sempione, 11',
		"Milano, Via Bartolomeo D'Alviano, 55"			=> "Milano, Via Bartolomeo D'Alviano, 55",
		'Chioggia, Via Granatieri di Sardegna, 1371'	=> 'Chioggia, Via Granatieri di Sardegna, 1371',
		//'Bergamo'										=> 'Bergamo',
		'Genova, Via de Marini, 1'						=> 'Genova, Via de Marini, 1',
		'Bologna, Via Alfieri Maserati, 5'				=> 'Bologna, Via Alfieri Maserati, 5',
		'Riccione, Via Empoli, 29'						=> 'Riccione, Via Empoli, 29',
		"Padova, Viale dell'Industria, 23b"				=> "Padova, Viale dell'Industria, 23b",
		'Verona, Via Colonnello Giovanni Fincato, 12'	=> 'Verona, Via Colonnello Giovanni Fincato, 12',
		'Parma, Via la Spezia, 90'						=> 'Parma, Via la Spezia, 90',
		'Brescia, Via Parenzo, 6'						=> 'Brescia, Via Parenzo, 6',
		'Roma Eur, Via Andrea Millevoi, 69'				=> 'Roma Eur, Via Andrea Millevoi, 69',
		'Roma Bufalotta, Largo Luchino Visconti, 20'	=> 'Roma Bufalotta, Largo Luchino Visconti, 20',
		'Firenze, Via Lungo Il Mugnone, 52'				=> 'Firenze, Via Lungo Il Mugnone, 52',
		'Pescara, Corso Vittorio Emanuele II, 190'		=> 'Pescara, Corso Vittorio Emanuele II, 190',
		'Cagliari, Via Giuseppe Biasi, 25'				=> 'Cagliari, Via Giuseppe Biasi, 25',
		'Tivoli, Via del Barco, 6, Tivoli Terme'		=> 'Tivoli, Via del Barco, 6, Tivoli Terme',
		'Napoli Vomero, Via Giacomo Puccini, 25'		=> 'Napoli Vomero, Via Giacomo Puccini, 25',
		'Napoli, Via Toledo 116'						=> 'Napoli, Via Toledo 116',
		'Bari, Via Nicolò Putignani, 264'				=> 'Bari, Via Nicolò Putignani, 264',
		//'Salerno'			=> 'Salerno',
		//'Palermo'			=> 'Palermo',
		//'Catania'			=> 'Catania',

	);

     $fields['billing']['billing_check_ris'] = array(
    'label'     => __('Effettua il ritiro in sede', 'be-better'),
    'placeholder'   => _x('Ritiro in sede', 'placeholder', 'be-better'),
    'required'  => false,
	'type'		=> 'checkbox',
    'class'     => array('form-row-wide bb-ris'),
    'clear'     => true,
	'priority'	=> 90
     );

	$fields['billing']['billing_choose_ris'] = array(
	'label'     => __("Scegli la sede da cui ritirare l'ordine", 'be-better'),
	'placeholder'   => _x('Sede di ritiro', 'placeholder', 'be-better'),
	'required'  => false,
	'type'		=> 'select',
	'options'	=> $sedi_di_ritiro,
	'class'     => array('form-row-wide', 'hide'),
	'clear'     => true,
	'priority'	=> 91
	);

    return $fields;
}

add_filter( 'woocommerce_form_field' , 'elex_remove_checkout_optional_text', 10, 4 );
function elex_remove_checkout_optional_text( $field, $key, $args, $value ) {
if( is_checkout() && ! is_wc_endpoint_url() ) {
$optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
$field = str_replace( $optional, '', $field );
}
return $field;
} 
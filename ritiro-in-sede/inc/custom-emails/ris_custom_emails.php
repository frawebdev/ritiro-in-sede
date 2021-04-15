<?php

function bb_send_order_to_studio($order_id){
	
	$order = new WC_Order($order_id);
	
	$bb_payment_method = $order->get_payment_method_title();
	$bb_studio = get_post_meta($order->get_id(), '_billing_choose_ris', true);
	
	//message
	$order_id = $order->get_id();
	$billing_first_name = $order->get_billing_first_name();
	$billing_last_name = $order->get_billing_last_name();
	$billing_address_1 = $order->get_billing_address_1();
	$billing_address_2 = $order->get_billing_address_2();
	$billing_city = $order->get_billing_city();
	$billing_state = $order->get_billing_state();
	$billing_postcode = $order->get_billing_postcode();
	$billing_country = $order->get_billing_country();
	$billing_email = $order->get_billing_email();
	$billing_phone = $order->get_billing_phone();
	
	
	if($bb_payment_method == 'Pagamento alla consegna'){
	switch($bb_studio) {
			case 'Torino, Corso Filippo Turati, 15':
			$to_name = 'torino';
			break;
			
			case 'Milano, Corso Sempione, 11':
			$to_name = 'milanosempione';
			break;
			
			case "Milano, Via Bartolomeo D'Alviano, 55";
			$to_name = 'milano';
			break;

			case "Chioggia, Via Granatieri di Sardegna, 1371";
			$to_name = 'chioggia';
			break;

			case "Genova, Via de Marini, 1";
			$to_name = 'genova';
			break;

			case "Bologna, Via Alfieri Maserati, 5";
			$to_name = 'bologna';
			break;

			case "Riccione, Via Empoli, 29";
			$to_name = 'riccione';
			break;

			case "Padova, Viale dell'Industria, 23b";
			$to_name = 'padova';
			break;

			case "Verona, Via Colonnello Giovanni Fincato, 12";
			$to_name = 'verona';
			break;

			case "Parma, Via la Spezia, 90";
			$to_name = 'parma';
			break;

			case "Brescia, Via Parenzo, 6";
			$to_name = 'brescia';
			break;

			case "Roma Eur, Via Andrea Millevoi, 69";
			$to_name = 'romaeur';
			break;

			case "Roma Bufalotta, Largo Luchino Visconti, 20";
			$to_name = 'roma';
			break;

			case "Firenze, Via Lungo Il Mugnone, 52";
			$to_name = 'firenze';
			break;

			case "Pescara, Corso Vittorio Emanuele II, 190";
			$to_name = 'pescara';
			break;

			case "Cagliari, Via Giuseppe Biasi, 25";
			$to_name = 'cagliari';
			break;

			case "Tivoli, Via del Barco, 6, Tivoli Terme";
			$to_name = 'info';
			break;

			case "Napoli Vomero, Via Giacomo Puccini, 25";
			$to_name = 'napoli';
			break;

			case "Napoli, Via Toledo 116";
			$to_name = 'napolitoledo';
			break;

			case "Bari, Via Nicolò Putignani, 264";
			$to_name = 'bari';
			break;

			default: 
			'info';
		} 
		
	$to = $to_name . '@fitnesscoachingfusco.it';
	$subject = 'Nuovo ordine per ' . $bb_studio;
	
	//dati utente
	$message = '<section>';
	$message .= '<h3> Numero Ordine: ' . $order_id . '</h3></br>';
	$message .= '<h3>Cliente: ' . $billing_first_name . ' ' . $billing_last_name . '</h3></br>';
	$message .= '<p>Indirizzo: ' . $billing_address_1 . ' ' . $billing_address_2 . '</p></br>';
	$message .= '<p>Città: ' . $billing_city . ' </p></br>';
	$message .= '<p>Provincia: ' . $billing_state . '</p></br>';
	$message .= '<p>CAP: ' . $billing_postcode . '</p></br>';
	$message .= '<p>Paese: ' . $billing_country . '</p></br>';
	$message .= '<p>Email: ' . $billing_email . '</p></br>';
	$message .= '<p>Telefono: ' . $billing_phone . '</p>';
	$message .= '</section>';
	
	//prodotti
	$message .= '<section>';
	$message .= '<h1>ORDINE</h1></br>';
	
	foreach ( $order->get_items() as $item_id => $item ) {
	   $name = $item->get_name();
	   $quantity = $item->get_quantity();
	   $subtotal = $item->get_subtotal();
	   $total = $item->get_total();
	   $allmeta = $item->get_meta_data();
	   $type = $item->get_type();
	   
	$message .= '<div style="margin: 5px; padding: 5px; border: solid 2px black;">';
	$message .= '<p>Prodotto: ' .  $name . '</p></br>';
	$message .= '<p>Quantità: ' . $quantity . '</p></br>';
	$message .= '<p>Totale: ' . $total . '</p>';
	$message .= '</div>';
	 
	}
	
	$message .= '</section>';
	
	//totale
	$message .= '<section>';
	$message .= '<h2>TOTALE</h2>';
	$message .= $order->get_total();
	$message .= '</section>';
		
	wp_mail( $to , 'Nuovo ordine per ' . $bb_studio, $message);
		
	} 
	
}

add_action('woocommerce_checkout_order_processed', 'bb_send_order_to_studio');

/*
* email content type
*/

remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {

    return 'text/html';
}

/**
 * send studio address inside emails
 */

function bb_studio_address($order){
	$checked_studio = get_post_meta($order->get_id(), '_billing_check_ris', true);
	$studio_result = get_post_meta($order->get_id(), '_billing_choose_ris', true);

	if($checked_studio == 1){
		echo 'Puoi ritirare il tuo ordine presso: ' . $studio_result;
	}
} 

 add_action('woocommerce_email_order_details', 'bb_studio_address');

 /**
  * send studio address inside thank you page
  */

  add_filter('woocommerce_thankyou_order_received_text', 'bb_address_msg', 10, 2 );
function bb_address_msg( $str, $order ) {
	$checked_studio = get_post_meta($order->get_id(), '_billing_check_ris', true);
	$studio_result = get_post_meta($order->get_id(), '_billing_choose_ris', true);

	if($checked_studio == 1){
		$new_str = $str . ' Puoi ritirare il tuo ordine presso: ' . $studio_result;
		return $new_str;
	} else {
		return $str;
	}


}
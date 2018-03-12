<?php 
function render_html_emails( $html_message, $phpmailer ) {
	if ( ! is_callable( 'CampTix_Plugin::sanitize_format_html_message' ) ) {
		return $html_message;
	}

	ob_start();
	echo \CampTix_Plugin::sanitize_format_html_message( $phpmailer->Body );
	$html_message = ob_get_clean();

	return $html_message;
}

add_filter( 'camptix_html_message', 'render_html_emails', 10, 2 );


add_shortcode( 'ticket_number', array( $this, 'email_template_shortcode_ticket_number' ) );
function email_template_shortcode_ticket_number( $atts ) {
	if ( $this->tmp( 'attendee_id' ) )
		return "ANYPREFIX-".$this->tmp( 'attendee_id' );
}

?>

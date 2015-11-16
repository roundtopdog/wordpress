<?php
	global $wp_customize;

	$default_class = '';

	/* WP CUSTOMIZE */
	if( isset( $wp_customize ) ){
		$default = true;
		$default_class = !(bool)mythemes_mod( 'default-content', true ) ? 'hidden' : '';
	}

	/* FRONTEND */
	else{
		$default = (bool)mythemes_mod( 'default-content', true );
	}

	/* SIDEBAR */
    if ( dynamic_sidebar( 'footer-second' ) ){
        /* IF NOT EMPTY */    
    }

    else if( $default ){
        echo '<div class="widget widget_text mythemes-default-content ' . esc_attr( $default_class ) . '">';
        echo '<h5>' . __( 'Address' , 'treeson' ) . '</h5>';
        echo '<div class="textwidget">' . sprintf( __( '1 Infinite Loop %s Cupertino, CA 95014 %s United States' , 'treeson' ) , '<br/>' , '<br/>' ) . '</div>';
        echo '</div>';
    }
?>
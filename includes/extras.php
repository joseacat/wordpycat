<?php

/**
 * Pinta el logo o la cabecera si no está la imagen configurada
 */
function pintar_logo(){
    $texto = '';
    $logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($logo_id, 'full');
    if(has_custom_logo()){
        $texto = '<img src="' . esc_url($logo[0]) . '">';
	}else{
        $texto = '<h1>' . get_bloginfo( 'name' ) .  '</h1>';
	}
    return $texto;
}

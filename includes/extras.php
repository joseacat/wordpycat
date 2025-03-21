<?php

/**
 * Print logo
 */
function print_logo()
{
    $texto = '';
    $logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($logo_id, 'full');
    if (has_custom_logo()) {
        $texto = '<img src="' . esc_url($logo[0]) . '">';
    } else {
        $texto = '<span>' . get_bloginfo('name') .  '</span>';
    }
    return $texto;
}

<?php

/**
 * Register menu for theme
 */
function menu_register()
{
    register_nav_menus([
        "main-menu" => __("Main menu", BISIESTHEME_SLUG),
        "footer-menu" => __("Footer menu", BISIESTHEME_SLUG),
        "second-menu" => __("Second menu", BISIESTHEME_SLUG),
        "ctas-menu" => __("CTAs menu", BISIESTHEME_SLUG),
    ]);
}
add_action("init", "menu_register");

/**
 * Add class 'item-megamenu' to element with submenu
 * @param $items
 * @param $args
 * @return mixed
 */
function my_wp_nav_menu_objects($items, $args)
{
    if ($args->theme_location === "main-menu") {
        foreach ($items as &$item) {
            $submenu_active = get_field("active_submenu", $item);
            if ($submenu_active) {
                $item->classes[] = "item-megamenu";
            }
        }
    }
    return $items;
}
add_filter("wp_nav_menu_objects", "my_wp_nav_menu_objects", 10, 2);

/**
 * Register widgets for theme
 */
function widgets_register()
{
    register_sidebar([
        "name" => __("Footer top", BISIESTHEME_SLUG),
        "id" => "footer-top",
        "description" => __("Footer top.", BISIESTHEME_SLUG),
        "class" => "footer-top custom-sidebar",
        "before_widget" => '<li id="%1$s" class="widget %2$s">',
        "after_widget" => "</li>",
        "before_title" => "<p>",
        "after_title" => "</p>",
    ]);
}
add_action("widgets_init", "widgets_register");

/**
 * Customize theme
 */
function customize_bisiestheme()
{
    // Allow alignwide and fullalign Gutenberg
    add_theme_support("align-wide");
    // Allow post-thumbnail
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support('custom-logo');
}
add_action("after_setup_theme", "customize_bisiestheme");

/**
 * Add preload to CSS files
 */
function agregar_rel_preload($html, $handle, $href, $media)
{
    if (is_admin()) {
        return $html;
    }
    $assets = ["wp-block-library"];
    if (!in_array($handle, $assets)) {
        return $html;
    }
    $html = <<<EOT
<link rel='preload' as='style' id='$handle' href='$href' type='text/css' media='$media' />
EOT;
    return $html;
}
add_filter("style_loader_tag", "agregar_rel_preload", 10, 4);

/**
 * Remove unnecessary links from the head
 */
function remove_headlinks()
{
    remove_action("wp_head", "wp_generator");
    remove_action("wp_head", "rsd_link");
    remove_action("wp_head", "print_emoji_detection_script", 7);
    remove_action("wp_print_styles", "print_emoji_styles");
    remove_filter("wp_mail", "wp_staticize_emoji_for_email");
}
add_action("init", "remove_headlinks");

/**
 * Allow SVG images
 */
function allow_svg($mimes = [])
{
    $mimes["svg"] = "image/svg+xml";
    $mimes["svgz"] = "image/svg+xml";
    return $mimes;
}
add_filter("upload_mimes", "allow_svg");

/**
 * Separated assets block
 */
add_filter("should_load_separate_core_block_assets", "__return_true");

/**
 * Custom styles for Gutenberg blocks
 */
function custom_gutenberg_styles()
{
    wp_enqueue_script(
        "custom-gutenberg-styles",
        get_template_directory_uri() . "/assets/js/custom-block.js",
        ["wp-blocks", "wp-dom-ready"],
        null,
        true
    );
}
add_action("enqueue_block_editor_assets", "custom_gutenberg_styles");

function custom_button_icon_block_extension()
{
    wp_enqueue_script(
        "custom-button-icon-extension",
        get_template_directory_uri() . "/assets/js/block-button-extension.js",
        ["wp-blocks", "wp-element", "wp-edit-post", "wp-components", "wp-editor", "wp-compose"],
        null,
        true
    );
}
add_action("enqueue_block_editor_assets", "custom_button_icon_block_extension");
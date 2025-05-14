<?php
if (!defined('ABSPATH')) {
    exit;
}

class Theme_Blocks {

    private $namespace = 'wordpycat';
    private $blocks = [
        'hero'
    ];

    public function __construct() {
        add_action('acf/init', [$this, 'register_acf_blocks']);
        add_action('init', [$this, 'register_block_category']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_block_assets']);
        add_action('acf/include_fields', [$this, 'include_acf_fields']);
    }

    public function register_block_category() {
        add_filter('block_categories_all', function($categories) {
            array_unshift($categories, [
                'slug'  => $this->namespace,
                'title' => __('Bloques del tema', BISIESTHEME_SLUG),
            ]);
            return $categories;
        });
    }

    public function register_acf_blocks() {
        foreach ($this->blocks as $block) {
            $template_path = get_template_directory() . "/blocks/{$block}/template.php";

            if (!file_exists($template_path)) {
                continue;
            }

            acf_register_block_type([
                'name'              => "{$this->namespace}-{$block}",
                'title'             => ucfirst($block),
                'description'       => "Custom block: {$block}",
                'render_template'   => $template_path,
                'category'          => $this->namespace,
                'icon'              => 'layout',
                'mode'              => 'preview', //preview
                'supports'          => [
                    'align' => true,
                    'mode'  => true,
                    'jsx'   => true,
                ],
                'api_version' => 2,
                'enqueue_style'     => get_template_directory_uri() . "/blocks/{$block}/styles.css",
                'enqueue_script'    => file_exists(get_template_directory() . "/blocks/{$block}/script.js")
                    ? get_template_directory_uri() . "/blocks/{$block}/script.js"
                    : '',
            ]);
        }
    }

    public function enqueue_block_assets() {
        // Aquí puedes registrar estilos globales si hiciera falta
    }

    public function include_acf_fields() {
        foreach ($this->blocks as $block) {
            $fields_path = get_template_directory() . "/blocks/{$block}/fields.php";
            if (file_exists($fields_path)) {
                include $fields_path;
            }
        }
    }
}

// Init
new Theme_Blocks();
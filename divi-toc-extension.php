<?php
/*
Plugin Name: Divi Table of Contents Module
Description: Adds a Table of Contents module based on H2 tags.
Version: 1.1
Author: Marco Alvarado 7Pixel
*/

function divi_toc_enqueue_scripts() {
    wp_enqueue_script('divi-toc-frontend', plugin_dir_url(__FILE__) . 'includes/frontend.js', array('jquery'), '1.1', true);
    wp_enqueue_style('divi-toc-styles', plugin_dir_url(__FILE__) . 'includes/styles.css', array(), '1.1');
}

add_action('wp_enqueue_scripts', 'divi_toc_enqueue_scripts');

function divi_custom_load_module_toc() {
    if(class_exists("ET_Builder_Module")) {
        class ET_Builder_Module_TOC extends ET_Builder_Module {
            function init() {
                $this->name = __('Table of Contents', 'et_builder');
                $this->slug = 'et_pb_toc';
            }

            function render($attrs, $content = null, $render_slug) {
                // The module's HTML output will be handled by frontend.js
                return '<div class="divi-toc"></div>';
            }
        }
        new ET_Builder_Module_TOC();
    }
}

add_action('et_builder_ready', 'divi_custom_load_module_toc');
?>

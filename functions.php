<?php
/**
 * PratikWP Child Theme fonksiyonları ve tanımları.
 *
 * @package PratikWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Doğrudan erişimi engelle.
}

/**
 * Ana ve Alt Tema Stil Dosyalarını Sırasıyla Yükler.
 */
function pratikwp_child_enqueue_styles() {

    $parent_style_handle = 'pratikwp-style'; // Ana tema stil dosyasının tanınan adı.
    $parent_theme        = wp_get_theme()->parent();
    $parent_version      = $parent_theme ? $parent_theme->get( 'Version' ) : '1.0.0';

    // 1. Ana temanın stil dosyasını yükle.
    wp_enqueue_style(
        $parent_style_handle,
        get_template_directory_uri() . '/style.css',
        array(),
        $parent_version
    );

    // 2. Alt temanın stil dosyasını, ana temaya bağımlı olarak yükle.
    // Bu, alt tema CSS'inin her zaman ana temadan SONRA yüklenmesini sağlar.
    wp_enqueue_style(
        'pratikwp-child-style',
        get_stylesheet_uri(),
        array( $parent_style_handle ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'pratikwp_child_enqueue_styles' );

/* Kendi özel fonksiyonlarınızı (PHP kodlarınızı) bu yorum satırının altına ekleyebilirsiniz. */
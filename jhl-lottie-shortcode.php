<?php
/*
Plugin Name: Lottie Shortcode
Description: Play a lottie animation via a shortcode
Version: 1.0.0
Author: Jason Lawton <jason@jasonlawton.com>
*/

// code from
// https://developer.wordpress.org/plugins/shortcodes/shortcodes-with-parameters/#complete-example
// https://wpgurus.net/enqueue-scripts-style-sheets-on-shortcode-pages/

add_action( 'init', 'jhl_lottie_settings_init' );
function jhl_lottie_settings_init(  ) { 
    wp_register_script( 'lottie-script', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', [] );
}

// Add Shortcode
function jhl_lottie_shortcode( $atts = [], $content = null, $tag = '' ) {
    wp_enqueue_script('lottie-script');
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
 
    // override default attributes with user attributes
    $atts = shortcode_atts(
        array(
            'src'        => '',              // required
            'playmode'   => '',              // other option is 'bounce'
            'direction'  => '1',
            'background' => 'transparent',
            'width'      => '300px',
            'height'     => '300px',
            'speed'      => '1',
            'controls'   => 'true',
            'autoplay'   => 'true',
            'hover'      => 'false',         // this doesn't seem to work
            'loop'       => 'true',
        ), $atts, $tag
    );

    if ( $atts['src'] == '' ) {
        return;
    }

    ob_start();
    ?>
    <lottie-player
        src="<?php echo $atts['src']; ?>"
        background="<?php echo $atts['background']; ?>"
        direction="<?php echo $atts['direction']; ?>"
        speed="<?php echo $atts['speed']; ?>"
        style="width: <?php echo $atts['width']; ?>; height: <?php echo $atts['height']; ?>;"
        <?php echo ( $atts['playmode'] == 'bounce' ) ? 'mode="bounce"' : ''; ?>
        <?php echo ( $atts['controls'] == 'true' ) ? 'controls' : ''; ?>
        <?php echo ( $atts['autoplay'] == 'true' ) ? 'autoplay' : ''; ?>
        <?php echo ( $atts['loop'] == 'true' ) ? 'loop' : ''; ?>
        <?php echo ( $atts['hover'] == 'true' ) ? 'hover' : ''; ?>
    ></lottie-player>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'lottie', 'jhl_lottie_shortcode' );

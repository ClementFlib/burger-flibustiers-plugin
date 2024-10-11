<?php
function burger_flibustiers_apply_custom_styles() {

    $options = get_option('burger_flibustiers_options');
    $bgcolor = !empty($options['burger_flibustiers_bgcolor']) ? esc_attr($options['burger_flibustiers_bgcolor']) : '#6152D3';
    $color = !empty($options['burger_flibustiers_color']) ? esc_attr($options['burger_flibustiers_color']) : '#FFF';
    $font = isset($options['burger_flibustiers_font']) && $options['burger_flibustiers_font'] !== 'default' ? esc_attr($options['burger_flibustiers_font']) : false;
    
    ?>

    <style type="text/css">
        #burger-menu {
            background-color: <?php echo $bgcolor; ?>;
        }
        .burger-menu-list li a {
            color: <?php echo $color; ?>;
            <?php if ($font): ?>
                font-family: <?php echo $font; ?>;
            <?php endif; // Si "default" est sélectionné, on omet cette ligne ?>
        }
    </style>

    <?php
}
add_action('wp_head', 'burger_flibustiers_apply_custom_styles');
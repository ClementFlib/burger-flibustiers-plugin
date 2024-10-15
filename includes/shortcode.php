<?php
//Utiliser [burger_menu] pour appeler ce shortcode
function burger_menu_shortcode($atts) {

    $options = get_option('burger_flibustiers_options');
    $animation_class = isset($options['burger_flibustiers_animation']) ? $options['burger_flibustiers_animation'] : 'burger-slide-right';

    $atts = shortcode_atts(array(
        'menu' => '', // Le nom du menu tel qu'enregistré dans le backoffice WordPress
    ), $atts);

    // Si aucun nom de menu n'est spécifié, utilise le menu principal par défaut
    if (empty($atts['menu'])) {
        // Récupère les emplacements de menu enregistrés
        $locations = get_nav_menu_locations();

        // Vérifie si un menu est assigné à l'emplacement 'primary' (ou l'emplacement voulu)
        if (isset($locations['primary'])) {
            $menu_object = wp_get_nav_menu_object($locations['primary']);
            $atts['menu'] = $menu_object->name; // Utilise le nom du menu principal
        }
    }

    ob_start(); // Démarre la temporisation de sortie pour capturer le contenu PHP

    // Code HTML pour le menu burger
    ?>
    <div id="burger-menu-icon" class="<?php echo esc_attr($animation_class); ?>">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id="burger-menu">
        <?php
        // Affiche le menu WordPress Apparences > Menu
        wp_nav_menu(array(
			'menu' => $atts['menu'],
			'container' => false,
			'menu_class' => 'burger-menu-list'
		));
        ?>
    </div>
    <?php

    return ob_get_clean(); // Retourne le contenu capturé
}

add_shortcode('burger_menu', 'burger_menu_shortcode');
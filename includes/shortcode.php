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
    <div id="burger-menu-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id="burger-menu" class="<?php echo esc_attr($animation_class); ?>">
        <?php
        // Affiche le menu WordPress Apparences > Menu
        wp_nav_menu(array(
			'menu' => $atts['menu'],
			'container' => false,
			'menu_class' => 'burger-menu-list'
		));

        $socials = get_option('burger_flibustiers_social_links', []);
        if ($socials) {
            echo '<div class="social-links">';
            foreach ($socials as $social) {
                echo '<a href="' . esc_url($social['url']) . '" target="_blank" class="social-link-' . esc_attr($social['network']) . '">';
                switch ($social['network']) {
                    case 'facebook':
                        echo '<span class="dashicons dashicons-facebook"></span>';
                        break;
                    case 'youtube':
                        echo '<span class="dashicons dashicons-youtube"></span>';
                        break;
                    case 'instagram':
                        echo '<span class="dashicons dashicons-instagram"></span>';
                        break;
                    case 'linkedin':
                        echo '<span class="dashicons dashicons-linkedin"></span>';
                        break;
                    case 'x':
                        echo '<span class="dashicons dashicons-twitter-x-alt"></span>';
                        break;
                }
                echo '</a>';
            }
            echo '</div>';
        }

        ?>
    </div>
    <?php

    return ob_get_clean(); // Retourne le contenu capturé
}

add_shortcode('burger_menu', 'burger_menu_shortcode');
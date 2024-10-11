<?php
function burger_flibustiers_add_admin_menu() {
    add_menu_page(
        'Réglages du Menu Burger',          // Titre de la page
        'Menu Burger',                      // Titre du menu
        'manage_options',                   // Capacité requise
        'burger_flibustiers_settings',      // Slug de la page
        'burger_flibustiers_settings_page', // Fonction de rappel pour afficher le contenu
        'dashicons-menu-alt',               // Icône du menu
        20                                  // Position du menu dans l’admin
    );
}
add_action('admin_menu', 'burger_flibustiers_add_admin_menu');

function burger_flibustiers_settings_page() {
    ?>
    <div class="wrap">
        <h1>Réglages du Menu Burger</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('burgerFlibustiers');
            do_settings_sections('burgerFlibustiers');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

<?php
// Enregistre les réglages pour le menu burger
function burger_flibustiers_settings_init() {
    register_setting('burgerFlibustiers', 'burger_flibustiers_options');

    add_settings_section(
        'burger_flibustiers_section',
        'Personnalisation du Menu Burger',
        'burger_flibustiers_section_callback',
        'burgerFlibustiers'
    );

    //Couleur de la font
    add_settings_field(
        'burger_flibustiers_color',
        'Couleur de la police du menu',
        'burger_flibustiers_color_render',
        'burgerFlibustiers',
        'burger_flibustiers_section'
    );

    // Font family
    add_settings_field(
        'burger_flibustiers_font',
        'Police de caractères',
        'burger_flibustiers_font_render',
        'burgerFlibustiers',
        'burger_flibustiers_section'
    );

    // Couleur de fond du menu
    add_settings_field(
        'burger_flibustiers_bgcolor',
        'Couleur de fond',
        'burger_flibustiers_bgcolor_render',
        'burgerFlibustiers',
        'burger_flibustiers_section'
    );
}
add_action('admin_init', 'burger_flibustiers_settings_init');

// Rendu du champ couleur
function burger_flibustiers_color_render() {
    $options = get_option('burger_flibustiers_options');
    ?>
    <input type="text" name="burger_flibustiers_options[burger_flibustiers_color]" value="<?php echo isset($options['burger_flibustiers_color']) ? esc_attr($options['burger_flibustiers_color']) : ''; ?>" />
    <p class="description">Entrez une couleur hexadécimale ou un nom de couleur (par ex. #000000 ou noir)</p>
    <?php
}

// Fonction de rendu pour la liste déroulante de la police de caractères
function burger_flibustiers_font_render() {
    $options = get_option('burger_flibustiers_options');
    $selected_font = isset($options['burger_flibustiers_font']) ? $options['burger_flibustiers_font'] : 'default';

    // Liste des polices disponibles
    $fonts = array(
        'default' => 'Défaut (police du thème)',
        'Arial, sans-serif' => 'Arial',
        'Helvetica, sans-serif' => 'Helvetica',
        'Times New Roman, serif' => 'Times New Roman',
        'Georgia, serif' => 'Georgia',
        'Courier New, monospace' => 'Courier New',
        'Verdana, sans-serif' => 'Verdana',
        'Trebuchet MS, sans-serif' => 'Trebuchet MS',
        'Roboto, sans-serif' => 'Roboto (Google)',
        'Open Sans, sans-serif' => 'Open Sans (Google)',
        'Lato, sans-serif' => 'Lato (Google)',
        'Montserrat, sans-serif' => 'Montserrat (Google)',
        'Oswald, sans-serif' => 'Oswald (Google)'
    );
    ?>

    <select name="burger_flibustiers_options[burger_flibustiers_font]">
        <?php foreach ($fonts as $font_value => $font_name): ?>
            <option value="<?php echo esc_attr($font_value); ?>" <?php selected($selected_font, $font_value); ?>>
                <?php echo esc_html($font_name); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <p class="description">Choisissez une police pour le menu.</p>
    <?php
}

// Rendu du champ background color
function burger_flibustiers_bgcolor_render() {
    $options = get_option('burger_flibustiers_options');
    ?>
    <input type="text" name="burger_flibustiers_options[burger_flibustiers_bgcolor]" value="<?php echo isset($options['burger_flibustiers_bgcolor']) ? esc_attr($options['burger_flibustiers_bgcolor']) : ''; ?>" />
    <p class="description">Entrez une couleur hexadécimale ou un nom de couleur (par ex. #000000 ou noir)</p>
    <?php
}

// Description de la section
function burger_flibustiers_section_callback() {
    echo 'Personnalisez l’apparence de votre menu burger ici.';
}
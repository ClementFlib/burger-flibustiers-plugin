<?php
/*
Plugin Name: Burger Flibustiers
Description: Plugin pour ajouter un menu burger dynamique avec un shortcode.
Version: 2.2.2
Author: Clément GUEZOU - Développeur web chez Les Flibustiers
*/

// Permet de vérifier la version pour MAJ auto du plugin
require plugin_dir_path(__FILE__) . 'includes/plugin-update-checker/plugin-update-checker.php';

// Inclut les fichiers nécessaires
include plugin_dir_path(__FILE__) . 'includes/settings-register.php';
include plugin_dir_path(__FILE__) . 'includes/settings-page.php';
include plugin_dir_path(__FILE__) . 'includes/shortcode.php';
include plugin_dir_path(__FILE__) . 'includes/custom-styles.php';

// Ajout des fichiers CSS et JS
function enqueue_burger_flibustiers_assets() {
    wp_enqueue_style('burger-flibustiers-css', plugin_dir_url(__FILE__) . 'css/burger-flibustiers.css');
    wp_enqueue_script('burger-flibustiers-js', plugin_dir_url(__FILE__) . 'js/burger-flibustiers.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_burger_flibustiers_assets');

// Charge la bibliothèque dashicons de WP pour les boutons RS
function load_dashicons_front_end() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons_front_end');

// Namespace de la librairie de PUC -> plugin pour maj auto
use YahnisElsts\PluginUpdateChecker\v5p4\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/ClementFlib/burger-flibustiers-plugin/', // URL du dépôt GitHub
    __FILE__, // Chemin vers le fichier principal du plugin
    'burger-flibustiers-plugin' // Slug du plugin
);

// Définis la branche, ici `master` par défaut.
$updateChecker->setBranch('master');
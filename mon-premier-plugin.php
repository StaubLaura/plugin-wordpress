<?php
/**
 * Created by PhpStorm.
 * User: laura.staub
 * Date: 20.05.2019
 * Time: 09:23
 * Plugin Name: Mon premier plugin
 */


//ajouter code

//fonction qui affiche la balise meta
function mon_plugin_meta_keywords() {
    echo '<meta name="keywords" content="HTML, CSS, XML, JavaScript">';
}

//Fonction qui envoie par email les infos d'un email supprimé
function mon_plugin_post_delete_mail($post_id) {
//Récupére les informations de l'article supprimé
    $post = get_post($post_id);
//Création du sujet de l'email
    $sujet = "Artile supprimé :" . $post->post_title;
//Création du contenu de l'email
    $message = "Contenu de l'artilce : " . $post->post_content;
//Envoi de l'email à l'administrateur du site
    wp_mail(get_bloginfo('admin_email'), $sujet, $message);
}
//Ajout d'une action sur 'delete_post' qui appellera mon_plugin_post_delete_mail()
add_action('delete_post', 'mon_plugin_post_delete_mail');


//fonction qui remplace la chaine 'et' par '&amp;'
function mon_plugin_the_title($title){
//Remplace 'et' dans le titre
        $title = str_replace( 'et', '&amp;', $title );
//Retourne le titre modifié
        return $title;
    }
//Ajout d'un filtre sur 'the_title' qui appellera mon_plugin_the_title()
    add_filter( 'the_title', 'mon_plugin_the_title' );


//Fonction qui retourne la célèbre citation de maître Yoda
function mon_plugin_yoda_shortcode() {
    return "<blockquote>Que la force soit avec toi jeune padawan
!</blockquote>";
}
//Enregistre le shortcode yoda
add_shortcode( 'yoda', 'mon_plugin_yoda_shortcode' );


/**
 * Shortcode qui retourne le célèbre "Luke, Je sui ton père !" dans un élément blockquote.
 * Le contenu du shortcode sera utilisé pour remplacer 'Luke'
 * Exemples :
 * [vador] => <blockquote>Luke, Je sui ton père !</blockquote>
 * [vador]Serge[/vador] => <blockquote>Serge, Je sui ton père
 * !</blockquote>
 */
function mon_plugin_vador_shortcode($atts, $content = "") {
//Si contenu vide
    if (empty( $content )) {
        $content = 'Luke';
    }
    return "<blockquote>" . $content . ", Je suis ton père !</blockquote>";
}
//Fonction de rappel qui retourne la célèbre citation de maître Yoda
function mon_plugin_yoda_shortcode() {
    return "<blockquote>Que la force soit avec toi jeune padawan
!</blockquote>";
}
//Enregistre les shortcodes du plugin
function mon_plugin_register_shortcode() {
    add_shortcode( 'yoda', 'mon_plugin_yoda_shortcode' );
    add_shortcode( 'vador', 'mon_plugin_vador_shortcode' );
}
add_action( 'init', 'mon_plugin_register_shortcode' );
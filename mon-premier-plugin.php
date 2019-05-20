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

//fonction qui envoie par email les infos d'un email supprimé
function mon_plugin_post_delete_mail($post_id) {
    //récupération informations de l'article supprimé
    $post = get_post($post_id);
    //création sujet de l'email
    $sujet = "Article supprimé : " .$post->post_title;
    //création contenu de l'email
    $message = "Contenu de l'article :" .$post->post_content;
    //envoie email administrateur du site
    wp_mail(get_bloginfo('admin_email'), $sujet, $message);
}
//ajout action sur 'delete_post' qui appellera mon_plugin_post_delete_mail()
add_action('delete_post', 'mon_plugin_post_delete_mail');


//fonction qui remplace la chaine 'et' par '&amp;'
//function mon_plugin_the_title($title){
//Remplace 'et' dans le titre
        $title = str_replace( 'et', '&amp;', $title );
//Retourne le titre modifié
        return $title;
    }
//Ajout d'un filtre sur 'the_title' qui appellera mon_plugin_the_title()
    //add_filter( 'the_title', 'mon_plugin_the_title' );


//updload
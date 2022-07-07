<?php
//echo 'here';
require_once('wp-admin/includes/image.php');
//require_once('wp-admin/includes/file.php');
require_once('wp-admin/includes/media.php');
require_once("wp-load.php");
require_once('wp-includes/wp-db.php');
$upload_dir = wp_upload_dir();
$u = $upload_dir['baseurl'] . '/JT-AUTOMOBILES.xml';
$xml = simplexml_load_file($u) or die("Error: Cannot create object");
//print_r((string)$xml->vehicule[0]->photos[0]->photo);
echo '<pre>';
$array = [];
foreach ($xml->children() as $fields) {
    foreach($fields->photos->photo as $one){
        print_r((string)$one);
        //$img = (string)$one[0];
    }
   
    //print_r($imageurl);
    //die;
    //echo $img;
    //die;
    $post_title = $fields->titre;
    $reference = (string)$fields->reference;
    $reference_externe = (string)$fields->reference_externe;
    $type = (string)$fields->type;
    $marque = (string)$fields->marque;
    $version = (string)$fields->version;
    $annee = (string)$fields->annee;
    $energie = (string)$fields->energie;
    $typeboite = (string)$fields->typeboite;
    $puissance_fiscale = (string)$fields->puissance_fiscale;
    $prix_neuf = (string)$fields->prix_neuf;
    global $wpdb;
    $query = $wpdb->prepare('SELECT ID FROM ' . $wpdb->posts . ' WHERE post_name = %s', sanitize_title_with_dashes($post_title));
    $cID = $wpdb->get_var($query);
    //echo $cID;
    if (!empty($cID)) {
        echo "update" . '<br>';
        $my_post = array(
            'ID' =>   $cID,
            'post_type'         => 'car',
            'post_title'    => $post_title,
            'post_status'   => 'publish',
        );
        wp_update_post($my_post);
        update_post_meta($cID, 'reference', $reference);
        update_post_meta($cID, 'reference_externe', $reference_externe);
        update_post_meta($cID, 'type', $type);
        update_post_meta($cID, 'marque', $marque);
        update_post_meta($cID, 'version', $version);
        update_post_meta($cID, 'annee', $annee);
        update_post_meta($cID, 'energie', $energie);
        update_post_meta($cID, 'typeboite', $typeboite);
        update_post_meta($cID, 'puissance_fiscale', $puissance_fiscale);
        update_post_meta($cID, 'prix_neuf', $prix_neuf);
        $imageurl = $img;
        $image = (string)$imageurl;
        $xmlimgtrim = trim($image);
        $url = $xmlimgtrim;
        global $wpdb;
        $image_src = wp_upload_dir()['baseurl'] . '/2022/07/' . _wp_relative_upload_path(basename($url));
        $query = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_src));
        if ($query[0]) {
            $image_id = $query[0];
        } else {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $src = media_sideload_image($url, null, null, 'src');
            $image_id = attachment_url_to_postid($src);
            $attachment_data = wp_generate_attachment_metadata($image_id, basename($url));
            wp_update_attachment_metadata($image_id,  $attachment_data);
        }
        update_post_meta($cID, 'gallery', $image_id);
        set_post_thumbnail($cID, $image_id);
    } else {
        echo "create" . '<br>';
        $post_data = array(
            'post_type'         => 'car',
            'post_title'        => $post_title,
            'post_status'       => 'publish',
        );
        $post_id = wp_insert_post($post_data);
        echo $post_id.'<br>';
        update_post_meta($post_id, 'reference', $reference);
        update_post_meta($post_id, 'reference_externe', $reference_externe);
        update_post_meta($post_id, 'type', $type);
        update_post_meta($post_id, 'marque', $marque);
        update_post_meta($post_id, 'version', $version);
        update_post_meta($post_id, 'annee', $annee);
        update_post_meta($post_id, 'energie', $energie);
        update_post_meta($post_id, 'typeboite', $typeboite);
        update_post_meta($post_id, 'puissance_fiscale', $puissance_fiscale);
        update_post_meta($post_id, 'prix_neuf', $prix_neuf);
        $imageurl = $img;
        $image = (string)$imageurl;
        $xmlimgtrim = trim($image);
        $url = $xmlimgtrim;
        global $wpdb;
        $image_src = wp_upload_dir()['baseurl'] . '/2022/07/' . _wp_relative_upload_path(basename($url));
        $query = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_src));
        if ($query[0]) {
            $image_id = $query[0];
        } else {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $src = media_sideload_image($url, null, null, 'src');
            $image_id = attachment_url_to_postid($src);
            echo $image_id;
            $attachment_data = wp_generate_attachment_metadata($image_id, basename($url));
            wp_update_attachment_metadata($image_id,  $attachment_data);
        }
        /**array_push($array, $image_id);
        $str = implode(", ", $array);   
        update_post_meta($post_id, 'gallery',  $str);*/
        update_post_meta($post_id, 'gallery', $image_id);
        set_post_thumbnail($post_id, $image_id);
    }
}

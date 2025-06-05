<?php


function get_texture($name) {
    $img_src  = get_template_directory_uri() . "/images/textures/$name.png";

    return '<img src="' . $img_src . '" alt="' . sprintf( __( '%s decorative texture', 'barn2' ), $name ) . '"/>';
}

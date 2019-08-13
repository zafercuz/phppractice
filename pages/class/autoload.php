<?php

function __autoload( $class_name ) {

    $file_name = $class_name . '.php';
    if( file_exists( $file_name ) ) {
        require $file_name;
    }
}

?>
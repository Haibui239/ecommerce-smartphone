<?php
    define ( 'DB_HOST', 'localhost' );
    define ( 'DB_USER', 'root' );
    define ( 'DB_PASSWORD', '' );
    define ( 'DB_NAME', 'hcs' );

function open_database() {
    $connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $connect->set_charset("utf-8");

    if($connect->connect_error) {
        die('connect error:'.$connect->connect_error);
    }
    return $connect;
}
function rand_string($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    $str = '';
    for($i = 0; $i< $length; $i++) {
        $str .= $chars[rand(0,$size-1)];
    }
    return $str;
}

?>
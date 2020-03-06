<?php

function IDcryptor( $string, $action = 'encrypt' ) {

    // you may change these values to your own

    $secret_key = 'something';

    $secret_iv = 'something_secret_iv';

 

    $output = false;

    $encrypt_method = "AES-256-CBC";

    $key = hash( 'sha256', $secret_key );

    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

 

    if( $action == 'encrypt' ) {

        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );

    }

    else if( $action == 'decrypt' ){

        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );

    }

 

    return $output;

}


echo IDcryptor($number);

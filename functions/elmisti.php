<?php
//Replace http to https en getbloginfo(template_url)
function replace_http( $original ) {
    // use preg_replace() to replace http:// with https://
    $output = preg_replace( "^http:", "https:", $original );
    return $output;
}

add_filter( 'template_url', 'replace_http' );
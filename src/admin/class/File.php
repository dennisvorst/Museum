<?php
class File{
    // return true if $str ends with $sub
    static function endsWith( $str, $sub ) {
        return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
    }
}
?>
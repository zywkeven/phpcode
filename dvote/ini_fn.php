<?php
require_once("ini_manager.php");

function get_params_ini( $section, $entry, $ini_path )
{
    $iniMANAGER = new ini_manager();
    return $iniMANAGER->get_entry( $ini_path, $section, $entry ) ;
}

function set_params_ini( $section, $entry, $entry_val, $ini_path )
{
    $iniMANAGER = new ini_manager();
    $iniMANAGER->add_entry( $ini_path, $section, $entry, $entry_val ) ;
}

?>

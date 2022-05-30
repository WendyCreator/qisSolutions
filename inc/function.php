<?php


function get_base($data){
    return basename($_SERVER['SCRIPT_NAME']) == $data?'active':'inact';
    
}
<?php
session_start();
function cleanInput($data){
    // GLOBAL $conn;
        
    $data = $_POST[$data];    
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlentities($data);
    // $data = $conn->real_escape_string($data);


    return $data;
}
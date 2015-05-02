<?php 
include 'dbconnect.php';

function escapeString($field) {
    return mysqli_real_escape_string($conn, $field);
} 
?>
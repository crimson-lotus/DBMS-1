<?php

$conn = mysqli_connect('localhost', 'root', '', 'patients');

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connection successful";

?>
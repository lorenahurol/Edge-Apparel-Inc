<?php

$link = mysqli_connect('localhost', 'root', '', 'codespace'); # Storing the connection into the $link variable.

if (!$link) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>
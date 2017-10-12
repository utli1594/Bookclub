<?php

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

$url = $_SERVER['REQUEST_URI'];

$strings = explode('/', $url);

$current_page = end($strings);

$dbname = 'bookclub';
$dbuser = 'root';
$dbpass = 'password';
$dbserver = 'localhost';



?>
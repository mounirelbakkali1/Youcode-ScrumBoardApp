<?php

//CONNECT TO MYSQL DATABASE USING MYSQLI
$connection = new mysqli('localhost', 'root', '', 'Youcode_scumboard');
if ($connection->connect_error) {
    die('connection failed');
}

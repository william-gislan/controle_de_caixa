<?php

$dsn = 'mysql:host=localhost;dbname=controle_de_caixasdb';
$user = 'root';
$pass = 'agil';

try {

    $db = new PDO($dsn, $user, $pass);
    echo "conectou";
} catch (PDOException $ex) {
    echo $ex->getMessage();
};
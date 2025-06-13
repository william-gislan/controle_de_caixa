<?php
session_start();
require_once "./db.php";

$rpp = filter_input(INPUT_GET, 'rpp', FILTER_DEFAULT);
$busca = filter_input(INPUT_GET, "busca", FILTER_SANITIZE_SPECIAL_CHARS);
$query = "";

if ($busca) {
    $query = "WHERE nome LIKE :busca;";
}

$busca_todos = "SELECT * FROM caixas $query";

$caixas = $db->prepare($busca_todos);

if($busca){
    $caixas->bindValue(":busca", $busca);
};
$caixas->execute();


$todos = $caixas;
$limit = $todos->rowCount();

$p = 1;
$offset = 0;

if($rpp != 'todos'){

};

$qt_registros = $limit;
$qt_paginas = $qt_registros / $limit;
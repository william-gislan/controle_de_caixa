<?php
session_start();
require_once "./db.php";

$rpp = filter_input(INPUT_GET, 'rpp', FILTER_DEFAULT);
$busca = filter_input(INPUT_GET, "busca", FILTER_SANITIZE_SPECIAL_CHARS);
$query = "";

if ($busca) {
    $query = "WHERE nome INLIKE :busca;";
}

$busca_todos = "SELECT * FROM caixas; $query";

$caixas = $conn->prepare($busca_todos);

if($busca){
    $caixas->bindValue(":busca", $busca);
};
$caixas->execute();
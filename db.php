<?php 
 
    $host = "localhost";
    $user = "postgres";
    $pass = "123456";
    $db = "controle_caixas";


    
    $connection_string = "host=$host dbname=$db user=$user password=$pass";

    $conn = pg_connect($connection_string);

?>
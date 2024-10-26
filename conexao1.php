<?php

$host = "d6vscs19jtah8iwb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "sw6p92x30ich4qr2";
$pass = "zppl62ubyafegqsb";
$dbname = "tebq3vvvk4c5gfts";
$port = 3306;

try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}

<?php

$server = '127.0.0.1';
$user = 'root';
$password = '';
$bd = 'cadastro';

// Criando conexao ao banco
try{
$conn = new PDO ("mysql:host=$server;dbname=$bd",$user, $password);
//Ativando relatorio de erros
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Se não conseguir conectar mostrar mensagem de erro
}catch(PDOException $erro){
    echo `Erro De Conexão:{$erro->getMessage ()}`;
    $conn = null; //variavel com valor nulo pra não dar erro no Login

};

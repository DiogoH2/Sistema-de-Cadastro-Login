<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');

require_once 'classes/Class.Crud.php';
$conexao = Conexao::getConexao();
Crud::SetConexao($conexao);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $cep = (isset($_POST['cep'])) ? $_POST['cep'] : '';
    $rua = (isset($_POST['rua'])) ? $_POST['rua'] : '';
    $cidade = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

    $senha = password_hash($senha, PASSWORD_DEFAULT); 

    Crud::setTabela('User');

    $pegaemail = Crud::select('SELECT * FROM User WHERE email = :email', ['email' => $email], true);

    if(!$pegaemail){
        $peganome = Crud::select('SELECT * FROM User WHERE nome = :nome', ['nome' => $nome], true);
        if(!$peganome){
        Crud::insert(['nome' => $nome, 'senha' => $senha, 'email' => $email, 'cep' => $cep, 'rua' => $rua, 'cidade' => $cidade, 'estado' => $estado]);
        header('location: ../../frontend/login.html');
    }else{
            echo json_encode(['mensagem' => 'Nome já cadastrado']);
        }
    } else{

        echo json_encode(['mensagem' => 'E-mail já cadastrado']);

     }

}
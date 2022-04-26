<?php
 include_once('./conn.php');

  //Confirmando se esta recebendo nome e senha 
  if(isset($_POST['email']) && ($_POST['senha']) && $conn != null){
   //Execuntando o Select no banco 
   //?= pra atribuir o valor quando for executado 
    $query = $conn->prepare("SELECT * FROM User Where email = ? ");
    //Passando o valor da ?
    $query->execute(array($_POST['email']));
    //condição para trazer resultado do select com contador
     if($query->rowCount()){
    // pegando o usuario do banco
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        if(password_verify($_POST['senha'], $user['senha'])){
                //iniciando sessão
            session_start();
        //nova sessão pra mostrar que o usuario esta logado
            $_SESSION["usuario"] = array($user["nome"]);
            $_SESSION["teste"] = $_POST['email'];


        //sessão iniciada ira ser redirecionado para home
            echo "<script>window.location = '../../frontend/Congratulation.php'</script>";
        }else{
            echo json_encode(['mensagem' => 'Senha invalida']);
        }
     }else{
        echo json_encode(['mensagem' => 'Usuario invalido']);

     }

  }else{
    echo  json_encode(['mensagem' => 'erro no servidor']);
  

  }

<?php
 session_start();

 if(isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])){
     require("conn.php");
     $cliente = $_SESSION['usuario'][0];

 }else{

     echo "<script>window.location = 'pages/login.html'</script>";
 }
?>
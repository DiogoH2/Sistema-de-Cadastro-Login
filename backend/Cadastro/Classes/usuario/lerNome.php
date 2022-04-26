<?php


function ler(){
    $conn = include_once ('conn.php');
    $sql = 'SELECT * FROM User';
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

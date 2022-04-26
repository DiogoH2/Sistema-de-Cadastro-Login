<?php
    $server = '127.0.0.1';
    $user = 'root';
    $password = '';
    $bd = 'cadastro';

    $conn = new mysqli ($server, $user, $password, $bd);
    return $conn;

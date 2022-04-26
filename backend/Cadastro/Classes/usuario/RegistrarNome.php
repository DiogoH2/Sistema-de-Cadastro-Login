<?php

    include_once ('lerNome.php');


    $registro = ler();

    $html = ' ';
    foreach ($registro as $registros){
        $html .= "
                    {$registros['nome']}
        ";
    }




?>
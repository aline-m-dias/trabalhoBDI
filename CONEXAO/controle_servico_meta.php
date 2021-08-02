<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../CONEXAO/conexao.php";
    require "../CONEXAO/meta.php";
    require "../CONEXAO/servicos_meta.php";


    //PAREI AQUI, FALTA COMPLETAR    
    $meta = new Meta();
    $meta->__set('meta',$_POST['meta']);
    
?> 
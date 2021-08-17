<?php
    unset($_SESSION['login']);
    unset($_SESSION['saldo']);
    unset($_SESSION['nome_familia']);
    unset($_SESSION['meta']);
    unset($_SESSION['tipoDespesa']);
    header('Location: index.php');

?>
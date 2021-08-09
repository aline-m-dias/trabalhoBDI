<?php 
	if(!isset($_SESSION)){
		session_start();
	}	
    $acao = 'imprimirPessoas';
    require_once 'controle_servico_pessoa.php';

    $nome_pessoa = $listaPessoas;
    $i = isset($i) ? 0 : 0;
    for($i=0; $i<count($nome_pessoa); $i++){
        $nome_pessoa[$i]['nome_pessoa'] = isset($listaPessoas[$i]['nome_pessoa']) ? $listaPessoas[$i]['nome_pessoa'] : $listaPessoas[$i]['nome_pessoa'];
    }
    /*$tam = count($nome_pessoa);
    echo $tam;
    echo '<prep>';
    print_r($listaPessoas);
    echo '</prep>'; */?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Cadastro pessoa</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
    </header>

    <div class="fundoPretoReceita">
        <br> Cadastre uma pessoa
    </div>

    <div class="cadrastrarDespesa">

        <form id="register-form" action="controle_servico_pessoa.php?acao=inserirPessoa" method="post" name="logar">
            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome_pessoa" id="nome" placeholder="Digite o nome completo">

            </div>
            <div class="full-box">
                <label for="name">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF (apenas números)">
            </div>
            <div class="full-box">
                <label for="name">Parentesco</label>
                <input type="text" name="parentesco" id="parentesco" placeholder="Digite o parentesco">
            </div>
            <div class="full-box">
                <label for="name">Data</label>
                <input type="date" name="data_nasc" id="data">
            </div>

            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['pessoacadastrada']) && $_GET['pessoacadastrada'] == 1) { ?>
            <div class="full-box">
                <h5>Pessoa cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="fundoPretoCadastro">
        <div><h2>Pessoas cadastradas<h2><div>
        <?php 
        $i = isset($i) ? 0 : 0;
        for($i=0; $i<count($nome_pessoa); $i++){ ?>
            <div><?php echo $nome_pessoa[$i]['nome_pessoa'];?></div>
        <?php } ?>
    </div>
</body>

</html>
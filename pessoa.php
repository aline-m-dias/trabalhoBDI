<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Cadrastro pessoa</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="cadrastrar.html"> <img
                src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
    </header>

    <div class="fundoPretoReceita">
        <br> Cadrastre uma pessoa
    </div>

    <div class="cadrastrarDespesa">

        <p class="logar">Pessoa</p>

        <form id="register-form-receita" action="controle_servico_pessoa.php?acao=inserirPessoa">

            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome_pessoa" id="nome" placeholder="Digite o nome">
            </div>
            <div class="full-box">
                <label for="name">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Parentesco</label>
                <input type="text" name="parentesco" id="parentesco" placeholder="Digite o parentesco">

            </div>
            <div class="full-box">
                <label for="name">Data</label>
                <input type="date" name="data_nasc" id="data" placeholder="Digite o valor">
            </div>

            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
    </div>

    <div class="clear"></div>
</body>

</html>
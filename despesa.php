<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Despesa</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="cadrastrar.html"> <img src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
    </header>

    <div class="fundoPretoReceita">
        <br> Cadrastre sua despesa
    </div>

    <div class="cadrastrarDespesa">

        <p class="logar">Despesa</p>


        <form id="register-form-receita"  action="controle_servico_despesa.php?acao=inserirDespesa" method="post" name="logar">


            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome">
            </div>
            <div class="full-box">
                <label for="name">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Categorias</label>
                <select name='tipo'>
                    <option value="--">--</option>
                    <option value="Alimentação">Alimentação</option>
                    <option value="Saúde">Saúde</option>
                    <option value="Educação">Educação</option>
                    <option value="Moradia">Moradia</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Diversos">Diversos</option>

                </select>
            </div>
            <div class="full-box">
                <label for="name">Data</label>
                <input type="date" name="data_desp" id="data_desp">
            </div>

            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['despesacadastrada']) && $_GET['despesacadastrada'] == 1) { ?>
            <div class="full-box">
                <h5>Despesa cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>

    <div class="clear"></div>
</body>

</html>
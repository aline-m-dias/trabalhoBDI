<?php  
	session_start( );
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
                <input type="text" name="valor" id="valor" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Categorias</label>
                <select>
                    <option value="vazio">--</option>
                    <option name='tipo' value="alimentação">Alimentação</option>
                    <option value="saúde">Saúde</option>
                    <option value="educação">Educação</option>
                    <option value="moradia">Moradia</option>
                    <option value="transporte">Transporte</option>
                    <option value="diversos">Diversos</option>

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
				<h5>Atenção: Despesa cadastrada com sucesso!</h5>
			</div>
		<?php } ?>
    </div>

    <div class="clear"></div>
</body>

</html>
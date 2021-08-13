<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['pesquisaDespesa']) == false) {
    $acao = 'totalDespesaGrafico';
    require_once 'controle_servico_despesa.php';
    $despesa_grafico = $despesa_total_grafico;
    $i = isset($i) ? 0 : 0;
    for ($i = 0; $i < 6; $i++) {
        $despesa_grafico[$i]['tipo'] = isset($despesa_total_grafico[$i]['tipo']) ?  $despesa_total_grafico[$i]['tipo'] : $despesa_total_grafico[$i]['tipo'];
        $despesa_grafico[$i]['valor'] = isset($despesa_total_grafico[$i]['valor']) ?  $despesa_total_grafico[$i]['valor'] : $despesa_total_grafico[$i]['valor'];
    }
} else if (isset($_GET['pesquisaDespesa']) && $_GET['pesquisaDespesa'] == 1) {
    $acao = 'imprimirDespesas?totalDespesaGrafico';
    require_once 'controle_servico_despesa.php';

    $nome_despesa = $listaDespesas;
    $despesa_grafico = $despesa_total_grafico;

    $i = isset($i) ? 0 : 0;
    for ($i = 0; $i < count($nome_despesa); $i++) {
        $nome_despesa[$i]['nome'] = isset($listaDespesas[$i]['nome']) ?  $listaDespesas[$i]['nome'] : $listaDespesas[$i]['nome'];
        $nome_despesa[$i]['valor'] = isset($listaDespesas[$i]['valor']) ?  $listaDespesas[$i]['valor'] : $listaDespesas[$i]['valor'];
        $nome_despesa[$i]['data_desp'] = isset($listaDespesas[$i]['data_desp']) ?  $listaDespesas[$i]['data_desp'] : $listaDespesas[$i]['data_desp'];
        $nome_despesa[$i]['codigo'] = isset($listaDespesas[$i]['codigo']) ?  $listaDespesas[$i]['codigo'] : $listaDespesas[$i]['codigo'];
    }
    for ($i = 0; $i < 6; $i++) {
        $despesa_grafico[$i]['tipo'] = isset($despesa_total_grafico[$i]['tipo']) ?  $despesa_total_grafico[$i]['tipo'] : $despesa_total_grafico[$i]['tipo'];
        $despesa_grafico[$i]['valor'] = isset($despesa_total_grafico[$i]['valor']) ?  $despesa_total_grafico[$i]['valor'] : $despesa_total_grafico[$i]['valor'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Despesa</title>
    <meta charset="utf-8" />
    <!-- copyright: google chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Despesa', 'Valor Total'],
                ['ALIMENTAÇÃO', <?php echo $despesa_grafico[0]['valor'] ?>],
                ['SAÚDE', <?php echo $despesa_grafico[1]['valor'] ?>],
                ['EDUCAÇÃO', <?php echo $despesa_grafico[2]['valor'] ?>],
                ['MORADIA', <?php echo $despesa_grafico[3]['valor'] ?>],
                ['TRANSPORTE', <?php echo $despesa_grafico[4]['valor'] ?>],
                ['DIVERSOS', <?php echo $despesa_grafico[5]['valor'] ?>]
            ]);

            var options = {
                title: 'Gráfico de despesa',
                pieHole: 0.4,
                colors: ['#86128A', '#22b6d4', '#22d6b5', '#f205cb', '#f20', '#eaf205', '#d14d']

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <script>
        function acao(codigo){
            location.href = 'controle_servico_despesa.php?acao=excluirDespesa&codigo='+codigo;
        }
    </script>

</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="pagprincipal.php"> Sair </a></ul>
        </div>
    </header>
    <div class="clear"></div>

    <div class="ola">
        <p>Olá, <?php echo $_SESSION["login"]; ?></p>
    </div>

    <div class="fundoPretoLogin">
        <br> Cadastre sua despesa
    </div>

    <div class="cadrastrarDespesa">

        <form id="register-form-despesa" action="controle_servico_despesa.php?acao=inserirDespesa" method="post" name="logar">
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

            <div class="full">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['despesacadastrada']) && $_GET['despesacadastrada'] == 1) { ?>
            <div class="msgForm">
                <h5>Despesa cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>
    <div class="grafico" id="donutchart" style="width: 900px; height: 500px; text-align:center"></div>


    <div class="pesquiseDespesa">
        <div>
            <p class="logar">Pesquise despesas cadastradas</p>
            <div class="centralizar">

                <form action="despesa.php?pesquisaDespesa=1" method="post" name="logar">
                    <div class="full-box">
                        <label for="name">Categorias</label>
                        <select name='tipo'>
                            <option value="--">Selecione a categoria</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Moradia">Moradia</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Diversos">Diversos</option>
                        </select>
                    </div>
                    <div class="full">
                        <input id="btn-submit" type="submit" value="Pesquisar">
                    </div>
                </form>
            </div>


            <div class="despesas">
                <?php
                if (isset($_GET['pesquisaDespesa']) && $_GET['pesquisaDespesa'] == 1) { ?>
                    <div>
                        <p class="logar">Despesas cadastradas </p>
                        <div class="centro">
                            <?php
                            $i = isset($i) ? 0 : 0;
                            for ($i = 0; $i < count($nome_despesa); $i++) { ?>
                                <div class="espaco">
                                    <span><?php echo $nome_despesa[$i]['nome']; ?></span>
                                    <span> | R$ <?php echo $nome_despesa[$i]['valor']; ?></span>
                                    <span> | <?php echo $nome_despesa[$i]['data_desp']; ?></span>
                                    <span> <input id="btn-submit" onclick="acao(<?php echo $nome_despesa[$i]['codigo']?>)" type="submit" value="Excluir"> </span>
                                </div>
                                <div style="float:right; margin-top:-75px; margin-right:30px; padding-top:20px;  ">
                                    
                                        <div class="full">
                                           
                                        </div>
                                    
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['metaexcluida']) && $_GET['metaexcluida'] == 1) { ?>
                                <div class="msgForm">
                                    <h5>Meta excluída com sucesso!!</h5>
                                </div>
                            <?php } }?>

                        </div>
</body>

</html>
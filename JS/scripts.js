function verificar(){
    var inputs = document.querySelectorAll('#inputCadastro');
    var nulo = false;
    inputs.forEach(item =>{  
    if (item.value == false) // se o valor do input for valido (não vazio, nem espacos em branco, nem NaN, etc
        nulo = true });	
    if (nulo == true){
        location.href = 'index.php?inputEmBranco=1';
    }else{
        location.href = 'controle_servico_usuario.php?acao=inserirUsuario';
    }
}

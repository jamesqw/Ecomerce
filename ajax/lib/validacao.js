// Cria objeto CPAINT
var cp = new cpaint();
cp.set_transfer_mode('POST');
cp.set_response_type('TEXT');

// ------------------------------------
// GERAL
// ------------------------------------
var erroEmail = false;
var erroFabricante = false;
var erroPreco = false;

function verificaForm(form)
{
    if(erroEmail || erroFabricante || erroPreco ||
       form.email.value == '' || form.fabricante.value == 0 ||
       form.modelo.value == 0 || form.preco.value == '')
    {
        alert('Preencha todos os campos corretamente!');
        return false;
    }

    return true;
}
// ------------------------------------

// ------------------------------------
// E-MAIL
// ------------------------------------
// Valida e-mail fornecido
function verificaEmail()
{
    // Obtém valor digitado
    valor = document.getElementById('email').value;

    // E-mail em branco? Faz validação direta em Javascript
    if(valor == '') {
        document.getElementById('email_erro').innerHTML = 'Preencha o E-mail';
        erroEmail = true;
    }
    // OK, e-mail preenchido, chama PHP e valida
    else
    {
        // PRINCIPAL MÉTODO (call) = Chama o PHP e obtém o retorno
        cp.call('validaFormulario.php', 'verificaEmail', retornaEmail, valor);
    }
}

// Obtém o retorno da validação feita em AJAX e processa-o
function retornaEmail(retorno)
{
    // Se teve algum retorno após verificar o e-mail,
    // significa erro, portanto imprime-o.
    if(retorno) {
        document.getElementById('email_erro').innerHTML = retorno;
        erroEmail = true;
    }
    else {
        document.getElementById('email_erro').innerHTML = '';
        erroEmail = false;
    }
}

// ------------------------------------

// ------------------------------------
// FABRICANTES & MODELOS
// ------------------------------------
function carregaModelos(campo)
{
    fabricanteId = campo.value;

    // Nenhuma fabricante foi selecionada. Caso houvesse alguma seleção
    // anterior, limpa. Pois não há modelo para fabricante 0.
    if(fabricanteId == 0) {
        document.getElementById('modelos_local').innerHTML = 'Selecione um Fabricante';
        // Limpa os erros, caso ocorreu antes dessa boa seleção
        document.getElementById('fabricante_erro').innerHTML = '';
    }

    // Chama PHP para carregar modelos da fabricante selecionada
    else
        cp.call('validaFormulario.php', 'obtemModelos', retornaModelos, fabricanteId);
}

function retornaModelos(retorno)
{
    // Nenhum modelo encontrado
    if(retorno == 'N') {
        document.getElementById('fabricante_erro').innerHTML = 'Nenhum Modelo para esse fabricante. Selecione outro';
        // Limpa modelos anteriores, já que agora selecionou uma fabricante vazia
        document.getElementById('modelos_local').innerHTML = 'Selecione um Fabricante';

        erroFabricante = true;
    }

    // Ok, há modelos para o fabricante
    else {
        document.getElementById('modelos_local').innerHTML = retorno;
        // Limpa os erros, caso ocorreu antes dessa boa seleção
        document.getElementById('fabricante_erro').innerHTML = '';

        erroFabricante = false;
    }
}

// ------------------------------------

// ------------------------------------
// PREÇO
// ------------------------------------
function verificaPreco()
{
    // Obtém valor digitado
    valor = document.getElementById('preco').value;

    // Preço em branco? Faz validação direta em Javascript
    if(valor == '') {
        document.getElementById('preco_erro').innerHTML = 'Preencha o Preço';
        erroPreco = true;
    }
    // OK, preço preenchido, chama PHP e valida
    else
    {
        cp.call('validaFormulario.php', 'verificaPreco', retornaPreco, valor);
    }
}

// Obtém o retorno da validação feita em AJAX e processa-o
function retornaPreco(retorno)
{
    // Se teve algum retorno após verificar o preço,
    // significa erro, portanto imprime-o.
    if(retorno) {
        document.getElementById('preco_erro').innerHTML = retorno;
        erroPreco = true;
    }
    else {
        document.getElementById('preco_erro').innerHTML = '';
        erroPreco = false;
    }
}
// ------------------------------------
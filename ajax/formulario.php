<?php

require 'utils.php';

// Obtém Fabricantes, para inserir no selectbox relacionado.
$SQL = 'SELECT id, fabricante
		FROM c_fabricantes
		ORDER BY fabricante ASC';
$resId = mysql_query($SQL);

// Array que será passado para a função selectbox.
// O primeiro item, de chave 0 (primeiro índice do array), 
// indica para o usuário selecionar. Caso ele envie sem selecionar,
// irá valor 0 e saberemos que não foi feita a seleção.
$Fabricantes = array('Selecione');

// Passa os pares: ID do Fabricante => Nome do Fabricante
while($dados = mysql_fetch_array($resId))	
	$Fabricantes[$dados['id']] = $dados['fabricante'];

// Cria o selectbox com as fabricantes, passando os pares
// obtidos acima.
// O quarto parâmetro é uma chamada a uma função
// Javascript definida em validacao.js. A cada mudança
// nesse selectbox, ele chamará essa função.
$selectFabricantes = SelectBox($Fabricantes, 'fabricante', '', 'onChange="carregaModelos(this);"');

?>

<!-- INCLUI A CLASSE CPAINT - AJAX -->
<script type="text/javascript" src="lib/cpaint2.inc.compressed.js"></script>

<!-- Rotinas de validação do formulário -->
<script type="text/javascript" src="lib/validacao.js"></script>

<!-- Formulário -->
<form action="cadastro.php" method="post" onSubmit="return verificaForm(this);">
	<p>E-mail:<br />
		<input type="text" name="email" id="email" onblur="verificaEmail();"/> <span id="email_erro" style="color: red;"></span>
	</p>

	<p>Fabricante:<br />
		<?php echo $selectFabricantes; ?> <span id="fabricante_erro" style="color: red;"></span>
	</p>

	<p>Modelo:<br />
		<span id="modelos_local">Selecione um Fabricante</span> <span id="modelo_erro" style="color: red;"></span>
	</p>

	<p>Preço:<br />
		<input type="text" name="preco" id="preco" size="5" onblur="verificaPreco();"/> <span id="preco_erro" style="color: red;"></span>
	</p>

	<p><input type="submit" value="Enviar" /></p>
</form>
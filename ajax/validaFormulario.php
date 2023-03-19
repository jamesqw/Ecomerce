<?php

// Banco de dados, cpaint, selectbox
require 'utils.php';

// Instancia Cpaint
$CPaint = new cpaint();

// Registra funções
$CPaint->register(array('validaFormulario', 'verificaEmail'));
$CPaint->register(array('validaFormulario', 'obtemModelos'));
$CPaint->register(array('validaFormulario', 'verificaPreco'));

// Inicia Cpaint e retorno de dados
$CPaint->start('ISO-8859-1');
$CPaint->return_data();

class validaFormulario
{
	function verificaEmail($Email)
	{
		// Primeiro verifica se está em formato válido
		if(preg_match('/^[a-z0-9\.\-_\+]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is', $Email))
		{
			// E-mail ok, verifica se ele já está cadastrado
			$SQL = 'SELECT email
					FROM c_classificados
					WHERE email = \'' . $Email . '\'';
			$resId = mysql_query($SQL);
			
			// E-mail encontrado
			if(mysql_num_rows($resId))
				validaFormulario::EnviaValor('Só é permitido um classificado por e-mail!');
		}
		// E-mail inválido
		else
			validaFormulario::EnviaValor('E-mail em formato inválido!');
	}

	function obtemModelos($fabricanteId)
	{
		$SQL = 'SELECT id, modelo
				FROM c_modelos 
				WHERE fabricante_id = ' . $fabricanteId . '
				ORDER BY modelo ASC';
		$resId = mysql_query($SQL);

		// Tem modelos para a fabricante escolhida
		if(mysql_num_rows($resId))
		{
			// Mesmo esquema da criação do selectbox de fabricantes
			// em formulario.php
			$Modelos = array('Selecione');

			while($dados = mysql_fetch_array($resId))	
				$Modelos[$dados['id']] = $dados['modelo'];

			$selectModelos = SelectBox($Modelos, 'modelo');

			// Envia o select para o Javascript
			validaFormulario::EnviaValor($selectModelos);
		}
		// Sem modelos
		else
			validaFormulario::EnviaValor('N');
	}

	function verificaPreco($Preco)
	{
		// Verifica se está em formato válido
		if(!preg_match('/^([0-9]+)(\.[0-9]{1,2})?$/', $Preco))
		{
			validaFormulario::EnviaValor('Preço em formato inválido! Insira ponto em caso de casa decimal e até duas casas decimais. Não utilize vírgula. Exemplos de preços válidos: 123.2, 45000, 455.35, etc.');
		}			
	}

	/**
	 * Essa função retorna um valor para o CPAINT que por sua
	 * vez retornará para a página
	 */
	function EnviaValor($Total)
	{
		global $CPaint;
		$CPaint->set_data($Total);
	}
}

?>
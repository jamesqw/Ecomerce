<?php

/**
 * Cria um SelectBox
 *
 * O parâmetro $itens deve ser um array com os itens do selectbox,
 * onde um índice indica o valor do campo e seu respectivo valor
 * indica o texto que irá aparecer. 
 * Exemplo:
 * $Campos = array('email' => 'E-mail', 'endereco' => 'Endereço');
 * Vira:
 * <option value="email">E-mail</option>... etc
 *
 * @param array $itens Itens do select box
 * @param string $nome Nome e ID
 * @param string $selecionado Valor do item selecionado
 * @param string $extras Extra, por exemplo um código JS
 * @param string $class Classe CSS
 */
function SelectBox($itens, $nome, $selecionado = false, $extras = false, $class = false)
{
    $select_box  = "<select id=\"" . $nome . "\" name=\"" . $nome . "\" class=\"" . $class . "\"";
    if($extras)
    {
        $select_box .= " " . $extras;
    }
    $select_box .= ">\n";
    
    foreach($itens as $valor => $texto)
    {
        $select_box .= "<option value=\"" . $valor . "\"";

        if((is_array($selecionado) && in_array($valor, $selecionado)) ||
        $selecionado == $valor)
        {
            $select_box .= " selected";
        }

        $select_box .= ">" . $texto . "</option>\n";
    }

    $select_box .= "</select>\n";
    
    return $select_box;
}

?>
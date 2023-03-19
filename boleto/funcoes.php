<?
define ("CodigoDaCaixa", "Código da Caixa");
//define ("CEDENTE", "Livraria Virtual Ltda.");
define ("AGENCIA_COD_CEDENTE", "1111.111.11111111.1");
define ("INSTRUCAO_RODAPE", "O pagamento até o vencimento poderá ser efetuado em qualquer Banco participante da compensação.<br>Após o vencimento somente nas agências da CEF.");

function MUDA_CNPJ($CNPJ){
	if(strlen($CNPJ) == 14){
		$X = substr($CNPJ, 0, 2).'.'.substr($CNPJ, 2, 3).'.'.substr($CNPJ, 5, 3).'/'.substr($CNPJ, 8, 4).'-'.substr($CNPJ, 12, 2);
		return $X;
	}
	elseif(strlen($CNPJ) == 11){
		$X = substr($CNPJ, 0, 3).'.'.substr($CNPJ, 3, 3).'.'.substr($CNPJ, 6, 3).'-'.substr($CNPJ, 9, 2);
		return $X;
	}
}

function SoNumeros($X){
	$tira = array(" ", ",", ".", "-","/");
	for($i=0;$i<strlen($X);$i++){	$X = str_replace($tira[$i],"", $X);	}
	return $X;
}

function colocaZeroEsquerda($X, $digitos){
	$zeros = $digitos - strlen($X);
	for($i=0;$i<$zeros;$i++){	$x .= 0;	}
	$X = $x.$X;
	return $X;
}

	function valorFormatado($x){
		if(empty($x)){
			$valor_retorno = '';
		} else {
    		$valor_retorno = number_format($x, 2, ',', '.');
			//$valor_retorno = $valor_retorno;
		}
    	return $valor_retorno;
    }

function NumeroCodigoBarra(){
	$banco = 104;
	$moeda = 9;
	$vencimento = AnoVencimento.MesVencimento.DiaVencimento;
	$database  = 19971007;
	$FatorVencimento = floor(abs(strtotime($database) - strtotime($vencimento))/86400);
//	$FatorVencimento = '0000';
	$valor = SoNumeros(valor);
	$valor = colocaZeroEsquerda($valor, 10);
	$agencia_cod_cedente = SoNumeros(AGENCIA_COD_CEDENTE);

	//$campo1 = $banco.$moeda.substr(nossoNumero,0,1).'.'.substr(nossoNumero,1,4);
	$campo1 = $banco.$moeda.'1.'.substr($agencia_cod_cedente,4,4);
	$DV_campo1 = Modulo10(SoNumeros($campo1));
	$campo1.=$DV_campo1;

	//$campo2 = substr(nossoNumero,5,5).'.'.substr($agencia_cod_cedente,0,5);
	$campo2 = substr($agencia_cod_cedente,8,2).substr(nossoNumero,0,3).'.'.substr(nossoNumero,3,5);
	$DV_campo2 = Modulo10(SoNumeros($campo2));
	$campo2.=$DV_campo2;

	//$campo3 = substr($agencia_cod_cedente,5,5).'.'.substr($agencia_cod_cedente,10,5);
	$campo3 = substr(nossoNumero,8,5).'.'.substr(nossoNumero,13,5);
	$DV_campo3 = Modulo10(SoNumeros($campo3));
	$campo3.=$DV_campo3;
	$DV_CBarra = Modulo11($banco.$moeda.$FatorVencimento.$valor.'1'.substr($agencia_cod_cedente,4,6).nossoNumero);
	$CodigoBarra = $banco.$moeda.$DV_CBarra.$FatorVencimento.$valor.'1'.substr($agencia_cod_cedente,4,6).nossoNumero;

	define("numero_digitavel","$campo1 $campo2 $campo3 $DV_CBarra $FatorVencimento.$valor");
	define("codigoDeBarra", "$CodigoBarra");
}

function Modulo10($X){
	$peso = 1;
	for($i=1;$i<=strlen($X);$i++){
	$peso = ($peso == 2)? 1:2;
		$num[$i] = substr($X, strlen($X)-$i,1)*$peso;
		if(($num[$i])>9){	$num[$i] = substr($num[$i],0,1)+substr($num[$i],1,1);	}
		$soma += $num[$i];
	}
	$resto = $soma % 10;
	if($resto == 0)	$resultado = 0;
	else $resultado = 10 - $resto;

	return $resultado;
}

function Modulo11($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9 || $resultado<=1){	$resultado=1;	}
	return $resultado;
}

function calcNossoNumero($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9){	$resultado=0;	}
	return $resultado;
}

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function CodigoDeBarra($valor){

$fino = 1;
$largo = 3;
$altura = 50;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){
    for($f2=9;$f2>=0;$f2--){
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?>
<img src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img
<?
  }
}

// Draw guarda final
?>
src=imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=imagens/p.gif width=<?=1?> height=<?=$altura?> border=0>
  <?
} //Fim da função

function ficha($ficha){
?>
<!-- \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td class=cp width=150><img src="imagens/logo-caixa.jpg" border=0 HEIGHT="30"></td>
		<td width=3 valign=bottom><img height=22 src="imagens/3.gif" width=2 border=0></td>
		<td class=cpt  width=61 valign=bottom><div align=center><font class=bc>104-0</font></div></td>
		<td width=3 valign=bottom><img height=22 src="imagens/3.gif" width=2 border=0></td>
		<td class=ld align=right width=452 valign=bottom><?if($ficha == 3){	echo numero_digitavel;	}
elseif($ficha == 2){?><span class=ld><i>Recibo do Sacado</i><?} elseif($ficha ==1){?><span class=ld><i>Ficha de Controle</i></span><?}?></td>
	</tr>
	<tr>
		<td colspan=5><img height=2 src="imagens/2.gif" width=666 border=0></td>
	</tr>
</table>
<?if($ficha == 3){?>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Local de pagamento</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Vencimento</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=15 src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12>PAGAR EM QUALQUER BANCO OU CASA LOTÉRICA ATÉ O VENCIMENTO.</td>
		<td class=cp valign=top width=7 height=12><img height=15 src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=bottom align=right width=180 style="font-size: 12px;" height=12><?=vencimento;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Agência/Código cedente</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=CEDENTE;?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=AGENCIA_COD_CEDENTE;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>
	</tr>
<?}else{?>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=305 height=13>Cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=160 height=13>Agência/Código cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Vencimento</td>
	</tr>
	<tr><?$h = 17;?>
		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=305 height=<?=$h;?>><?=CEDENTE;?></td>
		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=center width=160 height=<?=$h;?>><?=AGENCIA_COD_CEDENTE;?></td>
		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=bottom align=right width=180 height=<?=$h;?> style="font-size: 13px;"><?=vencimento;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=305 height=1><img height=1 src="imagens/2.gif" width=305 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=160 height=1><img height=1 src="imagens/2.gif" width=160 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>
	</tr>
<?}?>
</table>

<table cellspacing=0 cellpadding=0 border=0>

	<tr>

		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=113 height=13>Data do documento</td>

		<td class=ct valign=top width=7 height=13> <img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=163 height=13>N<u>o</u> documento</td>

		<td class=ct valign=top width=7 height=13> <img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=62 height=13>Espécie doc.</td>

		<td class=ct valign=top width=7 height=13> <img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=34 height=13>Aceite</td>

		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=72 height=13>Data processamento</td>

		<td class=ct valign=top width=7 height=13> <img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=180 height=13>Nosso número</td>

	</tr>

	<tr>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=113 height=12><?=date("d/m/Y");?></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top width=163 height=12>9<?=nossoNumero;?></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=62 height=12><div align=left>DS</div></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=34 height=12><div align=left>N&Atilde;O</div></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=72 height=12><div align=left><?=date("d/m/Y");?></div></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top align=right width=180 height=12><?=nossoNumero;?>-<?=calcNossoNumero(nossoNumero)?></td>

	</tr>

	<tr>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=113 height=1><img height=1 src="imagens/2.gif" width=113 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=163 height=1><img height=1 src="imagens/2.gif" width=163 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=62 height=1><img height=1 src="imagens/2.gif" width=62 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=34 height=1><img height=1 src="imagens/2.gif" width=34 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=72 height=1><img height=1 src="imagens/2.gif" width=72 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

	</tr>

</table>

<table cellspacing=0 cellpadding=0 border=0>

	<tr>

		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top COLSPAN="3" height=13>Uso do banco</td>

		<td class=ct valign=top height=13 width=7> <img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=83 height=13>Carteira</td>

		<td class=ct valign=top height=13 width=7><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=53 height=13>Espécie</td>

		<td class=ct valign=top height=13 width=7><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=123 height=13>Quantidade</td>

		<td class=ct valign=top height=13 width=7><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=72 height=13>Valor</td>

		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=180 height=13>(=) Valor documento</td>

	</tr>

	<tr><?$h = 13;?>

		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>

		<td valign=top class=cp height=12 COLSPAN="3"><div align=left>&nbsp;</div></td>

		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=83>01</td>

		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=53>R$</td>

		<td class=cp valign=top width=7 height=<?=$h;?>><img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top  width=123> </td>

		<td class=ct valign=top width=7 height=<?=$h;?> align="right">x</td>

		<td class=cp valign=top  width=72></td>

		<td class=cp valign=top width=7 height=<?=$h;?>> <img height=<?=$h;?> src="imagens/1.gif" width=1 border=0></td>

		<td class=cp valign=top align=right width=180 height=12><?=valor;?></td>

	</tr>

	<tr>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=75 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=31 height=1><img height=1 src="imagens/2.gif" width=31 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=83 height=1><img height=1 src="imagens/2.gif" width=83 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=53 height=1><img height=1 src="imagens/2.gif" width=53 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=123 height=1><img height=1 src="imagens/2.gif" width=123 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=72 height=1><img height=1 src="imagens/2.gif" width=72 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

	</tr>

</table>

<table cellspacing=0 cellpadding=0 width=666 border=0>

	<tr>

		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>

			</tr>

		</table></td>

		<td valign=top width=468 rowspan=4><font class=ct>Texto de responsabilidade do cedente</font><br><span class=cp>REFERENTE A COMPRAS PELA INTERNET
        <br><?=Instru1;?><br><?=Instru2;?><br><?=Instru3;?><br><?=Instru4;?></span></td>

		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(-) Desconto</td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

				<td class=cp valign=top align=right width=180 height=12></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

				<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

			</tr>

		</table></td>

	</tr>

	<tr>

		<td align=right width=10>

			<table cellspacing=0 cellpadding=0 border=0 align=left>

				<tr>

					<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

				</tr>

				<tr>

					<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

				</tr>

				<tr>

					<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>

				</tr>

			</table>

		</td>

		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(-) Outras deduções / Abatimentos</td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12> <img height=12 src="imagens/1.gif" width=1 border=0></td>

				<td class=cp valign=top align=right width=180 height=12></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

				<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

			</tr>

		</table></td>

	</tr>

	<tr>

		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>

			</tr></table></td>

		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(+) Mora / Multa / Juros</td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

				<td class=cp valign=top align=right width=180 height=12></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

				<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

			</tr>

		</table></td>

	</tr>

	<tr>

		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>

			</tr>

		</table></td>

		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(+) Outros acréscimos</td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

				<td class=cp valign=top align=right width=180 height=12></td>

			</tr>

			<tr>

				<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

				<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

			</tr>

		</table></td>

	</tr>

	<tr>

		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

			</tr>

		</table></td>

		<td align="center"><!-- <font style="FONT: bold 11px "Arial Narrow";">*** PAGUE NAS CASAS LOTERICAS ATÉ O VENCIMENTO ***</font> --></td>

		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>

			<tr>

				<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>



				<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>

			</tr>

			<tr>

				<td class=cp valign=top width=7 height=12><img height=12 src="imagens/1.gif" width=1 border=0></td>

				<td class=cp valign=top align=right width=180 height=12></td>

			</tr>

		</table></td>

	</tr>

</table>

<table cellspacing=0 cellpadding=0 width=666 border=0>

	<tr>

		<td valign=top width=666 height=1><img height=1 src="imagens/2.gif" width=666 border=0></td>

	</tr>

</table>

<table cellspacing=0 cellpadding=0 border=0>

	<tr>

		<td class=ct valign=top width=7 rowspan="4"><img height=38 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=30 rowspan="4">Sacado</td>

		</tr>

	<tr>

		<td class=cp valign=top><?=sacado;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPF/CNPJ: <?=MUDA_CNPJ(cpf);?></td>

	</tr>

	<tr>

		<td class=cp valign=top><?=endereco;?> - <?=bairro;?></td>

	</tr>

	<tr>

		<td class=cp valign=top><?=cidade;?> - <?=estado;?> - CEP: <?=cep;?></td>

	</tr>

</table>

<table cellspacing=0 cellpadding=0 border=0>

	<tr>

		<td class=ct valign=top width=7 height=13><img height=13 src="imagens/1.gif" width=1 border=0></td>

		<td class=ct valign=top width=470 colspan="2" height=13>Sacador/Avalista</td>

		<td class=ct valign=top width=180 height=13><?=CodigoDaCaixa;?></td>

	</tr>

	<tr>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=472 height=1><img height=1 src="imagens/2.gif" width=472 border=0></td>

		<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

		<td valign=top width=180 height=1><img height=1 src="imagens/2.gif" width=180 border=0></td>

	</tr>

</table>



<TABLE cellSpacing=0 cellPadding=0 border=0 width=666>

	<TR>

		<TD class=ct width=416></TD>

		<TD class=ct width=250><div align=right>Autenticação mecânica<?if($ficha == 3){?> - <b class=cp>Ficha de Compensação</b><?}?></div></TD>

	</TR>

	<TR>

		<TD class=ct colspan=3></TD>

	</tr>

</table>

<?if($ficha == 3){?><TABLE cellSpacing=0 cellPadding=0 width=666 border=0>

	<TR>

		<TD vAlign=bottom align=left height=50><?CodigoDeBarra(codigoDeBarra);?></TD>

	</tr>

</table>

<?

} 

elseif($ficha == 2){

?><table cellspacing=0 cellpadding=0 width=666 border=0>

	<tr>

		<td width=7></td>

		<td width=500 class=cp><font style="font-size:8px;"><?=INSTRUCAO_RODAPE;?></font></td>

		<td width=159></td>

	</tr>

</table>

<?

}



if($ficha != 3){?>

<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>

	<TR>

		<TD class=ct width=666><div align=right>Corte na linha pontilhada</div></TD>

	</TR>

	<TR>

		<TD class=ct width=666><img height=1 src="imagens/6.gif" width=665 border=0></TD>

	</tr>

	<TR>

		<TD class=ct height="18" width=666></TD>

	</TR>

</table>

<?}?>

<!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ -->

<?

}

?>


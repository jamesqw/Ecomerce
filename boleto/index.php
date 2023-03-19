<?
/* Funcoes para haver nao cache */
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
  header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
  header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
  header ("Pragma: no-cache");                          
/* Fim */
?>
<HTML>
<HEAD>
<TITLE>[ BOLETO CAIXA ] ------ </TITLE>
<style type=text/css>
<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=15 bottommargin=5>
<table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table>
<?

include "funcoes.php";

define ("valor", "$valor");
define ("CEDENTE", "$empresa");

define ("nossoNumero", "000000000$nossoNumero");
define ("vencimento", "$vencimento");

define ("sacado", "$sacado");
define ("cpf", "$cpf");
define ("endereco", "$endereco");
define ("bairro", "$bairro");
define ("cidade", "$cidade");
define ("cep", "$cep");
define ("estado", "$estado");

define ("Instru1", "* NAO RECEBER APOS O VENCIMENTO *");
define ("Instru2", "");
define ("Instru3", "");
define ("Instru4", "");

	NumeroCodigoBarra($nossoNumero,$vencimento);
/*
	////////////// RECIBO DO SACADO //////////////////////////////
*/
//ficha(1);
/*
	////////////// RECIBO DO SACADO //////////////////////////////////
*/
ficha(2);
/*
	////////////// FICHA QUE CONTEM O CODIGO DE BARRA //////////////
*/
ficha(3);
?>
</BODY>
</HTML>

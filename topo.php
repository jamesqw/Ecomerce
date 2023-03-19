<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<style type="text/css">
<!--
@import url("css.css");
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body>
<div id="Layer1" style="position:absolute; left:336px; top:136px; width:614px; height:40px; z-index:1; visibility: visible;"> 
  <?   if (isset($nomecli))
   {
    // nome = Luis Carlos Silva
    // nome[0] = Luis
    // nome[1] = Carlos
    $nome    = explode(" ", $nomecli);
    $prinome = $nome[0];
echo " <font  size=1 face=Arial > Olá $prinome, Seja Bem-Vindo (Se não for você  =><A HREF='identificacli.php'  target='mainFrame'> Clique Aqui </A>";
   }
  else
   {
    echo "<font  size=1 face=Arial >Bem-Vindo! Identifique-se =>
         <A HREF='identificacli.php' target='mainFrame' > Clicando Aqui </A></font>";
   } ?>
</div>
<div id="Layer2" style="position:absolute; left:691px; top:136px; width:440px; height:35px; z-index:2"> 
  <? include("data.php"); ?>
</div>
<div align=center>
  <p><img src="top.jpg" width="801" height="122" align="middle"> 
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="28%"><form action="pesquisa.php" target="mainFrame" method="post"><input name="palavra" type="text">
    <input name="submit" type="submit"  value="Ok" title="Pesquisar"></form></td>

    <td width="12%"><div align="center"><a href="area.php"   target="mainFrame" class="buttons">INICIO</a></div></td>
    <td width="12%"><div align="center"><a href="pesquisa.php" target="mainFrame" class="buttons">PRODUTOS</a></div></td>
    <td width="12%"><div align="center"><a href="gerencia/index.htm" target="mainFrame" class="buttons">GERENCIA</a></div></td>
    <td width="12%"><div align="center"><a href="carrinho.php" target="mainFrame" class="buttons">CARRINHO</a></div></td>
     <td width="12%"><div align="center"><a href="pedidos/pedidos.php"   target="mainFrame" class="buttons">PEDIDOS</a></div></td>
    <td width="12%"><div align="center"><a href="email.php" target="mainFrame" class="buttons">CONTATO</a></div></td>
  </tr>
</table>
</p>

<p>&nbsp; </p>
</div>
</body>

</html>

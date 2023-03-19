<?php
  session_start();
  $acesso = $_SESSION["acesso"];
//  echo "--- $acesso ---";
//  echo "=== $nome ===";
  if (! $acesso)
    header("Location: index.htm");
?>
<HTML>
<HEAD>
 <TITLE>Menu - SULPEL INFORMÁTICA</TITLE>
</HEAD>
<BODY>
<CENTER><FONT FACE="TAHOMA"><B>
.: Menu Principal :. <P>
<A HREF="inclivro.php"> Incluir Produtos </A> <P>
<A HREF="listalivro.php"> Listar Produtos </A> <P>
<A HREF="listacliente.php"> Listar Clientes </A> <P>
<A HREF="listavendas.php"> Listar Vendas </A> <P>
</BODY>
</HTML>

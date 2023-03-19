<?php
  session_start();
  $acesso = $_SESSION["acesso"];
  if (! $acesso)
    header("Location: index.htm");
?>
<HTML>
<HEAD>
<TITLE> SULPEL INFORMÁTICA </TITLE>
</HEAD>
<BODY>
<CENTER><FONT FACE="TAHOMA"><B> Inclusão de Produtos <P>
<FORM METHOD="POST" enctype="multipart/form-data" ACTION="inclivro2.php">
Produto: <INPUT TYPE="TEXT" SIZE=30 NAME="titulo"><P>
Descrição:  <INPUT TYPE="TEXT" SIZE=30 NAME="autor"><P>
Preço:  <INPUT TYPE="TEXT" SIZE=12 NAME="preco"><P>
Foto:   <INPUT TYPE="FILE" NAME="foto" VALUE="Selecionar"><P>
<INPUT TYPE="SUBMIT" VALUE="Enviar"> <P>
</FORM>
<P ALIGN="RIGHT"> <A HREF="menu.php"> Menu </A>
</BODY>
</HTML>

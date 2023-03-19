<html>
<body>
<div align="center">

<?php
  //session_start();
  if (! isset($numitens))
  {
    echo "Não há itens no seu carrinho de compras";
    exit;
  }
  echo "<b>[Meu Carrinho - Etapa 1 / 4]</b><p>";
  $total = 0;
  echo "<CENTER><TABLE BORDER=1 WIDTH=90%>";
  echo "<TR><TD> Nome <TD> Quant <TD> Preço <TD> Subtotal";
  for ($i = 1; $i <= $numitens; $i++)
  {
    if ($vetquant[$i] > 0)
    {
      echo "<TR><FORM METHOD='POST' ACTION=
           'alteraitem.php?item=$i'> ";
      echo "<TD> $vettitulo[$i]";
      echo "<TD> <INPUT TYPE='TEXT' SIZE=3 NAME='quant'
            VALUE='$vetquant[$i]'>";
      echo "<INPUT TYPE='SUBMIT' NAME='botao'
            VALUE='Alterar'>";
      echo "<INPUT TYPE='SUBMIT' NAME='botao'
            VALUE='Excluir'>";
      $preco = number_format($vetpreco[$i], 2, ",", ".");
      echo "<TD ALIGN='RIGHT'> $preco";
      $subtotal  = $vetquant[$i] * $vetpreco[$i];
      $subtotal1 = number_format($subtotal, 2, ",", ".");
      echo "<TD ALIGN='RIGHT'> $subtotal1";
      $total = $total + $subtotal;
      echo "</TD></FORM></TR>";
    }
  }
  echo "<TR><TD COLSPAN=3 ALIGN='RIGHT'> Total";
  $total1 = number_format($total, 2, ",", ".");
  echo "<TD ALIGN='RIGHT'> $total1";
?>
</table>

<TABLE WIDTH=84%>
<TR><TD><A HREF='novidades.php'>Continuar Comprando</A>
    <TD ALIGN="RIGHT">
    <A HREF='carrinho2.php'>Concluir Pedido [2/4]</A>
</TABLE>
</div>
</body>
</html>







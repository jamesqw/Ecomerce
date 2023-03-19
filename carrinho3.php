<html>
<body>
<div align="center">


<?php
  //session_start();
  echo "<b>[Meu Carrinho - Etapa 3 / 4]</b><p>";
  $db = mysql_connect("localhost",
                      "root", "");
  mysql_select_db("sulpel", $db);
  $dados = mysql_query("select * from sulpel_clientes
           where email = '$email' and senha = '$senha' ");
  if (mysql_num_rows($dados) == 1)
   {
     $linha = mysql_fetch_array($dados);
     $cod   = $linha["codigo"];
     $nome  = $linha["nome"];
     
     echo "Nome: $nome <hr>";
     echo "Forma de Pagamento";
     echo "<FORM METHOD='POST' ACTION='carrinho4.php?cod=$cod'>";
     echo "<INPUT TYPE='RADIO' NAME='formapg'
           VALUE='Boleto'> Boleto";
     echo "<INPUT TYPE='RADIO' NAME='formapg'
           VALUE='Deposito'> Depósito";
     echo "<INPUT TYPE='RADIO' NAME='formapg'
           VALUE='Cartao'> Cartão de Crédito <hr>";
           
     echo "<b>Produtos do seu Pedido</b>";
     
     $total = 0;
     echo "<CENTER><TABLE BORDER=1 WIDTH=90%>";
     echo "<TR><TD> Título <TD> Quant <TD> Preço <TD> Subtotal";
     for ($i = 1; $i <= $numitens; $i++)
     {
       if ($vetquant[$i] > 0)
        {
         echo "<TR><TD> $vettitulo[$i]";
         echo "<TD> $vetquant[$i] ";
         $preco = number_format($vetpreco[$i], 2, ",", ".");
         echo "<TD ALIGN='RIGHT'> $preco";
         $subtotal  = $vetquant[$i] * $vetpreco[$i];
         $subtotal1 = number_format($subtotal, 2, ",", ".");
         echo "<TD ALIGN='RIGHT'> $subtotal1";
         $total = $total + $subtotal;
        }
     }
     echo "<TR><TD COLSPAN=3 ALIGN='RIGHT'> Total";
     $total1 = number_format($total, 2, ",", ".");
     echo "<TD ALIGN='RIGHT'> $total1";
     echo "</TABLE>";
     echo "<P ALIGN='RIGHT'>";
     echo "<INPUT TYPE='SUBMIT' VALUE='Finaliza Compra'></FORM>";
   }
  else
  {
     echo "Erro. Dados Inválidos <p>";
     echo "<A HREF='clientes/enviasenha.php?email=$email'>";
     echo "Clique aqui</A> caso você queira receber ";
     echo "sua senha por e-mail";
  }
  mysql_close($db);
?>
</div>
</BODY>
</HTML>




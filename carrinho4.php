<html>
<body>
<div align="center">
<?php
   //session_start();
   $db = mysql_connect("localhost", "root", "");
   mysql_select_db("sulpel",$db);
   $dados = mysql_query("select * from sulpel_clientes
            where codigo = $cod");
   $linha = mysql_fetch_array($dados);
   $nome  = $linha["nome"];
   $email = $linha["email"];

   $data = date("Y-m-d");
   $dados = mysql_query("insert into sulpel_vendas(codcli, data) values($cod, '$data')");
   if (! $dados)
   {
     echo "Erro na Inclusão. Compra não finalizada";
     exit;
   }

   $total  = 0;
   $codven = mysql_insert_id($db);  // retorna o codigo da venda
   for ($i = 1; $i <= $numitens; $i++)
   {
     if ($vetquant[$i] > 0)
     {
       $dados = mysql_query("insert into sulpel_itensvendas(codvenda,
           codlivro, quant, preco) values($codven, $vetcodigo[$i],
           $vetquant[$i], $vetpreco[$i])");
       $total = $total + ($vetquant[$i] * $vetpreco[$i]);
     }
   }
   $dados = mysql_query("update sulpel_vendas set total = $total
                 where codven = $codven");

   if ($formapg == "Deposito")
   {
     echo "Estamos aguardado o seu Depósito no valor de <BR>";
     echo "$total para enviar os seus Produtos. <P>";
     echo "Banco: Bradesco <br>";
     echo "Agência: 3223223 <br>";
     echo "Conta : 1212121 ";
   }
   else if($formapg == "Boleto")
   {
     echo "Efetue o pagamento do seu Boleto Bancário <br>";
     echo "para o envio dos seus Produtos. <P>";

     $venc = mktime (0, 0, 0, date("m"), date("d")+5, date("Y"));
     $venc = date("d/m/Y", $venc);

     echo "<form method='post' action='../boleto/index.php' target='_blank'>";
     echo "<input type='hidden' name='empresa' value='Sulpel Informática'>";
     echo "<input type='hidden' name='valor' value='$total'>";
     echo "<input type='hidden' name='vencimento' value='$venc'>";
     echo "<input type='hidden' name='sacado' value='$nome'>";
     echo "<input type='hidden' name='nossoNumero' value='$codven'>";
     echo "<input type='submit' value='Emitir Boleto'>";
     echo "</form>";
   }
   else if($formapg == "Cartao")
   {
     echo "Efetue o pagamento do seu Cartão do Crédito <br>";
     echo "para o envio dos seus Produtos. <P>";

 ?>
 

          <form Method="post" action="https://trab.webseguro.com/pgcartao.php">
     Nome : <input type="text" size=30 name="nome"><p>
     Nº cartão : <input type="text" size=20 name="cartão"> <p>
     Validade : <select name="validade">
         <option>10/2007
         <option>11/2007
         <option>12/2007
         </select>

<input type="submit" value="enviar">
<input type="reset"  value="Limpar">

</form>


 <?


       }

   session_destroy();
   echo "Ok $nome!! Compra Confirmada <P>";
   mysql_close($db);
?>
            
 </div>
</BODY>
</HTML>
   
   
   
   
   
   
   
   
   

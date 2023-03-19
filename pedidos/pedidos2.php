<?php


  $db = mysql_connect("localhost", "root",
                      "");
  mysql_select_db("sulpel", $db);

   $email=$_POST["email"];
   $senha=$_POST["senha"];

  $cliente = mysql_query("select * from sulpel_clientes  where email
                               ='$email' and senha='$senha' ");


                               
   if (mysql_num_rows($cliente) == 0)
   {
     echo "Erro. Dados Incorretos";
     exit;
   }
     $linhac= mysql_fetch_array($cliente);
     $codigo = $linhac["codigo"];
     $nome = $linha ["nome"];
     
     echo "<center><b>Nome do Cliente : $nome<p> ";
     echo "Relação dos Pedidos";
     
                      $venda = mysql_query("select * from sulpel_vendas
                                              where codcli=$codigo");
                                                  
         while ($linhav = mysql_fetch_array($venda))
         
               {
                $codven = $linhav["codigo"];
                $data   = $linhav["data"];
                $total  = $linhav["total"];
                $total1 = number_format($total,2, "," , ".");
                $status =$linha ["status"];
                
                echo "<table> <tr bgcolor='ffff00'>";
                echo "<td> Nº $codven";
                echo "<td> Data : $tdata";
                echo "<td>Total : $total1";
                echo "<td>$Status";

                      $itens = mysql_query("select I.quant, L.titulo,
               I.preco from sulpel_itensvendas as I,
               sulpel_prod as L where I.codlivro = L.codigo
               and I.codvenda = $codven");


             while ($linhai = mysql_fetch_array($itens))
      {
          $quant = $linhai["quant"];
          $produto  = $linhai["titulo"];
          $preco = $linhai["preco"];
          $preco1 = number_format($preco, 2, ",", ".");

          echo "<TR><TD ALIGN='RIGHT'> $quant";
          echo "<TD COLSPAN=2> $produto";
          echo "<TD ALIGN='RIGHT'> $preco";
      }
      echo "</TABLE>";
   }

   mysql_close($db);
?>


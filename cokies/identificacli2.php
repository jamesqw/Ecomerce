<?php
  $db = mysql_connect("mysql02.trab.com.br",
                      "", "");
  mysql_select_db("trab2", $db);
  $dados = mysql_query("select * from sulpel_clientes
           where email = '$email' and senha = '$senha' ");
  if (mysql_num_rows($dados) == 1)
   {
     $linha = mysql_fetch_array($dados);
     $nome  = $linha["nome"];
     // Grava um cookie:
     // nome do cookie, conteúdo, tempo de duração
     setcookie("nomecli", $nome, time()+100000);
     header("Location: index.php");
   }
  else
     echo "Erro. Dados Inválidos";
?>

<?php
  $db = mysql_connect("localhost", "root",
                      "");
  mysql_select_db("sulpel", $db);
  $dados = mysql_query("select * from sulpel_prod where
             codigo = $cod");
  session_start();
  if (! isset($numitens))    // ou seja, é a 1ª compra
  {
    session_register("numitens");
    $numitens = 0;
    session_register("vetcodigo");
    session_register("vetquant");
    session_register("vettitulo");
    session_register("vetpreco");
  }
  $numitens++;
  $vetcodigo[$numitens] = $cod;
  $vetquant[$numitens]  = 1;

  $linha = mysql_fetch_array($dados);
  $vettitulo[$numitens] = $linha["titulo"];
  $vetpreco[$numitens]  = $linha["preco"];
  
  mysql_close($db);
  
  include("carrinho.php");
?>








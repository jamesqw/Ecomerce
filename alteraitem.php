<?php
  session_start();
  if ($botao == 'Alterar')
    $vetquant[$item] = $quant;
  else
    $vetquant[$item] = 0;
  header("Location: carrinho.php");
?>


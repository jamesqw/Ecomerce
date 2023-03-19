<?php
  if (isset($nomecli))
   {
    // nome = Luis Carlos Silva
    // nome[0] = Luis
    // nome[1] = Carlos
    $nome    = explode(" ", $nomecli);
    $prinome = $nome[0];
    echo "Olá $prinome, Seja Bem-Vindo (Se não for você
         <A HREF=identificacli.php> Clique Aqui </A>";
   }
  else
   {
    echo "Bem-Vindo! Identifique-se
         <A HREF=identificacli.php> Clicando Aqui </A>";
   }
?>

<?php
  if ($nome=="" or $email=="" or $senha1=="")
   {
    echo "Preencha Todos os Campos";
    exit;
   }
  if ($senha1!=$senha2)
   {
    echo "Senhas Diferentes";
    exit;
   }
  $db = mysql_connect("",
                      "", "");
  mysql_select_db("trab2", $db);
  $dados = mysql_query("insert into sulpel_clientes(nome,
    email, senha) values ('$nome', '$email', '$senha1') ");
  if ($dados)
    echo "Ok! Cadastro Efetuado com Sucesso";
  else
    echo "Erro no cadastro";
  mysql_close($db);
?>
           

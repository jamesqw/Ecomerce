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
  $db = mysql_connect("localhost","root", "");
  mysql_select_db("root", $db);

  $dados = mysql_query("select * from sulpel_clientes where
                        email = '$email' ");
  if (mysql_num_rows($dados) > 0)
  {
    echo "Você já está cadastrado <p>";
    echo "<A HREF='enviasenha.php?email=$email'> Clique aqui </A>";
    echo "para receber sua senha por e-mail";
    exit;
  }

  $dados = mysql_query("insert into sulpel_clientes(nome,
    email, senha) values ('$nome', '$email', '$senha1') ");
  if ($dados)
    echo "Ok! Cadastro Efetuado com Sucesso";
  else
    echo "Erro no cadastro";
  mysql_close($db);
?>
           

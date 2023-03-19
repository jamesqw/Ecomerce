<?php
  session_start();
  $acesso = $_SESSION["acesso"];
 if (! $acesso)
    header("Location: index.htm");
 $db=mysql_connect("localhost","root","");
  mysql_select_db("sulpel", $db);
  
   $titulo=$_POST["titulo"];
   $autor=$_POST["preco"];
   $preco=$_POST["preco"];
   $foto=$_FILES["foto"];
  
  	 
  $dados=mysql_query("insert into sulpel_prod(titulo, autor, preco) values ('$titulo', '$autor', $preco)");
 
 
  if ($dados)
  {
    // incluir a imagem
    $cod = mysql_insert_id($db);
    $destino ="../imagens/" . $cod . ".jpg";
    move_uploaded_file($foto["tmp_name"], $destino);
    echo "Ok! Produto Corretamente Cadastrado";
  }
  else
    echo "Erro... Inclusão não realizada";
    
  mysql_close($db);
?>


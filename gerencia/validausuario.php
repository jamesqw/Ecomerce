<?
    $nome=$_POST["nome"];
    $senha=$_POST["senha"];
    $db=mysql_connect("localhost","root","");
	mysql_select_db("sulpel", $db);

	$dados=mysql_query("select * from sulpel_usuarios where nome = '$nome' and senha = '$senha'");


	
	if(mysql_num_rows($dados) == 1)
	{


      header("Location: menu.php");
	}
	else
    {
	  echo "Senha inválida <P>";
	  echo "<CENTER><A HREF='index.htm'> Voltar </A>";
	}
	mysql_close($db);
?>	     




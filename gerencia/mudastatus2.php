<?php // session_start();
   //if (! $acesso)
   //   header("Location: index.htm");

   $db=mysql_connect("localhost","root","");
   mysql_select_db("sulpel", $db);
   
   $cmd = mysql_query("update sulpel_vendas set codstatus =
              $status where codigo = $cod");
              
   if ($cmd)
     echo "Ok! Alteração de Status concluída";
   else
     echo "Erro... Não alterado";
     
   mysql_close($db);
?>
<P ALIGN="RIGHT">
<A HREF="listavendas.php"> Voltar </A>

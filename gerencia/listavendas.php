<?php
   function sqltodate($dt)
   {
     // 0123456789
     // 2007-10-31
     $ano = substr($dt, 0, 4);
     $mes = substr($dt, 5, 2);
     $dia = substr($dt, 8, 2);
     return $dia . "/" . $mes . "/" . $ano;
   }
  // session_start();
//   if (! $acesso)
//      header("Location: index.htm");

   $db=mysql_connect("localhost","root","");
   mysql_select_db("sulpel", $db);
   
   $dados = mysql_query("select v.codigo, v.data, v.total,
       v.formapg, s.descricao, c.nome from sulpel_vendas as v,
       sulpel_clientes as c, sulpel_status as s where
       v.codcli = c.codigo and v.codstatus = s.codigo
       order by v.codigo");
   
   echo "<TABLE BORDER=1>";
   
   while ($linha = mysql_fetch_array($dados))
   {
     $cod     = $linha["codigo"];
     $data    = $linha["data"];
     $data    = sqltodate($data);
     $total   = $linha["total"];
     $total   = number_format($total, 2, ",", ".");
     $formapg = $linha["formapg"];
     $status  = $linha["descricao"];
     $nome    = $linha["nome"];
     echo "<TR><TD> $cod";
     echo "<TD> $nome";
     echo "<TD> $data";
     echo "<TD> $formapg";
     echo "<TD> $total";
     echo "<TD> $status";
     echo "<TD> <A HREF='mudastatus.php?cod=$cod'>
           Status </A>";
   }
   echo "</TABLE>";
   mysql_close($db);
?>
     
     
     
     
     
     
     
     

     

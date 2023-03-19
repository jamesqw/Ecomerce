<?php  //session_start();
  //if (! $acesso)
    //  header("Location: index.htm");

   $db=mysql_connect("localhost","root","");
   mysql_select_db("sulpel", $db);
   
   $dados = mysql_query("select v.codigo, v.data, v.total,
       v.formapg, s.descricao, c.nome from sulpel_vendas as v,
       sulpel_clientes as c, sulpel_status as s where
       v.codcli = c.codigo and v.codstatus = s.codigo
       and v.codigo = $cod
       order by v.codigo");

   $linha   = mysql_fetch_array($dados);
   $cliente = $linha["nome"];
   $data    = $linha["data"];
   $status  = $linha["descricao"];
   
   echo "<TABLE BORDER=1>";
   echo "<TR><TD COLSPAN=2><CENTER><B> Alteração do
                                       Status da Venda";
   echo "<TR><TD> Código <TD> $cod";
   echo "<TR><TD> Nome do Cliente <TD> $cliente";
   echo "<TR><TD> Data <TD> $data";
   echo "<TR><TD> Status <TD>";
   echo "<FORM METHOD='POST'
          ACTION='mudastatus2.php?cod=$cod'>";
   echo "<SELECT NAME='status'>";
   
   $dados = mysql_query("select * from sulpel_status");
   
   while ($linha = mysql_fetch_array($dados))
   {
     $codstatus = $linha["codigo"];
     $descricao = $linha["descricao"];
     if ($status == $descricao)
        echo "<OPTION VALUE='$codstatus' SELECTED> $descricao";
     else
        echo "<OPTION VALUE='$codstatus'> $descricao";
   }
   echo "</SELECT>";
   echo "<TR><TD COLSPAN=2><CENTER>";
   echo "<INPUT TYPE='submit' VALUE='Alterar'>";
   echo "</FORM></TABLE>";
   mysql_close($db);
?>
   
   

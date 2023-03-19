<html>
<body>
<div align="center">

<? $db=mysql_connect("localhost","sulpel","");
  mysql_select_db("sulpel", $db);
  $dados=mysql_query("select  v.codigo, v.data,v.total,c.nome,s.descricao
                     from xxxvendas as v, xxxclientes as c , xxxstatus as  s,
                     where v.codcli= c.codigo and v.codstatus=s.codigo and v.codigo=$cod");


echo "<table border=1>";
echo "<tr><td colspan=2><b><center>Alteração Status dos Pedidos";

while ($linha=mysql_fetch_array($dados))

      {

       $cliente=$linha["nome"];
       $data=$linha["data"];
       
       echo "<tr><td>Código<td>$cod";
       echo "<tr><td>Nome<td>$cliente";
       echo "<tr><td>status<td>";
       echo "<form Mehotd='post' action='mudastatus2.php?cod=$cod'>"
       
        echo "<select name='status'>";
       $dados=mysql_query( " select * from xxxstatus");
       
          while ($linha=mysql_fetch_array($dados))
          
          {
          
          $codigo=$linha["codigo"];
          $descricao=$linha["descricao"];
     if ($status == $descricao)
        echo "<OPTION VALUE='$codstatus' SELECTED> $descricao";
     else
        echo "<OPTION VALUE='$codstatus'> $descricao";
   }
          
          
          echo "<option Value='$codigo'>";
          }
          
          echo "</select> </from> </table>";
          
?>
</div>
</BODY>
</HTML>
          


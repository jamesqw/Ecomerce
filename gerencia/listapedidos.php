<?$db=mysql_connect("localhost","root","");
  mysql_select_db("sulpel", $db);
  $dados=mysql_query("select  v.codigo, v.data,v.total,c.nome,s.descricao
                     from xxxvendas as v, xxxclientes as c , xxxstatus as  s,
                     where v.codcli= c.codigo and v.codstatus=s.codigo
                     order by v.codigo");

echo "<table border=1>";
echo "<tr><td colspan=2><b><center>Listagem dos Pedidos";

while ($linha=mysql_fetch_array($dados))

      {
       $cod=$linha["codigo"];
       $data=$linha["data"];
       $total=$linha["total"];
       $cliente=$linha["cliente"];
       $status=$linha["descricao"];

       echo "<tr><td>$cod <td>$cliente <td>$data";
       
       echo "<tr><td>$total <td>$status <td>";
       
       echo "<a href='mudastatus.php?cpd=$cod'>";
       
       echo "Alterar</a>";
}

echo "</table>";

     mysql_close(db);
?>

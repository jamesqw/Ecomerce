<?
  $db=mysql_connect("localhost","root","");
  mysql_select_db("sulpel", $db);
  $dados=mysql_query("select titulo from sulpel_prod order by titulo");
  echo "<SELECT NAME='Produtos'>";
  $num = 0;
  while ($linha = mysql_fetch_array($dados))
  {
    $titulo = $linha["titulo"];
    $num++;
    if ($num == 1)
       echo "<OPTION SELECTED> $titulo";
    else
       echo "<OPTION> $titulo";
  }
  echo "</SELECT>";
  mysql_close($db);
?>

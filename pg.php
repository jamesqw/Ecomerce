<?

$host = "localhost";
$user = "root";
$pass = "";
$db = "sulpel";

$max = 10; // Aqui você coloca quantos resultados por página vc deseja.

if(!$pagina){
$pagina = 1;
} 

$inicio = $pagina -1;
$inicio = $inicio * $max;

mysql_connect($host,$user,$pass);
mysql_select_db($db);

$consulta = "SELECT * FROM  sulpel_prod order by titulo asc";  // Aqui você coloca o nome da sua tabela

$query = mysql_query("$consulta LIMIT $inicio,$max");
$todos = mysql_query($consulta);
$total = mysql_num_rows($todos);

$tp = $total / $max;

echo "<table>";
    $cont = 0;

While($linha = mysql_fetch_array($query)){  // Aqui você coloca de acordo com o nome dos campos criados na tabela, exemplo: $x[data], $x[telefone].


       $cont ++;
      $codigo = $linha["codigo"];
      $titulo = $linha["titulo"];
      $autor  = $linha["autor"];
      $preco1 = $linha["preco"];
      $preco  = number_format($preco1, "2", ",", ".");
         if ($cont % 2 == 1)
      
      
       echo "<tr>";
       echo "<TD> $titulo <BR>";
      echo "$autor <BR>";
      echo "Preço: $preco <p>";
      echo "<A HREF='novoitem.php?cod=$codigo'>
            <img src='btcompra.gif'> </A>";


}

$prox = $pagina +1;
$ante = $pagina -1;

if($pagina>0)
Echo "<a href='?pagina=$ante'>Anterior</a>";


Echo "|";

if($pagina<$tp)
Echo "<a href='?pagina=$prox'>Próxima</a>";

?>

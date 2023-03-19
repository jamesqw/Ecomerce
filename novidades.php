<HTML>
<BODY>
      <div align="center">
     <FONT FACE="TAHOMA"><b>Novidades</B><P> </div>
    <div align="center">
<?php  $db = mysql_connect("localhost", "root",
                      "");
  mysql_select_db("sulpel", $db);


  $dados = mysql_query("select * from sulpel_prod where
             novidade = 'X'");

    echo "<TABLE font size=2>";
    $cont = 0;

    while ($linha = mysql_fetch_array($dados))
    {
      $cont ++;
      $codigo = $linha["codigo"];
      $titulo = $linha["titulo"];
      $autor  = $linha["autor"];
      $preco1 = $linha["preco"];
      $preco  = number_format($preco1, "2", ",", ".");
      if ($cont % 2 == 1)
        echo "<TR>";
	  echo "<TD> <a href=imagens/".$codigo.".jpg
                       target=blank width=130 height=160 title=Ampliar> <IMG SRC=imagens/".$codigo.".jpg
                        width=50 height=80>";
                        echo"<br>";

      echo "<TD> $titulo <BR>";
      echo "$autor <BR>";
      echo "Preço: $preco <p>";
      echo "<A HREF='novoitem.php?cod=$codigo'>
            <img src='btcompra.gif'> </A>";

    }


    echo "</TABLE>";


  mysql_close($db);
?>
</div>
</BODY>
</HTML>

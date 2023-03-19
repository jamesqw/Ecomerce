<?php
    // session_start();
    //if (! $acesso)
      //   header("Location:index.php");

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    $comando = mysql_query("select * from sulpel_prod order by codigo");

    echo "<center> <TABLE width=80% border=1>";
    echo "<TR><TD COLSPAN=5> <B> <center> Livros Cadastrados </B>";
    while ($linha = mysql_fetch_array($comando))
    {
     $cod = $linha["codigo"];
     $titulo = $linha["titulo"];
     $autor = $linha["autor"];
     $precox = $linha["preco"];
     $preco = number_format($precox, 2, ',', '.');
     $novidade = $linha["novidade"];
     if ($novidade == "X")
         $cor = "<font color=ff0000>";
     else
         $cor = "<font color=0000ff>";

     echo "<TR><TD>$cor<center>$cod <TD>$cor &nbsp; $titulo <TD>$cor &nbsp; $autor <TD ALIGN='RIGHT'>$cor $preco &nbsp; <TD><CENTER>";
     echo "<A HREF=destaca.php?cod=$cod><IMG SRC=abre.gif border=0></A> &nbsp;&nbsp;";
     echo "<A HREF=altlivro.php?cod=$cod><IMG SRC=alt.gif border=0></A> &nbsp;&nbsp;";
     echo "<A HREF=exclivro.php?cod=$cod><IMG SRC=exc.gif border=0></A>";
   }

   mysql_close($conecta);

?>
</table>

<br><br><br>
<p align=right><B><a href="menu.php"> Menu </a>

</body>
</html>


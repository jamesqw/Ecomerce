<?php //session_start();
    //if (! $acesso)
      //   header("Location: index.htm");
        // exit;

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    
      $comando = mysql_query("select * from sulpel_clientes order by nome");
      
     //   $cod = $_POST["codigo"];
 //  $nome = $_POST["nome"];
  //  $email = $_POST["email"];

    echo "<center> <TABLE width=80% border=1>";
    echo "<TR><TD COLSPAN=5> <B> <center> Clientes Cadastrados </B>";
    while ($linha = mysql_fetch_array($comando))
    {
     $cod = $linha["codigo"];
     $nome = $linha["nome"];
     $email = $linha["email"];



     echo "<TR><TD>$cod <TD>$nome <TD>$email <TD ALIGN='RIGHT'>";
     echo "<A HREF=altcliente.php?cod=$cod><IMG SRC=alt.gif border=0></A>";
     echo "<A HREF=excliente.php?cod=$cod><IMG SRC=exc.gif border=0></A>";

   }

   mysql_close($conecta);

?>
</table>

<br><br><br>
<p align=right><B><a href="menu.php"> Menu </a>

</body>
</html>


<?

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    $comando = mysql_query("update sulpel_prod set titulo = '$titulo',
                            autor = '$autor', preco = '$preco'
                            where codigo = '$cod'");
    if ($foto != '')
    {
      $destino = "../imagens/" . $cod . ".jpg";
      copy("$foto", $destino);
    }
    
    if ($comando)
      echo "Ok! Alteração corretamente efetuada";
    else
      echo "Erro. Alteração não realizada";

    mysql_close($conecta);
?>
<br><br><br>
<p align=right><B><a href="menu.php"> Menu </a>

                            

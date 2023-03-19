<?php
    session_start();
    if (! $acesso)
         header("Location:index.php");

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    $comando = mysql_query("delete from  sulpel_prod
                            where codigo = $cod");
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

                            

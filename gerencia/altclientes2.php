<?php
    session_start();
    if (! $acesso)
         header("Location:index.php");

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    $comando = mysql_query("update sulpel_clientes set nome = '$nome',
                            email = '$email', senha = $senha
                            where codigo = $cod");

    if ($comando)
      echo "Ok! Alteração corretamente efetuada";
    else
      echo "Erro. Alteração não realizada";

    mysql_close($conecta);
?>
<br><br><br>
<p align=right><B><a href="menu.php"> Menu </a>

                            

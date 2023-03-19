<?php
    session_start();
    if (! $acesso)
         header("Location:index.php");

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    
    $comando = mysql_query("select * from sulpel_prod where codigo = $cod");
    $linha = mysql_fetch_array($comando);
    $novidade = $linha["novidade"];

    if ($novidade == "X")
         $comando = mysql_query("update sulpel_prod set novidade = ' ' where codigo = $cod");
    else
         $comando = mysql_query("update sulpel_prod set novidade = 'X' where codigo = $cod");

    if ($comando)
        header("Location: listalivro.php");
    else
        echo "Erro na Alteração";
    mysql_close($conecta);
?>

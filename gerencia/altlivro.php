<?

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);

     $cod=$_GET["cod"];

    $comando = mysql_query("select * from sulpel_prod where codigo = $cod");

    $linha = mysql_fetch_array($comando);
    
    $titulo = $linha["titulo"];
    $autor  = $linha["autor"];
    $preco  = $linha["preco"];
    
    echo "<CENTER><TABLE BORDER=1 WIDTH=80%>";
    echo "<TR><TD COLSPAN=2> <B><CENTER> Alteração de Produtos";
    echo "<TR><TD><FORM METHOD='POST' ENCTYPE='multipart/form-data'
          ACTION='altlivro2.php?cod=$cod'>";
   echo "Produto: <INPUT TYPE='TEXT' SIZE=30 NAME='titulo' VALUE='$titulo'><P>";
   echo "Descrição: <INPUT TYPE='TEXT' SIZE=30 NAME='autor' VALUE='$autor'><P>";
   echo "Preço: <INPUT TYPE='TEXT' SIZE=12 NAME='preco' VALUE='$preco'><P>";
   echo "<TD><CENTER><IMG SRC='../imagens/" . $cod . ".jpg'> <P>";
   echo "<INPUT TYPE='FILE' NAME='foto'>";
   echo "<TR> <TD COLSPAN=2> <INPUT TYPE='SUBMIT' VALUE='Alterar'>";
   echo "</FORM> </TABLE>";
   
    mysql_close($conecta);
?>



    

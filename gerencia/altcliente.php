<?php
    session_start();
    if (! $acesso)
         header("Location:index.php");

    $conecta =mysql_connect("localhost","root","");
    mysql_select_db("sulpel", $conecta);
    $comando = mysql_query("select * from sulpel_clientes where codigo = $cod");

    $linha = mysql_fetch_array($comando);
    
    $nome = $linha["nome"];
    $email  = $linha["email"];
    $senha  = $linha["senha"];
    
    echo "<CENTER><TABLE BORDER=1 WIDTH=80%>";
    echo "<TR><TD COLSPAN=2> <B><CENTER> Cadastro de Cliente (Alterar) ";
    echo "<TR><TD><FORM METHOD='POST' ENCTYPE='multipart/form-data'
          ACTION='altclientes2.php?cod=$cod'>";
   echo "Nome: <INPUT TYPE='TEXT' SIZE=30 NAME='nome' VALUE='$nome'><P>";
   echo "Email: <INPUT TYPE='TEXT' SIZE=30 NAME='email' VALUE='$email'><P>";
   echo "Senha: <INPUT TYPE='password' SIZE=12 NAME='senha' VALUE='$senha'><P>";
   echo "<TR> <TD COLSPAN=2> <INPUT TYPE='SUBMIT' VALUE='Alterar'>";
   echo "</FORM> </TABLE>";
   
    mysql_close($conecta);
?>



    

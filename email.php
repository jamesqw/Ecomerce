<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Formulario Para Contato com Doma Racional e Linguagem corporal</title>
</head>
<body>
<div align="center">
  <table width="410" border="0" cellspacing="0" cellpadding="0">
    <form method="post" action="email.php">
      <tr> 
        <td width="106" align="right">&nbsp;</td>
        <td width="217">&nbsp;</td>
        <td width="87">&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">Nome:</td>
        <td><input name="nome" type="text" id="nome"></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">E-mail:</td>
        <td><input name="email" type="text" id="email"></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">Telefone:</td>
        <td><input name="telefone" type="text" id="telefone"></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">Celular:</td>
        <td><input name="celular" type="text" id="celular"></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">Assunto:</td>
        <td><select name="assunto" id="assunto">
            <option value="Contato">Contato</option>
            <option value="Sugestão">Sugest&atilde;o</option>
            <option value="Outros">Outros</option>
          </select></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right" valign="top">Mensagem:</td>
        <td><textarea name="mensagem" id="mensagem"></textarea></td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" id="Submit" value="Enviar"></td>
      </tr>
    </form>
  </table>
  <?
		if(!empty($nome) and !empty($email) and !empty($telefone)and !empty($celular)and !empty($mensagem) and !empty($assunto))
			{
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			$headers .= "From: $nome <$email>\r\n";
			$headers .= "X-Mailer: PHP/" . phpversion();
			$send = mail("andregds85@gmail.com", "SITE-".$assunto.": " .$nome, $mensagem, $headers);
			
			if($send)
				{
				echo "
				<script language=\"JavaScript\">
				(alert(\"Seu e-mail foi enviado com sucesso!\\Em breve estaremos entrando em contato.\\Sulpel Informatica\"))
				</script>";
				}
			}
?>
</div>
</body>
</html>

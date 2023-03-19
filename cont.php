
<?php
$arquivo = "contador.txt";
$contador = 0;

$fp = fopen($arquivo,"r");
$contador = fgets($fp, 26);
fclose($fp);

++$contador;

$fp = fopen($arquivo,"w+");
fwrite($fp, $contador, 26);
fclose($fp);


$longitude = strlen ($contador);

/* Loops para mostrar os números*/
$ate = 6-$longitude;


   $mensagem= " : Visitantes";
   
   
 echo "<h3>" ,"<font face='Verdana, Arial, Helvetica, sans-serif'>",$contador,$mensagem;


 ?>



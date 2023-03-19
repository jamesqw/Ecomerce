<?php
      $conect= mysql_connect("localhost","root","");
      $db=mysql_select_db('sulpel') or die ("Erro no banco");

      $max=5;
       
	  if ($_GET['pagina'] == "")
     		$pagina=1;
       else
	   		$pagina = $_GET['pagina'];	
	  
	  $inicio = $pagina - 1;
      $inicio = $max * $inicio; 
 
      $sql =" SELECT * FROM sulpel_prod where nome like '%".$_GET['nome']."%'";
 
      $res=mysql_query($sql);
      $total=mysql_num_rows($res);
      
      if ($total == 0)
       	echo "Nenhum registro encontrado!";
      else{
      	echo "Quantidade de registros encontrados: ".$total.'<br><br>';
       $sql="select * from sulpel_prod where nome like '%".$_GET['nome']."%' LIMIT $inicio,$max";

      $res=mysql_query($sql);
 
      while ($row=mysql_fetch_array($res)){
  
  	  echo "<img src='imagens/".$row[codigo].".jpg' width='150'/>";
      echo $row[codigo].'<br>'; 
	  echo $row[nome].'<br>'; 
      echo $row[descricao].'<br>';
	  echo $row[preco].'<br><br><br>';
	
      }

      }
      ?>
	  
	  <?php
   
	  // Calculando pagina anterior
 
      $menos = $pagina - 1;
  
      // Calculando pagina posterior

      $mais = $pagina + 1;

      $pgs = ceil($total / $max);

      if($pgs > 1 )
  
      {
 
      if($menos>0)
  
      echo "<a href=\"?pagina=$menos&nome=".$_GET['nome']."\" class='texto_paginacao'>Anterior</a> ";

       
 
      if (($pagina-4) < 1 )
	      $anterior = 1;
     else
	      $anterior = $pagina-4;
  
      if (($pagina+4) > $pgs )
     		$posterior = $pgs;
      else
	      $posterior = $pagina + 4;
    
      for($i=$anterior;$i <= $posterior;$i++)

      if($i != $pagina)

      echo " <a href=\"?pagina=".($i)."&nome=".$_GET['nome']."\" class='texto_paginacao'>$i</a>";

      else
 
      echo " <strong class='texto_paginacao_pgatual'>".$i."</strong>";
 
       

      if($mais <= $pgs)

      echo " <a href=\"?pagina=$mais&nome=".$_GET['nome']."\" class='texto_paginacao'>Proxima</a>";

      }

      ?>

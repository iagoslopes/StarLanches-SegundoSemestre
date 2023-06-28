<?php
   include 'conexao.php';
		 
		 $usuario = $_POST ["txt_usuario"];
         $senha = $_POST ["txt_senha"];		
		
		      $sql =mysql_query ("UPDATE tb_starlanches 
			  					SET senha='$senha' 
			  					WHERE usuario='$usuario'");      
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLanches</title>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
<?php include("header.php");?>
<div class="editar"><br/>
<center>
<?php
	 echo "<center>";		  
	 echo "CONTA ALTERADA COM SUCESSO !!!";
	 echo "<br>";
	 echo "<br>";
	 echo "<a href=\"Listagem.php\">RETORNAR</a>";
?>
</div>
</body>
</html>
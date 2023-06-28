<?php
    include("conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>StarLanches</title>
    <link rel="stylesheet" style="text/css" href="style.css">
    <meta charset="utf-8">
</head>
<body>
    <?php include("header.php");?>
    <center>
    <div class="panel">
    <div class="bemvindo">    
    <?php
        if(isset($_COOKIE['login'])){
            echo "<h2>Bem-Vindo ". $row->usuario ."!</h2>";
        }else{
            echo "<h2>Bem-Vindo!</h2>";
        }
    ?>
    </div>
    
    <img src="img/fundo.jpeg" width="100%" height="100%">
    <div class="titulo">Delivery e Lanchonete</div>
    <div class="titulo2">Comidas deliciosas e rápidas</div>
    </div>
    </center>
</body>
</html>
<?php
    include('conexao.php');
    $hash = $_COOKIE['login'];
    $login = mysql_query("SELECT * FROM tb_starlanches WHERE hash = '$hash'");
    $row = mysql_fetch_object($login);
    $getperm = mysql_query("SELECT perm FROM tb_starlanches WHERE hash = '$hash'");
    $perm = mysql_result($getperm, 0, 'perm');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLanches</title>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
    <img src="img/logo.png" width="12%">
    <a href="index.php">Home</a>
    <a href="Sobre.php">Sobre</a>
    <a href="Cardapio.php">Cardápio</a>
    <?php
    if(isset($_COOKIE['login'])){
        echo '<a href="Logout.php" class="right">Logout</a>';
        echo '<a href="" class="right">'. $row->usuario .'</a>';
        echo '<a href="Carrinho.php" class="right"><img src="img/Cart.png"></a>';
        if($perm > 1){
            echo '<a href="Listagem.php" class="right">Lista</a>';
        }else{

        }
    }else{
        echo '<a href="Login.php" class="right">Login</a>';
    }
    ?>
</div>
<div class="star"><h1>StarLanches</h1>
</div>
</body>
</html>


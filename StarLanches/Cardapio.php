<?php
    include("conexao.php");
    if(!isset($_COOKIE['login'])){
        header("Location: ./Login.php");
    }

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
    <div class="cardapio">
    <?php
        $sql = "SELECT * FROM produtos";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<div class="produto">';
            echo '<img src="img/'.$ln['imagem'].'"/><br />';
            echo '<div class="nome-produto"><h2>'.$ln['nome'].'</h2></div>';
            echo '<div class="descricao"><h3>'.$ln['descricao'].'</h3></div> <br />';
            echo '<div class="preco">R$ '.number_format($ln['preco'], 2, ',', '.').'</div><br />';
            echo '<div class="adc-produto"><a href="Carrinho.php?acao=add&id='.$ln['id'].'">Adicionar ao carrinho</a></div>';
            echo '<br /><hr />';
            echo '</div>';
        }
    ?>
    </div>
</body>
</html>
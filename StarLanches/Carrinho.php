<?php
    include('conexao.php');
    session_start();

    if(!isset($_COOKIE['login'])){
        header("Location: ./");
    }

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    // Adicionar produto
    if(isset($_GET['acao'])){

        //Adicionar carrinho
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
            }else{
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        //Remover carrinho
        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
                unset($_SESSION['carrinho'][$id]);
            }
        }

        //Alterar quantidade
        if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
                foreach($_POST['prod'] as $id => $qtd){
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd) || $qtd <> 0){
                        $_SESSION['carrinho'][$id] = $qtd;
                    }else{
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }
    }
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
    <?php
        include('header.php');
    ?>
<div class="carrinho">
    <div class="cart">
    <table align="center">
        <caption>Carrinho de compras</caption>
        <thead>
            <tr>
                <th bgcolor="DarkGray">Produto</th>
                <th bgcolor="DarkGray">Quantidade</th>
                <th bgcolor="DarkGray">Preço</th>
                <th bgcolor="DarkGray">SubTotal</th>
                <th bgcolor="DarkGray">Item</th>
            </tr>
        </thead>

            <form action="?acao=up" method='POST'>
        <tfoot>
            
                <input type='submit' value="Atualizar Carrinho" />
            
                
        </tfoot>
        

        <tbody>
            <?php
            $total = 0;
                if(count($_SESSION['carrinho']) == 0){
                    echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                }else{
                    foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql = "SELECT * FROM produtos WHERE id= '$id'";
                        $qr = mysql_query($sql) or die(mysql_error());
                        $ln = mysql_fetch_assoc($qr);

                        $nome = $ln['nome'];
                        $preco = number_format($ln['preco'], 2, ',', '.');
                        $sub = $ln['preco'] * $qtd;
                        $total += $sub;
                        $total = number_format($total, 2, ',', '.');

                        echo '<tr>
                            <td>'.$nome.'</td>
                            <td><input type="texte" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                            <td>R$ '.$preco.'</td>
                            <td>R$ '.$sub.'</td>
                            <td><a href="?acao=del&id='.$id.'"><img src="img/remove.png"></a></td>
                            </tr>';

                    }
                    echo '<tr>
                            <td colspan="3">Total</td>
                            <td>R$ '.$total.'</td>
                        </tr>';
                }
            ?>

        <!--
            <tr>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
            </tr>
        -->
        
        </tbody>

            </form>
    </table>
    <div class="continuar"><a href="Cardapio.php">Continuar comprando</a></div>
    </div>
</div>
</body>
</html>
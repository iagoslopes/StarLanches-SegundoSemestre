<?php
include 'conexao.php';

if(isset($_COOKIE['login'])){
    $hash = $_COOKIE['login'];
    $perm = mysql_result(mysql_query("SELECT perm FROM tb_starlanches WHERE hash = '$hash'"), 0);
    if($perm < 1){
        header("Location: ./");
    }
}else{
    header("Location: ./");
}

if (isset($_POST['busca_nome']) !="") {
    $sql = mysql_query ("SELECT * from tb_starlanches where usuario like '{$_POST['busca_nome']}%' order by usuario asc");
}
else {
    $sql = mysql_query("SELECT * FROM tb_starlanches order by usuario asc"); 
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
<center>
<div class="listagem">
    <div class="lista">
    <form name="form1" method="POST" action="Listagem.php">
        <label for="busca">Digite um usuário:</label>
            <input type="text" name="busca_nome">
            <input type="submit" value="FILTRAR">
    

    <table align="center">
        <tr>
            <th colspan="8" bgcolor="gray"> LISTAGEM DE CONTAS CADASTRADAS</th>
        </tr>
        <tr>
            <th bgcolor="DarkGray">NOME</th>
            <th bgcolor="DarkGray">CPF</th>
            <th bgcolor="DarkGray">ENDEREÇO</th>
            <th bgcolor="DarkGray">USUÁRIO</th>
            <th bgcolor="DarkGray">E-MAIL</th>
            <th bgcolor="DarkGray">SENHA</th>
            <th bgcolor="DarkGray">EXCLUIR</th>
            <th bgcolor="DarkGray">EDITAR</th>
        </tr>
        <tr>

<?php
    while ($linha = mysql_fetch_assoc($sql)) {
?>
    <td align="center"><?php echo $linha['nome']; ?></td>
    <td align="center"><?php echo $linha['cpf']; ?></td>
    <td align="center"><?php echo $linha['endereco']; ?></td>
    <td align="center"><?php echo $linha['usuario']; ?></td>
    <td align="center"><?php echo $linha['email']; ?></td>
    <td align="center"><?php echo $linha['senha']; ?></td>
    <td align="center"><a href="Listagem.php?apagar='<?php echo $linha['usuario']; ?>'"><img src='img/del.png'></a></td>
    <td align="center"><a href="Editar_conta.php?edit=<?php echo $linha['usuario']; ?>&email=<?php echo $linha['email']; ?>&senha=<?php echo $linha['senha']; ?>"><img src='img/edit.png'></a></td>
    <tr>

<?php }
    echo "<br/>";
    echo "<br/>";
?>

<?php
if(isset($_GET['apagar'])){
    $sql = mysql_query("delete from tb_starlanches where usuario =". $_GET['apagar']);
    header("Location: ./Listagem.php");
    return false;
}
?>

    </table>
    </form>
    </div>
</div>
</body>
</html>
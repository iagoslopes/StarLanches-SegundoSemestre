<?php
    $id = $_GET['id'] OR DIE("ID INVALIDO!");
    include("conexao.php");

    $verify = mysql_query("SELECT * FROM tb_starlanches WHERE id = '$id'");
    $verif = mysql_query("SELECT * FROM tb_starlanches WHERE id = '$id' AND active = '1'");
    if(mysql_num_rows($verify) < 0){
        die("ID INVALIDO!");
    }else if(mysql_num_rows($verif) > 0){
        die("ID ja confirmado!");
    }

    echo "<h1>Conta Confirmada!</h1>";
    mysql_query("UPDATE tb_starlanches SET active='1' WHERE id = '$id'");
?>
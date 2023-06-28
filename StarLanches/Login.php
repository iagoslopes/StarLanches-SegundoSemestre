<?php
    if(isset($_COOKIE['login'])){
        header("Location: ./");
    }

    include('conexao.php');
    $error = "";

    if(isset($_POST['btn_entrar'])){
    $usuario = $_POST ["user"];
    $senha = $_POST ["pass"];
    
    $sql = mysql_query ("SELECT * FROM tb_starlanches WHERE (usuario = '$usuario' OR email = '$usuario') and senha = '$senha'");
    
    if(mysql_num_rows($sql) > 0){
        $active = mysql_result(mysql_query("SELECT active FROM tb_starlanches WHERE usuario = '$usuario' OR email = '$usuario'"), 0);
        if($active == true){
            $hash = mysql_result(mysql_query("SELECT hash FROM tb_starlanches WHERE usuario = '$usuario' OR email = '$usuario'"), 0);
            setcookie("login",$hash);
            header("Location: ./");
        }else{
            $error = "<h2 style='color:red'>Voce precisa confirmar o seu E-mail!</h2";
        }
    }else{ 
        $error = "<h2 style='color:red'>Usuario/E-mail ou Senha incorretos!</h2";
    }
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
        <div class="login">
            <div id="login-container">
            
            <?php echo $error; ?>
            <form method = "POST">
                
                <label for="email">Usuário ou E-mail:</label>
                <input type="text" name="user" id="user" placeholder="Digite um usuario" autocomplete="off">
                
                <label for="password">Senha:</label>
                <input type="password" name="pass" id="pass" placeholder="Digite a sua Senha">

                <a href="#" id="forgot-pass">Esqueceu a senha?</a>
        
                <input type="submit" name="btn_entrar" value="Entrar">
            </fomr>
            <div id="register-container">
            <p>Voce ainda não tem conta? Então <a href="Cadastro.php">Clique aqui</a></p>
            </div>
            </div>
        </div>
    </center>
</body>
</html>
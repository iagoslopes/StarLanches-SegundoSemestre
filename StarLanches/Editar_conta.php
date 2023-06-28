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
<div class="editar">
<div class="edit">
<center>

<h2>ALTERAÇÃO DE CONTA</h2>

<form name="form1" method="POST">
<label for="user">Usuário:<br></label><input type="text" name="txt_usuario" value="<?php if(isset($_GET['edit'])) echo $_GET['edit'] ?>" readonly><br>
<label for="email">Email:<br></label><input type="text" name="txt_email" value="<?php if(isset($_GET['edit'])) echo $_GET['email'] ?>" disabled><br>
<label for="pass">Senha:<br></label><input type="text" name="txt_senha" value="<?php if(isset($_GET['edit'])) echo $_GET['senha'] ?>"><br>
<br>
<input TYPE="submit" name="bt_editar" VALUE="ALTERAR" onClick="document.form1.action='Editar.php'">
<input TYPE="submit" name="bt_login" VALUE="RETONAR" onClick="document.form1.action='Listagem.php'">
</center>
</form>
</div>
</div>
</body>
</html>
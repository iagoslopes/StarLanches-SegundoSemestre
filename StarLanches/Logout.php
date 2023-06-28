<?php
    unset($_COOKIE['login']);
    setcookie("login","",time() - 3600);
    header("Location: ./");
?>
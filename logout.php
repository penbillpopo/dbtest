<?php
    include_once('db.php');
    db_func::unsetlogincheck();
    header("location:login.php");
    exit();
?>

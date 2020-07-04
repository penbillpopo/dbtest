<?php
    require_once 'db.php';
    $exist_typename = db_func::db_rowsize("SELECT * FROM `product_type` WHERE `name`='{$_GET["typename"]}' && `imgpath`='{$_GET["typeimg"]}'");
    if($exist_typename){
        $del_type = db_func::db_q("DELETE FROM `product_type` WHERE `name`='{$_GET["typename"]}' && `imgpath`='{$_GET["typeimg"]}'");
        $del_type->execute();
    }
    header('Location:system.php');
    exit();
?>
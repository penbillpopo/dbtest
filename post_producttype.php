<?php
    require_once 'db.php';
    $exist_typename = db_func::db_rowsize("SELECT * FROM `product_type` WHERE `name`='{$_POST["typename"]}'");
    if(!$exist_typename){
        if(file_exists($_FILES['typeimg']['tmp_name'])){
            $save_folder = "upload/img/product_type/";
            $file_name = $_FILES['typeimg']['name'];
            $imgpath = $save_folder.$file_name;
            if(move_uploaded_file($_FILES['typeimg']['tmp_name'],$imgpath)){                
            }
            else{
                $imgpath = '';
            }
            
            $add_typename = db_func::db_q("INSERT INTO `product_type`(`name`, `imgpath`) VALUES ('{$_POST["typename"]}','{$imgpath}')");
            $add_typename->execute();
        }
    }
    header('Location:system.php');
    exit();
?>
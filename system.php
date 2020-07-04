<?php
    require_once 'db.php';
    $Islogin = db_func::checklogin();
    if(!$Islogin){
        echo "<script>alert('請先登入會員');location.href='login.php'</script>";
    }
    else{
        $sq_producttype = db_func::db_q('SELECT * FROM `product_type` WHERE 1');
        $sq_producttype->execute();        
        $res_typename = $sq_producttype->fetchAll(PDO::FETCH_CLASS);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/system.css">
    <title>Document</title>
</head>
<body>
    <div class="sectionbox">
        <h3 class="title">Welcome <?=$_SESSION['db']['account']?></h3>
    </div>
    <div class="sectionbox">
        <h4 class="title">產品分類</h4>
        <div class="section">
            <div class="left">
                <p class="text">新增</p>
            </div>
            <div class="right">
                <form class="formbox" method="post" enctype="multipart/form-data" action="./post_producttype.php">            
                    <div class="inputbox">
                        <label for="typename">分類名稱</label>
                        <input id="typename" name="typename" type="text">
                    </div>
                    <div class="inputbox">
                        <label for="typeimg">圖片</label>
                        <input id="typeimg" name="typeimg" type="file">
                    </div>
                    <div class="inputbox">
                        <button>送出</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="section">
            <div class="left">
                <p class="text">列表</p>
            </div>
            <div class="right">
                <?php
                foreach($res_typename as $value){
                ?>
                    <div class="showbox">
                        <div class="left">
                            <h5 class="showname"><?=$value->name?></h5>
                            <img class="showimg" src="<?=$value->imgpath?>" alt="">
                        </div>
                        <div class="right">
                            <a href="./del_producttype.php?typename=<?=$value->name?>&typeimg=<?=$value->imgpath?>">刪除</a>
                        </div>                        
                    </div>
                <?php }?>
                
               
            </div>
        </div>

    </div>

    

    <a href="./logout.php">登出</a>
</body>
</html>

<?php
    require_once 'db.php';
    $Islogin = db_func::checklogin();
    if($Islogin)
        header('system.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>

<body>
    <form action="./check_login.php" method="POST">
        <div class="inputbox">
            <label for="account">帳號</label>
            <input id="account" name="account" type="text">
        </div>
        <div class="inputbox">
            <label for="password">密碼</label>
            <input id="password" name="password" type="text">
        </div>
        <div class="inputbox">
            <button>送出</button>
        </div>
    </form>
</body>
</html>
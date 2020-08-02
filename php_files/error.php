<?php
// ログインの確認
session_start();
if (!isset($_SESSION["fridge_id"])) {
    // リダイレクト処理
    header('Location: ../html_files/login.html');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
    <link rel="stylesheet" href="../css_files/error.css">
</head>

<body>
    <header>
        <a href="index.html">
            <div class="logo-wrapper">
                <img class="fridge-img" src="../images/fridge.png">
                <p class="logo">sharefridge</p>
            </div>
        </a>
        <!-- <div class="logo-container">
        <img class="fridge-img" src="../images/fridge.png">
        <p class="logo">sharefridge</p>
    </div> -->
    </header>
    <div class="content">
        <a href="register.html" class="error-title">ERROR</a>
        <p class="error-massage"><?php echo $_SESSION["error"] ?></p>
        <a href="../html_files/add.html" class="error-title">やり直す</a>
        <!-- <div class="button-wrapper"> -->
        <!-- ログイン画面へ遷移 -->
        <!-- <a class="to_login" href="login.html">LOGIN</a> -->
        <!-- 新規登録画面へ遷移 -->
        <!-- <a class="to_register" href="register.html">REGISTER</a> -->
    </div>
    </div>
</body>

</html>
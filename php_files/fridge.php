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
    <title>fridge-menu</title>
    <link rel="stylesheet" href="../css_files/fridge.css">
</head>

<body>
    <header>
        <a href="../html_files/index.html">
            <div class="logo-wrapper">
                <img class="fridge-img" src="../images/fridge.png">
                <p class="logo">sharefridge</p>
            </div>
        </a>
    </header>
    <div class="content">
        <p class="your-fridge">YOUR FRIDGE</p>
        <a class="to-add" href="../html_files/add.html">食材登録</a>
        <table>
            <tr>
                <th>食材名</th>
                <th>個数</th>
                <th>賞味期限</th>
                <th>消費期限</th>
                <!-- <th>住所</th> -->
            </tr>
            <?php
            $fridge_id = $_SESSION["fridge_id"];

            $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');
            $stmt = $dbh->prepare('SELECT name, count, shomikigen, shohikigen FROM contents WHERE fridge_id = :fridge_id');
            $stmt->execute(array(':fridge_id' => $fridge_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $line) {
                echo <<< EOF
                    <tr>
                        <td class="icon whale">{$line["name"]}</td>
                        <td>{$line["count"]}</td>
                        <td>{$line["shomikigen"]}</td>
                        <td>{$line["shohikigen"]}</td>
                    </tr>
EOF;
            }
            ?>
            <!-- <tr>
                <td class="icon bird">トリさん</td>
                <td>賞味期限</td>
                <td>グリーン</td>
                <td>山</td>
            </tr>
            <tr>
                <td class="icon whale">クジラさん</td>
                <td>潮を吹くこと</td>
                <td>ブルー</td>
                <td>海</td>
            </tr>
            <tr>
                <td class="icon crab">カニさん</td>
                <td>反復横飛び</td>
                <td>レッド</td>
                <td>川</td> -->
            </tr>
        </table>

        <!-- <div class="button-wrapper"> -->
        <!-- ログイン画面へ遷移 -->
        <!-- <a class="to_login" href="login.html">LOGIN</a> -->
        <!-- 新規登録画面へ遷移 -->
        <!-- <a class="to_register" href="register.html">REGISTER</a> -->
        <!-- </div> -->
    </div>
</body>

</html>
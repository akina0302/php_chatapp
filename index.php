<?php 

if(!empty($_POST["button"])){
echo $_POST["username"];
echo $_POST["comment"];
}

// DB接続

$host = 'localhost';
$db   = 'chatapp'; // ← 作成したDB名
$user = 'root';    // XAMPPの初期ユーザーは「root」
$pass = '********';   


$pdo =  new PDO('mysql:host=localhost;dbname=php_chatapp', $user, $pass);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP 掲示板</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 class="title">PHP掲示板</h1>
  <hr>
  <div class="boardWrapper">
    <section>
    <article>
      <div class="wrapper">
      <div class="nameArea">
        <span>名前:</span>
        <p class="username">name</p>
        <time>2025/4/17</time>
      </div>
      <p class="comment">手書きコメント</p>
    </div>
    </article>
    </section>

    <form class="formwrapper" method="POST">
      <div>
        <input type="submit" value="書き込む" name="button">
        <label for="">名前</label>
        <input type="text" name="username">
      </div>
      <div>
        <textarea name="comment" class="commentTextArea"></textarea>
      </div>
    </form>
  </div>
  
</body>
</html>
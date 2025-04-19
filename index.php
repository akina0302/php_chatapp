<?php 

$comment_array = array();

// DB接続

$user = 'root';    // XAMPPの初期ユーザーは「root」
$pass = '*******';   

try{
$pdo = new PDO('mysql:host=localhost;dbname=php_chatapp', $user, $pass);
} catch (PDOException $e){
  echo $e->getMessage();
}


// フォームを送信した時
if(!empty($_POST["button"])){
  $postDate = ("y-m-d H:i:s");
$stmt = $pdo->prepare("INSERT INTO `chatapp` (`username`, `comment`, `postDate`) VALUES ('username', 'comment', '2025-04-19');");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);
} 


// DBからデータの取得
$sql = "SELECT `id`, `username`, `comment`, `postDate` FROM `chatapp`;";
$comment_array = $pdo->query($sql); #queryメソッド、sql文で実際に問い合わせ、返ってきたデータはcomment_arrayに代入

// DBを閉じる
$pdo = null;
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
    <?php foreach ($comment_array as $comment): ?>

    <article>
      <div class="wrapper">
      <div class="nameArea">
        <span>名前:</span>
        <p class="username"><?php echo $comment["username"]; ?></p>
        <time><?php echo $comment["postDate"] ?></time>
      </div>
      <p class="comment"><?php echo $comment["comment"]; ?></p>
    </div>
    </article>
    
    <?php endforeach; ?>


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
<!DOCTYPE>
<html lang="ja">
<form  action="mission_4-2.php" method="post";>
<p>名前: <input type="text" name="n"></p>
<p>コメント: <input type="text" name="k"></p>
<p>パスワード: <input type="text" name="p"></p>
<p><input type="submit" value="送信"></p>
</form>
<form  action="mission_4-3.php" method="post";>
<p>削除対象番号</p>
<p><input type="text" name="delete"></p>
<p>パスワード</p>
<p><input type="text" name="pass"></p>
<p><input type="submit" value="送信"></p>
</form>
<form  action="mission_4-4.php" method="post";>
<p>編集対象番号</p>
<p><input type="text" name="number"></p>
<p>パスワード</p>
<p><input type="text" name="password"></p>
<p><input type="submit" value="送信"></p>
</form>
<?php
if ($_POST["p"] == "") {
  echo '<p>パスワードを入力してください</p>' ;
}
elseif($_POST["k"] == "") {
  echo '<p>コメントを入力してください</p>' ;
}
elseif($_POST["n"] == "") {
  echo '<p>名前を入力してください</p>' ;
}
else{
	$dsn = "データベース名" ;
	$user = "ユーザー名" ;
	$password = "パスワード名" ;
	$pdo = new PDO($dsn, $user, $password) ; 
	$sql = $pdo -> prepare("INSERT INTO tatest (id, name, comment,password,date) VALUES (:id,:name,:comment,:password,:date)") ;
  $name = $_POST["n"] ; //任意
	$comment = $_POST["k"] ; //任意
	$password = $_POST["p"] ;
	$date=date('Y/m/d ah:i');
	$sql -> bindValue(':id', NULL, PDO::PARAM_NULL) ;
	$sql -> bindParam(':name', $name, PDO::PARAM_STR) ;
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR) ;
	$sql -> bindParam(':password', $password, PDO::PARAM_STR) ;
	$sql -> bindParam(':date', $date, PDO::PARAM_STR) ;
	$sql -> execute();
}
  $dsn = "データベース名" ;
	$user = "ユーザー名" ;
	$password = "パスワード名" ;
	$pdo = new PDO($dsn, $user, $password) ; 
	$abc = 'SELECT * FROM tatest ORDER BY id ASC' ;
	$results = $pdo -> query($abc) ;
	foreach ($results as $row) {
	    //$rowの中にはテーブルのカラム名が入る
	    echo $row['id'].',' ;
	    echo $row['name'].',' ;
	    echo $row['comment'].',' ;
	    echo $row['password'].',' ;
	    echo $row['date']."<br>" ;
	} ;
?>
</html>
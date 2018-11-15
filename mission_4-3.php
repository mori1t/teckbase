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
<p><input type="text" name="pass"</p>
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
$dsn = "データベース名" ;
$user = "ユーザー名" ;
$password = "パスワード名" ;
$pdo = new PDO($dsn, $user, $password) ;
$def=$_POST['delete'];
$sql="SELECT * FROM tatest where id='$def'";	
$result = $pdo -> query($sql)->fetch(PDO::FETCH_ASSOC) ;




if($result['id']==NULL){
	echo'投稿番号が存在しません';
}elseif($result['password']!==$_POST['pass']){
	echo'パスワードが一致しません';
}else{	
	$sql = "delete from tatest where id = '$def'" ;
	$result = $pdo -> query($sql);
}

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
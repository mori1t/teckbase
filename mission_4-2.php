<!DOCTYPE>
<html lang="ja">
<form  action="mission_4-2.php" method="post";>
<p>���O: <input type="text" name="n"></p>
<p>�R�����g: <input type="text" name="k"></p>
<p>�p�X���[�h: <input type="text" name="p"></p>
<p><input type="submit" value="���M"></p>
</form>
<form  action="mission_4-3.php" method="post";>
<p>�폜�Ώ۔ԍ�</p>
<p><input type="text" name="delete"></p>
<p>�p�X���[�h</p>
<p><input type="text" name="pass"></p>
<p><input type="submit" value="���M"></p>
</form>
<form  action="mission_4-4.php" method="post";>
<p>�ҏW�Ώ۔ԍ�</p>
<p><input type="text" name="number"></p>
<p>�p�X���[�h</p>
<p><input type="text" name="password"></p>
<p><input type="submit" value="���M"></p>
</form>
<?php
if ($_POST["p"] == "") {
  echo '<p>�p�X���[�h����͂��Ă�������</p>' ;
}
elseif($_POST["k"] == "") {
  echo '<p>�R�����g����͂��Ă�������</p>' ;
}
elseif($_POST["n"] == "") {
  echo '<p>���O����͂��Ă�������</p>' ;
}
else{
	$dsn = "�f�[�^�x�[�X��" ;
	$user = "���[�U�[��" ;
	$password = "�p�X���[�h��" ;
	$pdo = new PDO($dsn, $user, $password) ; 
	$sql = $pdo -> prepare("INSERT INTO tatest (id, name, comment,password,date) VALUES (:id,:name,:comment,:password,:date)") ;
  $name = $_POST["n"] ; //�C��
	$comment = $_POST["k"] ; //�C��
	$password = $_POST["p"] ;
	$date=date('Y/m/d ah:i');
	$sql -> bindValue(':id', NULL, PDO::PARAM_NULL) ;
	$sql -> bindParam(':name', $name, PDO::PARAM_STR) ;
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR) ;
	$sql -> bindParam(':password', $password, PDO::PARAM_STR) ;
	$sql -> bindParam(':date', $date, PDO::PARAM_STR) ;
	$sql -> execute();
}
  $dsn = "�f�[�^�x�[�X��" ;
	$user = "���[�U�[��" ;
	$password = "�p�X���[�h��" ;
	$pdo = new PDO($dsn, $user, $password) ; 
	$abc = 'SELECT * FROM tatest ORDER BY id ASC' ;
	$results = $pdo -> query($abc) ;
	foreach ($results as $row) {
	    //$row�̒��ɂ̓e�[�u���̃J������������
	    echo $row['id'].',' ;
	    echo $row['name'].',' ;
	    echo $row['comment'].',' ;
	    echo $row['password'].',' ;
	    echo $row['date']."<br>" ;
	} ;
?>
</html>
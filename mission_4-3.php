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
<p><input type="text" name="pass"</p>
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
$dsn = "�f�[�^�x�[�X��" ;
$user = "���[�U�[��" ;
$password = "�p�X���[�h��" ;
$pdo = new PDO($dsn, $user, $password) ;
$def=$_POST['delete'];
$sql="SELECT * FROM tatest where id='$def'";	
$result = $pdo -> query($sql)->fetch(PDO::FETCH_ASSOC) ;




if($result['id']==NULL){
	echo'���e�ԍ������݂��܂���';
}elseif($result['password']!==$_POST['pass']){
	echo'�p�X���[�h����v���܂���';
}else{	
	$sql = "delete from tatest where id = '$def'" ;
	$result = $pdo -> query($sql);
}

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
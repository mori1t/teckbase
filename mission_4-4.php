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
$password = "" ;
$pdo = new PDO($dsn, $user, $password) ;
$edit=$_POST['number'];
$sql="SELECT * FROM tatest where id='$edit'";	
$result = $pdo -> query($sql)->fetch(PDO::FETCH_ASSOC) ;




if($result['id']==NULL){
	echo'���e�ԍ������݂��܂���';
}elseif($result['password']!==$_POST['password']){
	echo'�p�X���[�h����v���܂���';
}else{	
	echo '<p>�ҏW�t�H�[��</p>
<form  action="mission_4-5.php" method="post" ;>
<input type="hidden" name="h3" value='.$result["id"].'" ;>
<p>���O: <input type="text" name="n3" value="'.$result["name"].'" ;></p>
<p>�R�����g: <input type="text" name="k3" value="'.$result["comment"].'" ;></p>
<p><input type="submit" value="���M";></p>
</form>';

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
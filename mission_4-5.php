<?php
$dsn = "データベース名" ;
$user = "ユーザー名" ;
$password = "パスワード名" ;
$pdo = new PDO($dsn, $user, $password) ; 
?>
<?php
$id=$_POST['h3'];
$nm =$_POST['n3'] ; //任意
$kome =$_POST['k3'] ; //任意
$sql = "update tatest set name='$nm', comment='$kome' where id = '$id'" ;
$result = $pdo -> query($sql);
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
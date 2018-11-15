<?php
$dsn = "データベース名" ;
$user = "ユーザー名" ;
$password = "パスワード" ;
$pdo = new PDO($dsn, $user, $password) ; 
?>
<?php
$sql = "CREATE TABLE tatest(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name char(32), comment TEXT, password TEXT, date TEXT)";
$stmt = $pdo -> query($sql) ; 
?>
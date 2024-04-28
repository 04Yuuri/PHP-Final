<?php
//1. POSTデータ取得
$name = $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$prefecture = $_POST["prefecture"];
$hearing = $_POST["hearing"];
$age = $_POST["age"];



//2. DB接続します
//*** function化する！  *****************
include("funcs.php"); //まず、include関数でfuncs.phpを読み込む.
$pdo = db_conn();


//３．データ登録SQL作成
$sql="INSERT INTO `gs_final_table`(`name`, `gender`, `email`, `prefecture`, `hearing`, `age`, `indate`) VALUES(:name,:gender,:email,:prefecture,:hearing,:age,sysdate());";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name',  $name ,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':gender', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':prefecture', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hearing', $hearing, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>

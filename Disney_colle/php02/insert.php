<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// test
$year    =$_POST["year"];
$place   =$_POST["place"];
$category=$_POST["category"];
$img     =$_POST["img"];
$naiyou  =$_POST["naiyou"];



//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=dc_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 :nameとかバインド変数 bindValue:橋渡ししてくれる関数 改ざんされるのを防止する
$sql = "INSERT INTO Disney_colle(year,place,category,img,naiyou,indate)VALUES(:year, :place, :category, :img, :naiyou, sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':year',    $year,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':place',   $place,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category',$category,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img',     $img,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou',  $naiyou,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //execute():実行　True falseが返ってくる

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php"); //Location:コロンの後はスペースが必須、スペースの後にphp名
  exit();
}
?>

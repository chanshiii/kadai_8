<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=dc_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql ="SELECT * FROM disney_colle;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//全データ取得 データベースにアクセスしてSELECTを持ってくる？
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
<table>  
  <!-- $valuesに入れてあるものを1レコードずつ取ってきて、ある分表示する $vは任意で決めたもの -->
<?php foreach($values as $v){ ?>
        <tr>
          <td><?=$v["id"]?></td>
          <td><?=$v["year"]?></td>
          <td><?=$v["place"]?></td>
          <td><?=$v["category"]?></td>
          <td><?=$v["img"]?></td>
          <td><?=$v["naiyou"]?></td>
        </tr>
<?php } ?>
</table>
    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り
  const json = JSON.parse('<?=$json?>');
  console.log(json);


</script>
</body>
</html>

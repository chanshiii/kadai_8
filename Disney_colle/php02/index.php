<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Disney_not-for-sale data registration</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Disney_not-for-sale data registration</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>非売品情報</legend>
     <label for="year">年代：</label>
     <select name="year" id="year">
      <option selected>選択してください。</option>
      <?php
      for($num=1980; $num<=2100; $num++){
        echo '<option value="' . $num . '">' . $num . '年</option>';
      }
      ?>
     </select>
     <label for="place">入手場所：</label>
     <select name="place" id="place">
      <option selected>選択してください。</option>
      <?php
      $place = ['ランド','シー','イクスピアリ','リゾートライン','アンバサダーホテル','ミラコスタ','ランドホテル','トイストーリホテル','その他'];
      for($num=0; $num<=count($place); $num++){
        echo '<option value="' . $place[$num] . '">' . $place[$num] . '</option>';
        // echo '<option value=>'.$place[$num] . '</option>'; この書き方だと入力した値が空白になる
      }
      ?>
     </select>
     <!-- <p>パーク：</p>
     <label><input type="radio" name="park" id="land" value=1>ランド</label>
     <label><input type="radio" name="park" id="sea"  value=2>シー</label><br> -->
    <label for="category">カテゴリ：</label>
     <select name="category" id="category">
      <option selected>選択してください。</option>
      <?php
      $cate = ['チャーム','メダル','ピン','その他'];
      for($num=0; $num<count($cate); $num++){
        echo '<option value="' . $cate[$num] .'">' .$cate[$num] . '</option>';
        // echo '<option value=>'.$cate[$num] . '</option>';
      }
      ?>
     </select>
     <label>画像：<input type="file" name="img" accept=".png, .jpg, .jpeg, .pdf, .doc"></label><br>
     <label>メモ：<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

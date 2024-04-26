<?php
//0. SESSION開始！！
include("funcs.php");
$pdo = db_conn();

// session_start();

// //１．関数群の読み込み
// include("funcs.php");

// //LOGINチェック → funcs.phpへ関数化しましょう！
// //if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
// //    exit("Login Error");
// //}else{
// //    session_regenerate_id(true);
// //    $_SESSION["chk_ssid"] = session_id();
// //}


//２．データ登録SQL作成
// $pdo = db_conn();
$sql = "SELECT * FROM gs_kadai0413_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);　JSに渡す場合は使う

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>産後ケアクチコミ一覧</title>
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
      <a class="navbar-brand" href="index.php">産後ケアクチコミ一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">

      <table>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?=h($v["id"])?></td>
          <td><?=h($v["name"])?></td>
          <td><?=h($v["age"])?></td>
          <td><?=h($v["prefectures"])?></td>
          <td><?=h($v["months"])?></td>
          <td><?=h($v["day"])?></td>
          <td><?=h($v["room"])?></td>
          <td><?=h($v["facility"])?></td>
          <td><?=h($v["childcare"])?></td>
          <td><?=h($v["customerservice"])?></td>
          <td><?=h($v["food"])?></td>
          <td><?=h($v["satisfaction"])?></td>
          <td><?=h($v["comment"])?></td>
      </td>

        <td><a href="detail.php?id=<?=h($v["id"])?>">更新</a></td>
    　　 <td><a href="delete.php?id=<?=h($v["id"])?>">削除</a></td>

        </tr>
      <?php } ?>
      </table>

  </div>
</div>
<!-- Main[End] -->


<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>

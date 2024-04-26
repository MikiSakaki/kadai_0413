<?php

// var_dump($_POST);
// exit();

//1. POSTデータ取得
$name               = $_POST["name"];
$age                = $_POST["age"];
$prefectures        = $_POST["prefectures"];
$months             = $_POST["months"]; 
$day                = $_POST["day"];
$room               = $_POST["room"];
$facility           = $_POST["facility"];
$childcare          = $_POST["childcare"];
$customerservice    = $_POST["customerservice"]; 
$food               = $_POST["food"];
$satisfaction       = $_POST["satisfaction"];
$comment            = $_POST["comment"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_kadai0413_table(name,age,prefectures,months,day,room,facility,childcare,customerservice,food,satisfaction,comment,indate)VALUES(:name,:age,:prefectures,:months,:day,:room,:facility,:childcare,:customerservice,:food,:satisfaction,:comment,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':months', $months, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$stmt->bindValue(':day', $day, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':room', $room, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':facility', $facility, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':childcare', $childcare, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':customerservice', $customerservice, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$stmt->bindValue(':food', $food, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':satisfaction', $satisfaction, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


// INSERT INTO `gs_kadai0413_table` (`id`, `name`, `age`, `prefectures`, `months`, `day`, `room`, `facility`, `childcare`, `customerservice`, `food`, `satisfaction`, `comment`, `indate`) VALUES
// (1, 'TEST1', '25', '1', 'mon0', 'day0', 'room１', 'fa１', 'chi１', 'cs１', 'fo１', 'sa１',  'test', '2020-09-22 07:28:23' );


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>

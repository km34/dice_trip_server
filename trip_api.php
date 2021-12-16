<?php
//感想やタイトルをDBに送るやつ

if (!isset($_GET['title'])) {
    header('Location: https://karin.nkmr.io/hackathon5th/#/goal');
    exit();
}

$trip_id = $_GET['trip_id'];
$title = $_GET['title'];
// $distance = $_GET['distance'];

//最初の設定
$dsn = "mysql:host=localhost; dbname=xxxx; charset=utf8mb4";
$username = "xxxx";
$password = "xxxx";

//接続確認
try {
    $dbh = new PDO($dsn, $username, $password);

    //登録する
    $sql = "UPDATE `trip-table` SET `title`=? WHERE `trip_id`=?";
    $stmt = $dbh->prepare($sql); //SQL文の設定

    $stmt->bindValue(1, $title, PDO::PARAM_STR);
    $stmt->bindValue(2, $trip_id, PDO::PARAM_INT);

    $stmt->execute(); //SQLの実行
} catch (PDOException $e) {
    $msg = $e->getMessage();
} finally {
    // DB接続を閉じる
    $pdo = null;
    header('Location: https://karin.nkmr.io/hackathon5th/#/goal');
    exit();
}

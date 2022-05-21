<?php
// var_dump($_POST);
// exit();
// $question = $_POST['question'];
// $day = $_POST['day'];
//データの受け取り
$question = $_POST['question'];
$day = $_POST['day'];
$option = $_POST['option'];
$question2 = $_POST['question2'];
// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$day} {$question} {$option} {$question2}\n";
//
// ファイルを開く．引数が`a`である部分に注目！
//csvファイルにデータを入れ込むために’a’を使う。
$file = fopen('data/question.csv', 'a');
// ファイルquestion.csvをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む/fputcsv($file, $write_data);
fwrite($file, $write_data);
//ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

$param_json = json_encode($write_data);

// データ入力画面に移動する
header("Location:index.php");

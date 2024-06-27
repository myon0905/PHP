<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
define('TAX',1.1);//消費税
$enpitu =100;
$kesigomu =200;

echo "現在、消費税は10%です。"
echo "鉛筆が",$enpitu,円で税込,$enpitu*TAX,円です。
</body>
</html>
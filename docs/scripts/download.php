<?php

define('DOWNLOAD_BASE_URL', '/scripts/downloads');

if (empty($_POST['name']) || empty($_POST['dlcode'])) {
    header("Status: 404 Not Found", true, 404);
    echo "Something wrong with download code...";
    exit;
}

$name = htmlspecialchars($_POST['name']);
$dlcode = htmlspecialchars($_POST['dlcode']);

$configs = array(
    'machi-no-odori' => array(
        'dlcode' => 'D4NC34U', 
        'filename' => 'machi-no-odori-tokuten.zip', 
    ), 
);

if ($configs[$name]['dlcode'] !== $dlcode) {
    header("Status: 401 Unauthorized", true, 401);
    header("Content-type: text/plain; Charset: UTF-8;");
    echo "ダウンロードコードが違います！大文字小文字を確認してみてね．";
    exit;
}

$fileName = $configs[$name]['filename'];

header("Location: " . DOWNLOAD_BASE_URL . DIRECTORY_SEPARATOR . $name . DIRECTORY_SEPARATOR . $fileName);


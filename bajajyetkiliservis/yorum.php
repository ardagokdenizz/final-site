<?php

$file = "yorumlar.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];

$ad = trim($_POST["ad"] ?? "");
$yorum = trim($_POST["yorum"] ?? "");

if ($ad == "" || $yorum == "") {
    echo "❌ Boş bırakma!";
    exit;
}

$data[] = [
    "ad" => htmlspecialchars($ad),
    "yorum" => htmlspecialchars($yorum),
    "tarih" => date("d.m.Y H:i")
];

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header("Location: yorum_liste.php");
exit;

?>
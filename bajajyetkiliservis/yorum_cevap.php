<?php
session_start();

$file = "yorumlar.json";
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];

$id = $_POST["id"];
$cevap = $_POST["cevap"];

$data[$id]["cevap"] = $cevap;

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

header("Location: yorum_admin.php");
exit;
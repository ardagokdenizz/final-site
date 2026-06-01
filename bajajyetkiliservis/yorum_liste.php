<?php

$file = "yorumlar.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];

?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Yorumlar</title>

<style>

/* ================= BODY BACKGROUND ================= */
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
    color: white;
}

/* ================= HEADER ================= */
.header {
    text-align: center;
    padding: 30px;
    font-size: 26px;
    font-weight: bold;
}

/* ================= CONTAINER ================= */
.container {
    max-width: 900px;
    margin: auto;
    padding: 20px;
}

/* ================= BACK BUTTON ================= */
.back {
    display: inline-block;
    padding: 10px 15px;
    background: #e31e24;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    margin-bottom: 20px;
    transition: 0.3s;
}

.back:hover {
    transform: scale(1.05);
}

/* ================= COMMENT CARD ================= */
.card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.2);
    padding: 18px;
    margin: 15px 0;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

/* ================= AVATAR ================= */
.avatar {
    width: 45px;
    height: 45px;
    background: #005696;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    float: left;
    margin-right: 10px;
}

/* ================= NAME ================= */
.name {
    font-weight: bold;
    color: #fff;
}

/* ================= TEXT ================= */
.text {
    margin-top: 10px;
    color: #eaeaea;
}

/* ================= DATE ================= */
.date {
    font-size: 12px;
    color: #bbb;
    margin-top: 5px;
}

/* ================= EMPTY ================= */
.empty {
    text-align: center;
    margin-top: 50px;
    color: #ccc;
}

</style>

</head>

<body>

<div class="header">
💬 Kullanıcı Yorumları
</div>

<div class="container">

<a class="back" href="index.html">⬅ Ana Sayfa</a>

<?php if (count($data) == 0): ?>

    <div class="empty">Henüz yorum yok</div>

<?php endif; ?>

<?php foreach ($data as $y): ?>

<div class="card">

    <div class="avatar">
        <?= strtoupper(substr($y["ad"],0,1)) ?>
    </div>

    <div class="name"><?= $y["ad"] ?></div>

    <div class="text"><?= $y["yorum"] ?></div>

    <div class="date">📅 <?= $y["tarih"] ?></div>

</div>

<?php endforeach; ?>

</div>

</body>
</html>
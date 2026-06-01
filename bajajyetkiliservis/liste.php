<?php

$file = "basvurular.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$data = json_decode(file_get_contents($file), true);

if (!is_array($data)) {
    $data = [];
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Kayıtlar</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a href="index.html" class="logo">PRO<span>MOTO</span></a>

        <ul class="nav-links">
            <li><a href="index.html">Ana Sayfa</a></li>
            <li><a href="form.html">Arıza Formu</a></li>
        </ul>
    </div>
</nav>

<section class="section">
<div class="container">

<h2 style="text-align:center;margin-bottom:20px;">📋 Servis Kayıtları</h2>

<?php if (count($data) == 0): ?>

    <p style="text-align:center;">Henüz kayıt yok.</p>

<?php else: ?>

    <div class="grid">

    <?php foreach ($data as $item): ?>

        <div class="card">

            <h3><?= $item["adsoyad"] ?></h3>
            <p><b>Model:</b> <?= $item["motor_model"] ?></p>
            <p><b>Email:</b> <?= $item["email"] ?></p>
            <p><b>Şikayet:</b><br> <?= $item["sikayet"] ?></p>
            <small><?= $item["tarih"] ?></small>

        </div>

    <?php endforeach; ?>

    </div>

<?php endif; ?>

</div>
</section>

</body>
</html>
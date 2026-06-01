<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$file = "yorumlar.json";
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Yorum Yönetimi</title>

<style>
body {font-family:Arial;background:#f4f6f9;}
.header {
    background:#003366;
    color:white;
    padding:15px;
    display:flex;
    justify-content:space-between;
}
.container {max-width:900px;margin:auto;padding:20px;}
.card {
    background:white;
    padding:15px;
    margin:10px 0;
    border-radius:10px;
}
.btn {
    padding:5px 10px;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
.del {background:#e31e24;color:white;}
.reply {background:#005696;color:white;}
textarea {width:100%;margin-top:10px;}
</style>

</head>

<body>

<div class="header">
    <div>💬 Yorum Yönetimi</div>
    <a style="color:white" href="admin.php">🏠 Ana Panel</a>
</div>

<div class="container">

<?php foreach ($data as $i => $y): ?>

<div class="card">

    <b><?= htmlspecialchars($y["ad"]) ?></b><br>
    <?= htmlspecialchars($y["yorum"]) ?><br>
    <small><?= $y["tarih"] ?></small>

    <?php if (!empty($y["cevap"])): ?>
        <p style="color:green"><b>Cevap:</b> <?= $y["cevap"] ?></p>
    <?php endif; ?>

    <!-- SIL -->
    <form action="yorum_sil.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $i ?>">
        <button class="btn del">Sil</button>
    </form>

    <!-- CEVAP -->
    <form action="yorum_cevap.php" method="post">
        <input type="hidden" name="id" value="<?= $i ?>">
        <textarea name="cevap" placeholder="Cevap yaz..."></textarea>
        <button class="btn reply">Cevapla</button>
    </form>

</div>

<?php endforeach; ?>

</div>

</body>
</html>
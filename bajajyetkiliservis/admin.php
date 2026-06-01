<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$file = "basvurular.json";
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>

<style>
body {font-family:Arial;background:#f4f6f9;margin:0;}
.header {
    background:#005696;
    color:white;
    padding:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.btn {
    background:#e31e24;
    color:white;
    padding:8px 12px;
    border-radius:6px;
    text-decoration:none;
}
.container {max-width:1000px;margin:auto;padding:20px;}
.card {
    background:white;
    padding:15px;
    margin:10px 0;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}
.top-links a{
    margin-right:10px;
    text-decoration:none;
    color:white;
}
</style>

</head>

<body>

<div class="header">
    <div class="top-links">
        <a href="index.html">🏠 Ana Sayfa</a>
        <a href="yorum_admin.php">💬 Yorumlar</a>
    </div>
    <a class="btn" href="logout.php">Çıkış</a>
</div>

<div class="container">

<h2>📋 Servis Kayıtları</h2>

<?php foreach ($data as $d): ?>
    <div class="card">
        <b><?= htmlspecialchars($d["adsoyad"]) ?></b><br>
        <?= htmlspecialchars($d["motor_model"]) ?><br>
        <?= htmlspecialchars($d["email"]) ?><br>
        <?= htmlspecialchars($d["sikayet"]) ?><br>
        <small><?= $d["tarih"] ?></small>
    </div>
<?php endforeach; ?>

</div>

</body>
</html>
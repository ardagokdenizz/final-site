<?php

$file = "basvurular.json";

// JSON dosyası yoksa oluştur
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// FORM VERİLERİ (temizlenmiş)
$ad = trim($_POST["musteri_adsoyad"] ?? "");
$email = trim($_POST["email"] ?? "");
$model = trim($_POST["motor_model"] ?? "");
$sikayet = trim($_POST["sikayet"] ?? "");

// BASİT VALIDATION
if ($ad == "" || $email == "" || $model == "" || $sikayet == "") {
    echo "<h3 style='color:red;font-family:Arial'>❌ Tüm alanlar zorunludur!</h3>";
    exit;
}

// JSON oku
$data = json_decode(file_get_contents($file), true);

if (!is_array($data)) {
    $data = [];
}

// Yeni kayıt
$yeni = [
    "adsoyad" => htmlspecialchars($ad),
    "email" => htmlspecialchars($email),
    "motor_model" => htmlspecialchars($model),
    "sikayet" => htmlspecialchars($sikayet),
    "tarih" => date("Y-m-d H:i:s"),
    "id" => time()
];

// ekle
$data[] = $yeni;

// kaydet
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// başarı mesajı
echo "
<div style='
    font-family:Arial;
    text-align:center;
    margin-top:50px;
'>
    <h2 style='color:green'>✅ Kayıt Başarılı!</h2>
    <a href='form.html'>← Geri Dön</a> |
    <a href='liste.php'>Kayıtları Gör</a>
</div>
";

?>
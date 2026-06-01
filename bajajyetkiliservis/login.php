<?php
session_start();

if ($_POST) {

    $user = $_POST["user"] ?? "";
    $pass = $_POST["pass"] ?? "";

    if ($user == "admin" && $pass == "1234") {
        $_SESSION["admin"] = true;
        header("Location: admin.php");
        exit;
    } else {
        $hata = "Hatalı giriş!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    width: 300px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

button {
    width: 100%;
    padding: 10px;
    background: #005696;
    color: white;
    border: none;
}
</style>

</head>

<body>

<div class="box">

<h2>Admin Giriş</h2>

<?php if (!empty($hata)) echo "<p style='color:red;'>$hata</p>"; ?>

<form method="post">
    <input name="user" placeholder="Kullanıcı">
    <input name="pass" type="password" placeholder="Şifre">
    <button>Giriş</button>
</form>

</div>

</body>
</html>
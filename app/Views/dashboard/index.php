<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=UTF-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halooo, <?= $user->username; ?></title>
</head>

<body>
    <h1>Selamat datang <?= $user->username; ?> , ini adalah halaman yang muncul setelah melakukan login</h1>
    <br>
    <br>
    <a href="/logout">Tekan ini untuk logout</a>
</body>

</html>
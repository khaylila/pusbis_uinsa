<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikhmon</title>
</head>

<body>
    <?php $i = 1; ?>
    <?php foreach ($data as $voucher) : ?>
        <div style="display: inline-block; border: 1px solid black; width: 150px; padding: 5px; margin-bottom: 5px;">
            <div style="display: flex; justify-content: space-between;">
                <span>loji.net</span>
                <span>[<?= $i++; ?>]</span>
            </div>
            <div style="text-align: center; border-top:1px solid black;">
                <p style="font-size: 10px;">Kode Voucher</p>
                <div style="border: 1px solid black; width: 100%; text-align: center; font-size: 16px; font-weight: bold; padding-top: 4px; padding-bottom: 4px;">
                    <?= $voucher; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>
<?php namespace ThunderByte\Http\Controllers;
use Picqer;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Ingresso</title>
</head>
<body>
<div class="align-center">
    <p><?= $title?></p>
    <br/>
    <br/>
    <br/>
    <p>Conteúdo Livre</p>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
</div>

<?php
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($numero, $generator::TYPE_CODE_128)) . '">';
?>

</body>
</html>
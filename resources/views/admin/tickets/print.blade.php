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

    <style type="text/css">
        @page {
            margin: 100px 10px 40px 10px;
        }

        #head {
            background-repeat: no-repeat;
            text-align: center;
            height: 110px;
            width: 100%;
            position: fixed;
            top: -100px;
            left: 0;
            right: 0;
            margin: auto;
        }

        #corpo {
            width: 600px;
            position: relative;
            margin: auto;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

    </style>

    <title>Ingresso</title>
</head>
<body>
<div id="head"><?= $title?></div>

<div id="footer">
<?php
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($numero, $generator::TYPE_CODE_39)) . '">';
?>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print barcode</title>
</head>

<body>
    <center>
        <h2>Yayasan Diannanda</h2>
        <img src="<?= $urlqrcode; ?>" alt="">
        <h2>2023</h2>
    </center>
</body>

</html>
<script>
    window.print();
</script>
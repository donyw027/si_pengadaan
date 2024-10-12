<!DOCTYPE html>
<html lang="en">

<style type="text/css" media="print">
    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print barcode</title>
</head>

<body>
    <center>
        <p style="margin: 0;">
            <font style="font-size: 6pt;">Aset Yayasan Diannanda</font>
        </p>
        <img src="<?= $urlqrcode; ?>" alt="" width="90" height="90" style="margin-bottom: 0;">
        <p style=" margin-top: 0;">
            <font style="font-size: 6pt;">&copy; IT Yayasan Diannanda 2023</font>
        </p>

    </center>
</body>

</html>
<script>
    window.print();
</script>
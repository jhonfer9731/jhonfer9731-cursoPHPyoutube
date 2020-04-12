<?php

require "directoryReader.php";


$archivos = directoryReader('fotosMias');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis archivos</title>
</head>
<body>
    <?php foreach($archivos as $archivo): ?>

        <img src="<?php echo $archivo; ?>" style='display: block; width: 95%; margin: 0px auto;'">

    <?php endforeach; ?>
</body>
</html>
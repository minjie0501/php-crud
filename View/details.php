<?php

require('../Controller/details.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed Overview</title>
</head>
<body>
<?php include ('includes/header.php');?>
    <div class="container">
    <?php renderPage($db);?>
    </div>
</body>
</html>
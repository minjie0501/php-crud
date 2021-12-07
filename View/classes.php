<?php

require('../Controller/classes.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classes</title>

  <link rel="stylesheet" href="styles/classes.css">
</head>

<body>
  <?php include ('includes/header.php');?>
  <h1>Classes</h1>
  <a class="button" href="createClass.php">Create new</a><br>
  <table>
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Teacher</th>
      <th>Students</th>
    </tr>

    <?php
    displayClasses($classes);
    ?>

  </table>
</body>

</html>
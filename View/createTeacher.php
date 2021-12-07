<?php
require('../Controller/createTeacher.php');
?>


<form action="teachers.php" method="POST">
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="username" class="form-control" value=<?php echo $nameValue; ?>>
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" value=<?php echo $emailValue; ?>>
    </div>
    <input class="btn btn-primary" type="submit" value=<?php echo $submitValue; ?>>
</form>
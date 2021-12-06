<?php
require('../Controller/createClass.php');
?>


<form action="classes.php" method="POST">
    <input type='hidden' name='id' value=<?php echo $classId; ?>>
    <input type='hidden' name='teacherId' value=<?php echo $teacherId; ?>>
    Name: <input type="text" name="name" value=<?php echo $nameValue; ?>>
    Location: <input type="text" name="location" value=<?php echo $locationValue; ?>>

    <label for="teachers">Teacher:</label>

    <select name="teachers" id="teachers">
        <?php teacherOptions();?>
    </select>
    <input type="text" name="teacher" value=<?php echo $teacherValue; ?>>
    <input type="submit" value=<?php echo $submitValue; ?>>
</form>
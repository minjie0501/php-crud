<?php
require('../Controller/createClass.php');
?>


<form action="classes.php" method="POST">
    Name: <input type="text" name="name" value=<?php echo $nameValue;?>>
    Location: <input type="text" name="location" value=<?php echo $locationValue;?>>
    Teacher: <input type="text" name="teacher" value=<?php echo $teacherValue;?>>
    <input type="submit" value=<?php echo $submitValue;?>>
</form>
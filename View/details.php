<?php include('includes/header.php'); ?>
<div class="details-container">
    <h1> <?php echo $title; ?></h1>
    <?php
    if ($title = "Student information") {
        for ($i = 0; $i < count($info); $i++) {
            if (key($info[$i]) === 'class') {
                echo "<p>Class: <a href='index.php?page=details&table=classes&id={$data['class']}'>{$data['cname']}</a><p>";
            } elseif (key($info[$i]) === 'teacher') {
                echo "<p>Teacher: <a href='index.php?page=details&table=teachers&id={$data['teacher']}'>{$data['tname']}</a><p>";
            } else if (key($info[$i]) != 'cname' && key($info[$i]) != 'tname') {
                echo "<p>" . ucfirst(key($info[$i])) . ": " . $info[$i][key($info[$i])] . "<p>";
            }
        }
    } else {
        for ($i = 0; $i < count($info); $i++) {
            echo "<p>" . ucfirst(key($info[$i])) . ": " . $info[$i][key($info[$i])] . "<p>";
        }
    }
    if (count($students) > 0) {
        echo "<p>Students: </p>";
        foreach ($students as $student) {
            echo "<p><a href='index.php?page=details&table=students&id={$student['id']}'>{$student['name']}</a></p>";
        }
    }

    ?>
</div>
<form action='index.php?page=delete' method='post'>
    <input type='hidden' name='id' value="<?php echo $id ?>">
    <input type='hidden' name='name' value="<?php echo $id ?>">
    <input type='hidden' name='table' value="<?php echo $table ?>">
    <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
</form>
<?php include('includes/footer.php'); ?>

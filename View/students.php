<?php
include 'includes/header.php';
?>

<div class="container">
    <div class="col-xs-6">
        <h1 class="page-header mb-5 mt-3">
            Students
        </h1>
        <form action="index.php?page=students" method="post">
            <input type="text" name="search">
            <input class="button btn btn-primary mb-1 btn-sm" type="submit" value="Search">
        </form>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($students as $s){
                  echo
                  "<tr>
                    <td><a href='index.php?page=details&table=students&id={$s['id']}'>{$s['name']}</a></td>
                    <td>{$s['email']}</td>" .
                    ($s['className'] == null ? "<td>None</td>" : "<td><a href='index.php?page=details&table=classes&id={$s['class']}'>{$s['className']}</a></td>") .
                    ($s['teacherName'] == null ? "<td>None</td>" : "<td><a href='index.php?page=details&table=teachers&id={$s['teacherId']}'>{$s['teacherName']}</a></td>") .
                    "<td><a class='btn btn-primary' href='index.php?page=studentForm&id={$s['id']}'>Edit</a></td>
                      <td>
                        <form action='index.php?page=delete' method='post'>
                        <input type='hidden' name='id' value={$s['id']}>
                        <input type='hidden' name='name' value={$s['name']}>
                        <input type='hidden' name='table' value='students'>
                        <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
                        </form>
                      </td>
                  </tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="button btn btn-primary mt-5" href="index.php?page=studentForm">Create new</a>
    </div>
</div>


<?php include 'includes/footer.php';

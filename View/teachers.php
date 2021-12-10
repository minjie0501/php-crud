<?php
include 'includes/header.php';
?>

<div class="container">
    <div class="col-xs-6">
        <h1 class="page-header mb-5 mt-3">
            Teachers
        </h1>
        <form action="index.php?page=teachers" method="post">
            <input type="text" name="search">
            <input class="button btn btn-primary mb-1 btn-sm" type="submit" value="Search">
        </form>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($teachers as $t){
                    echo
                    "<tr>
                      <td><a href='index.php?page=details&table=teachers&id={$t['id']}'>{$t['name']}</a></td>
                      <td>{$t['email']}</td>
                      <td><a class='btn btn-primary' href='index.php?page=teacherForm&id={$t['id']}'>Edit</a></td>
                        <td>
                          <form action='index.php?page=delete' method='post'>
                          <input type='hidden' name='id' value={$t['id']}>
                          <input type='hidden' name='name' value={$t['name']}>
                          <input type='hidden' name='table' value='teachers'>
                          <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
                          </form>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="button btn btn-primary mt-5" href="index.php?page=teacherForm">Create new</a>
    </div>
</div>


<?php include 'includes/footer.php';

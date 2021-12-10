<?php
include 'includes/header.php';
?>

<div class="container">
  <div class="col-xs-6">
    <h1 class="page-header mb-5 mt-3">
      Classes
    </h1>
    <form action="index.php?page=classes" method="post">
      <input type="text" name="search">
      <input class="button btn btn-primary mb-1 btn-sm" type="submit" value="Search">
    </form>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Class Name</th>
          <th>Location</th>
          <th>Teacher</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($classes as $c) {
          echo
          "<tr>
            <td><a href='index.php?page=details&table=classes&id={$c['id']}'>{$c['name']}</a></td>
            <td>{$c['location']}</td>" .
            ($c['teacherName'] == null ? "<td>None</td>" : "<td><a href='index.php?page=details&table=teachers&id={$c['teacherId']}'>{$c['teacherName']}</a></td>") .
            "<td><a class='btn btn-primary' href='index.php?page=classForm&id={$c['id']}'>Edit</a></td>
              <td>
                <form action='index.php?page=delete' method='post'>
                <input type='hidden' name='id' value={$c['id']}>
                <input type='hidden' name='name' value={$c['name']}>
                <input type='hidden' name='table' value='classes'>
                <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
                </form>
              </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
    <a class="button btn btn-primary mt-5" href="index.php?page=classForm">Create new</a>
  </div>
</div>


<?php include 'includes/footer.php';

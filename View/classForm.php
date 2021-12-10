<?php include('includes/header.php'); ?>

<div class="container">
    <h1><?php echo $submitValue; ?> a class</h1>
    <form action="index.php?page=classes" method="POST">
        <input type='hidden' name='id' value=<?php echo $classId; ?>>
        <input type='hidden' name='teacherId' value=<?php echo $teacherId; ?>>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $nameValue; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required value="<?php echo $locationValue; ?>">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="teachers">Teacher: </label>
                    <select class="form-select" name="teachers" id="teachers">
                        <?php
                        foreach ($teachers as $teacher) {
                            if ($teacher['id'] == $teacherId) {
                                echo "<option value={$teacher['id']} selected>{$teacher['name']}</option>";
                            } else {
                                echo "<option value={$teacher['id']}>{$teacher['name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-row" style="text-align:center;display:block;margin:auto;">
                        <input class="btn btn-primary" type="submit" name="action" value="<?php echo $submitValue; ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php include('includes/footer.php'); ?>
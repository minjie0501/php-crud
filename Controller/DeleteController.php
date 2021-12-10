<?php 
declare(strict_types=1);

class DeleteController {
    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        // TODO: when deleting from details page -> name = id instead of the name
        $name = $_POST['name'];
        $table= $_POST['table'];
        $id = (int)$_POST['id'];
        $deleteMsg = "Successfully deleted $name from the $table table";

        $dataLoader->deleteById($table, $id);

        require 'View/delete.php';
    }
}
?>
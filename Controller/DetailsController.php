<?php

declare(strict_types=1);

class DetailsController
{
    public function render(array $GET, array $POST)
    {
        if (isset($GET['table']) && isset($GET['id'])) {
            $dataLoader = new DataLoader();
            $dbTables = $dataLoader->getTables();
            $table = $GET['table'];
            $id = (int)$GET['id'];
            $info = [];
            $title = "";
            $students = [];

            // TODO: add links
            if (in_array($table, $dbTables)) {
                $tableColumns = $dataLoader->getTableColumns($table);
                if ($table === 'classes') {
                    $title = "Class information";
                    $data = $dataLoader->getClassById($id);
                    for ($i = 0; $i < count($tableColumns); $i++) {
                        if ($tableColumns[$i] != 'id') {
                            $info[] = array($tableColumns[$i] => $data[$tableColumns[$i]]);
                        }
                    }
                    $students = $dataLoader->getStudentsOfClass((int)$data['id']);
                }
                if ($table === 'teachers') {
                    $title = "Teacher information";
                    $data = $dataLoader->getTeacherById($id);
                    for ($i = 0; $i < count($tableColumns); $i++) {
                        if ($tableColumns[$i] != 'id') {
                            $info[] = array($tableColumns[$i] => $data[$tableColumns[$i]]);
                        }
                    }
                    $students = $dataLoader->getStudentsOfTeacher((int)$data['id']);
                }
                if ($table === 'students') {
                    $title = "Student information";
                    $data = $dataLoader->getStudentById($id);
                    for ($i = 0; $i < count(array_keys($data)); $i++) {
                        if (array_keys($data)[$i] != 'id') {
                            $info[] = array(array_keys($data)[$i] => $data[array_keys($data)[$i]]);
                        }
                    }
                }
            }


            require 'View/details.php';
        }
    }
}

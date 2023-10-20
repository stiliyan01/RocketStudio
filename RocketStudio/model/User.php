<?php
require("../Model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $existingRecords = Model::getRecordsByDetails($_POST['first_name'], $_POST['middle_name'], $_POST["sure_name"], $_POST['date_of_birth']);

    if (count($existingRecords) > 0) {
        echo "false";
    } else {
        Model::insert(
            "users",
            ['first_name', 'middle_name', "sure_name", 'date_of_birth', 'university_id', 'technology_id'],
            [
                $_POST['first_name'],
                $_POST['middle_name'],
                $_POST['sure_name'],
                $_POST['date_of_birth'],
                $_POST['university_id'],
                $_POST['technology_id'],

            ]
        );
        echo "true";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($_GET['sorted']) {
        case "1":

            $response = Model::getAllRecordsSorted($_GET['start_date'], $_GET['end_date']);
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
        case "0":
            $response = Model::getAllRecords();
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
    }
}

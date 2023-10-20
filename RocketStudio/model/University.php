<?php
require("../Model.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo json_encode($_POST);
    Model::insert("university", ['university_name', 'grade'], [$_POST['university_name'], $_POST['grade']]);
    $university = Model::find("university", "university_name", $_POST["university_name"]);

    header('Content-Type: application/json');
    echo json_encode($university);
}

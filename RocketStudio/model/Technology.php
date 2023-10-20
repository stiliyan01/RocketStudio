<?php
require("../Model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Model::insert("technologies", ['technology_name'], [$_POST['technology_name']]);
    $technology = Model::find("technologies", "technology_name", $_POST["technology_name"]);

    header('Content-Type: application/json');
    echo json_encode($technology);
}

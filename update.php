<?php
require_once 'pdo.php';
require_once 'helper.php';

$id = $_GET['id'];
$name = $_POST['name'];
$data = [
    'id' => $id,
    'name' => $name
];

update($data);
redirectCategoryHome();


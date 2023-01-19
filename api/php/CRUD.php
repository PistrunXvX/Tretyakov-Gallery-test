<?php
include 'connection.php';
include 'functions.php';

$database = new DataBase();
$db = $database->getConnection();

header('Content-type: json/application');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT');

$q = $_GET['q'];
$params = explode('/', $q);
$type = $params[0];

// Пути

if ($params[0] == 'getPictureById' && isset($params[1])) {
    getPictureById($params[1], $db);
}

if ($params[0] == 'getAllPictures') {
    getAllPictures($db);
}

if ($params[0] == 'getAllTags') {
    getAllTags($db);
}

if ($params[0] == 'getAllAuthorPicture') {
    getAllAuthorPicture($db);
}

if ($params[0] == 'getPicturesByTag' && isset($params[1])) {
    getPicturesByTag($params[1], $db);
}

if ($params[0] == 'createPicture') {
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);
    createPictures($data ,$db);
}

if ($params[0] == 'updatePicture') {
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);
    updatePicture($data ,$db);
}

<?php

function getPictureById($id, $db) {
    $stmt = $db->query("SELECT pictures.*, tags.tagName FROM pictures
        INNER JOIN tags ON pictures.tagId = tags.id
        WHERE pictures.id=$id");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getAllPictures($db) {
    $stmt = $db->query("SELECT pictures.*, tags.tagName FROM pictures
        INNER JOIN tags ON pictures.tagId = tags.id");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getAllTags($db) {
    $stmt = $db->query("SELECT * FROM tags");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getAllAuthorPicture($db) {
    $stmt = $db->query("SELECT DISTINCT author FROM pictures");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function getPicturesByTag($id, $db) {
    $stmt = $db->query("SELECT pictures.*, tags.tagName FROM pictures
        INNER JOIN tags ON pictures.tagId = tags.id
        WHERE pictures.tagId = $id");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function createPictures($data ,$db) {
    $sql = "INSERT INTO pictures (tagId, picturesUrl, name, description, author)
        VALUES(:tagId, :picturesUrl, :name, :description, :author)";
    $db->prepare($sql)->execute($data);
}

function updatePicture($data ,$db) {
    $sql = "UPDATE pictures SET tagId=:tagId, picturesUrl=:picturesUrl, name=:name,
        description=:description, author=:author WHERE id=:id";
    $db->prepare($sql)->execute($data);
}
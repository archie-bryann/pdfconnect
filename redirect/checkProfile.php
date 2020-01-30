<?php

$id = $_GET['tag'];

$check = new UsersContr();
$results = $check->validateId($id);

if(empty($results)) {
    header("Location: 404");
}
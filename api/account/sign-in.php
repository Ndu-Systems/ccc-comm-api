<?php
include_once '../../config/Database.php';
include_once '../../models/UserProfile.php';
$data = json_decode(file_get_contents("php://input"));

$Email = $data->Email;
$Password = $data->Password;

$database = new Database();
$db = $database->connect();

$userProfile = new UserProfile($db);

$result = $userProfile->SignIn($Email,$Password);

$result["Password"] = null;
echo json_encode($result);




<?php
include_once '../../config/Database.php';
include_once '../../models/UserProfile.php';

$data = json_decode(file_get_contents("php://input"));

$StatusId = 1;

$database = new Database();
$db = $database->connect();

$userProfile = new UserProfile($db);

$result = $userProfile->getAllUsers($StatusId);

echo json_encode($result);
<?php
include_once '../../config/Database.php';
include_once '../../models/Test.php';

$data = json_decode(file_get_contents("php://input"));

// create user data only
$StatusId =$_GET['UserProfileId'];


//connect to db
$database = new Database();
$db = $database->connect();

// create user first to get UserId
$test = new Test($db);

$result = $test->getByUserId($StatusId);
echo json_encode($result);

 
 



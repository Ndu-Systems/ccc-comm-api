<?php
include_once '../../config/Database.php';
include_once '../../models/Question.php';

$data = json_decode(file_get_contents("php://input"));

// create user data only
$StatusId =$_GET['StatusId'];


//connect to db
$database = new Database();
$db = $database->connect();

// create user first to get UserId
$question = new Question($db);

$result = $question->getAll($StatusId);
echo json_encode($result);

 
 



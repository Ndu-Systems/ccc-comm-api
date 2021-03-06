<?php
include_once '../../config/Database.php';
include_once '../../models/Question.php';

$data = json_decode(file_get_contents("php://input"));


$QuestionId = $data->QuestionId;
$Name = $data->Name;
$Question = $data->Question;
$SecondaryQuestion = $data->SecondaryQuestion;
$Severity = $data->Severity;
$Option1 = $data->Option1;
$Option2 = $data->Option2;
$Option3 = $data->Option3;
$CreateUserId = $data->CreateUserId;
$ModifyUserId = $data->ModifyUserId;
$StatusId = $data->StatusId;
//connect to db
$database = new Database();
$db = $database->connect();

// create user first to get UserId
$question = new Question($db);

$result = $question->updatequestion(
    $QuestionId,
    $Name,
    $Question,
    $SecondaryQuestion,
    $Severity,
    $Option1,
    $Option2,
    $Option3,
    $CreateUserId,
    $ModifyUserId,
    $StatusId
);

    
echo json_encode($result);

 
 



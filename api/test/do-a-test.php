<?php
include_once '../../config/Database.php';
include_once '../../models/Test.php';
include_once '../../models/Answer.php';

$data = json_decode(file_get_contents("php://input"));

$UserProfileId = $data->UserProfileId;
$AddressId = $data->AddressId;
$CreateUserId = $data->CreateUserId;
$ModifyUserId = $data->ModifyUserId;
$StatusId = $data->StatusId;
$answers = $data->Answers;
$user = $data->User;

//connect to db
$database = new Database();
$db = $database->connect();

// create user first to get UserId
$test = new Test($db);

// If it other person you better add the user fists, whith userId 10 to indicate it is the othe person.

if ($user) {
    $userProfile = new UserProfile($db);

    $addNewUser = $userProfile->SignUp(
        $user->Email,
        $user->Password,
        $user->FirstName,
        $user->Surname,
        $user->DOB,
        $user->Age,
        $user->ContactNumber,
        $CreateUserId,
        10
    );
    $UserProfileId = $addNewUser["UserProfileId"];
}

$result = $test->add(
    $UserProfileId,
    $AddressId,
    $CreateUserId,
    $ModifyUserId,
    $StatusId
);

$TestId =  $result['TestId'];

foreach ($answers as $answer) {
    $answerResult = new Answer($db);

    $products_result = $answerResult->add(
        $TestId,
        $answer->QuestionId,
        $answer->Answer,
        $answer->SecondaryAnswer,
        $answer->CreateUserId,
        $answer->ModifyUserId,
        $answer->StatusId
    );
}

$thistest = $test->getAll(1);
echo json_encode($thistest);

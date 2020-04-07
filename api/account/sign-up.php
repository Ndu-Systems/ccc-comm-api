<?php 
include_once '../../config/Database.php';
include_once '../../models/UserProfile.php';

$data = json_decode(file_get_contents("php://input"));

$Email = $data->Email;
$Password = $data->Password;
$FirstName = $data->FirstName;
$Surname = $data->Surname;
$Age = $data->Age;
$DOB = $data->DOB;
$ContactNumber = $data->ContactNumber;
$CreateUserId = $data->CreateUserId;
$Address = $data->Address;
$City = $data->City;
$Province = $data->Province;
$PostCode = $data->PostCode;

$database = new Database();
$db = $database->connect();

$userProfile = new UserProfile($db);

$result = $userProfile->SignUp(  
$Email,
$Password,
$FirstName,
$Surname,
$DOB,
$Age,
$ContactNumber,
$Address ,
$City ,
$Province ,
$PostCode ,
$CreateUserId,
1
);

 echo json_encode($result);

 